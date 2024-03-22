<?php

namespace App\Http\Services\Receipt;

use App\Http\Requests\ReceiptRequest;
use App\Http\Resources\ReceiptResource;
use App\Http\Resources\TenantContractWithReceiptResource;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\FirebaseNotification;
use App\Http\Traits\Responser;
use App\Repository\CashRepositoryInterface;
use App\Repository\ReceiptRepositoryInterface;
use App\Repository\TenantContractRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ReceiptService
{

    use Responser,FirebaseNotification;
    protected ReceiptRepositoryInterface $receiptRepository;
    protected CashRepositoryInterface $cashRepository;

    protected TenantContractRepositoryInterface $tenantContractRepository;

    protected GetService $getService;


    public function __construct(ReceiptRepositoryInterface $receiptRepository,TenantContractRepositoryInterface $tenantContractRepository,GetService $getService,CashRepositoryInterface $cashRepository)
    {

        $this->receiptRepository = $receiptRepository;
        $this->tenantContractRepository = $tenantContractRepository;
        $this->getService = $getService;
        $this->cashRepository = $cashRepository;
    }


    public function getAllReceipts(): JsonResponse
    {

        try {

            return $this->getService->handle(resource:TenantContractWithReceiptResource::class,repository: $this->tenantContractRepository,method: 'TenantContractsByFinancialBonds',message:'تم الحصول على بيانات جميع سندات الصرف بنجاح' );

        }  catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }

    }

    public function create($id,ReceiptRequest $request): JsonResponse
    {

        DB::beginTransaction();
        try {

            $tenantContract = $this->tenantContractRepository->getById($id);

            Gate::authorize('check-company-auth',$tenantContract);

            $cashCount = $this->cashRepository->countCash($tenantContract->id);
            $receiptCount = $this->receiptRepository->receiptCount($tenantContract->id);

            if($cashCount == 0){
                return $this->responseFail(data: null, code: 415, message: 'غير مسموح بصرف سند لمالك بسبب لا يوجد سندات قبض لهذا العقد!');

            }elseif ($receiptCount + 1 != $cashCount){

                return $this->responseFail(data: null, code: 416, message: 'غير مسموح بصرف سند لمالك لهذا العقد!');

            }else{

                $inputs = $request->validated();

                $inputs['user_id'] = employeeId();
                $inputs['company_id'] = companyId();
                $inputs['tenant_contract_id'] = $tenantContract->id;

                $receipt = $this->receiptRepository->create($inputs);

                $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم اضافه سند صرف لمالك لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'financial_receipt');

                DB::commit();
                return $this->getService->handle(resource: ReceiptResource::class,repository: $this->receiptRepository,method: 'getById',parameters: [$receipt->id],is_instance: true,message:'تم اضافه بيانات سند الصرف للمالك بنجاح' );

            }

        }catch (ModelNotFoundException $exception) {
            DB::rollBack();
            return $this->responseFail(null, 404, 'بيانات عقد الايجار غير موجوده', 404);

        } catch (AuthorizationException $exception){
            DB::rollBack();
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }
    }


    public function update($id,ReceiptRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {

            $receipt = $this->receiptRepository->getById($id);

            Gate::authorize('check-company-auth',$receipt);

            $inputs = $request->validated();

            $this->receiptRepository->update($receipt->id,$inputs);

            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم تعديل سند صرف لمالك لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'financial_receipt');

            DB::commit();
            return $this->getService->handle(resource: ReceiptResource::class,repository: $this->receiptRepository,method: 'getById',parameters: [$id],is_instance: true,message: 'تم تعديل بيانات سند الصرف  بنجاح');

        } catch (ModelNotFoundException $exception) {
            DB::rollBack();
            return $this->responseFail(null, 404, 'بيانات سند الصرف غير موجوده', 404);

        } catch (AuthorizationException $exception){
            DB::rollBack();
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }
    }


    public function show($id): JsonResponse
    {
        try {
            $receipt = $this->receiptRepository->getById($id);
            Gate::authorize('check-company-auth',$receipt);
            return $this->getService->handle(resource:ReceiptResource::class,repository: $this->receiptRepository,method: 'getById',parameters: [$id],is_instance: true,message:'تم عرض بيانات سند الصرف  بنجاح' );

        } catch (ModelNotFoundException $exception){
            return $this->responseFail(null,404,'بيانات سند الصرف غير موجوده',404);

        }
    }


    public function delete($id): JsonResponse
    {
        try {
            $receipt = $this->receiptRepository->getById($id);

            Gate::authorize('check-company-auth',$receipt);

            $this->receiptRepository->delete($receipt->id);

            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم حذف سند صرف لمالك لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'financial_receipt');

            return $this->responseSuccess(null, 200, 'تم حذف بيانات سند الصرف  بنجاح');

        } catch (ModelNotFoundException $exception){

            return $this->responseFail(null,404,'بيانات سند الصرف غير موجوده',404);

        }
    }



}
