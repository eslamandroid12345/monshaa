<?php

namespace App\Http\Services\Cash;

use App\Http\Requests\CashRequest;
use App\Http\Resources\CashResource;
use App\Http\Resources\TenantContractWithCashResource;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\FirebaseNotification;
use App\Http\Traits\Responser;
use App\Repository\CashRepositoryInterface;
use App\Repository\TenantContractRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class CashService
{


    use Responser,FirebaseNotification;
    protected CashRepositoryInterface $cashRepository;

    protected TenantContractRepositoryInterface $tenantContractRepository;

    protected GetService $getService;

    public function __construct(CashRepositoryInterface $cashRepository,TenantContractRepositoryInterface $tenantContractRepository,GetService $getService)
    {

        $this->cashRepository = $cashRepository;
        $this->tenantContractRepository = $tenantContractRepository;
        $this->getService = $getService;
    }


    public function getAllCashes(): JsonResponse
    {
        try {
            return $this->getService->handle(resource: TenantContractWithCashResource::class,repository: $this->tenantContractRepository,method: 'allTenantContracts',message:'تم الحصول على بيانات جميع سندات القبض بنجاح' );

        }  catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);
        }

    }

    public function create($id,CashRequest $request): JsonResponse
    {

        try {

            $tenantContract = $this->tenantContractRepository->getById($id);

            Gate::authorize('check-company-auth',$tenantContract);

            $inputs = $request->validated();

            $inputs['user_id'] = employeeId();
            $inputs['company_id'] = companyId();
            $inputs['tenant_contract_id'] = $tenantContract->id;

            $cash = $this->cashRepository->create($inputs);

            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم اضافه سند قبض جديد لديك بواسطه   ' . employee() ],userId: employeeId(),permission: 'financial_cash');

            return $this->getService->handle(resource: CashResource::class,repository: $this->cashRepository,method: 'getById',parameters: [$cash->id],is_instance: true,message:'تم اضافه البيانات بنجاح' );

        }catch (ModelNotFoundException $exception) {
            return $this->responseFail(null, 404, 'بيانات عقد الايجار غير موجوده', 404);

        } catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }
    }


    public function update($id,CashRequest $request): JsonResponse
    {

        try {

            $cash = $this->cashRepository->getById($id);

            Gate::authorize('check-company-auth',$cash);

            $inputs = $request->validated();


            $this->cashRepository->update($cash->id,$inputs);

            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم تعديل سند قبض  لديك بواسطه   ' . employee() ],userId: employeeId(),permission: 'financial_cash');

            return $this->getService->handle(resource: CashResource::class,repository: $this->cashRepository,method: 'getById',parameters: [$id],is_instance: true,message: 'تم تعديل بيانات سند القبض  بنجاح' );


        } catch (ModelNotFoundException $exception) {
            return $this->responseFail(null, 404, 'بيانات سند القبض غير موجوده', 404);

        } catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }
    }


    public function show($id): JsonResponse
    {
        try {

            $cash = $this->cashRepository->getById($id);

            Gate::authorize('check-company-auth',$cash);

            return $this->getService->handle(resource: CashResource::class, repository: $this->cashRepository, method: 'getById', parameters: [$id], is_instance: true, message: 'تم عرض بيانات سند القبض  بنجاح');

        } catch (ModelNotFoundException $exception){

            return $this->responseFail(null,404,'بيانات سند القيض غير موجوده',404);

        }
    }




    public function delete($id): JsonResponse
    {
        try {
            $cash = $this->cashRepository->getById($id);

            Gate::authorize('check-company-auth',$cash);

            $this->cashRepository->delete($cash->id);

            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم حذف سند قبض  لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'financial_cash');

            return $this->responseSuccess(null, 200, 'تم حذف بيانات سند القبض  بنجاح');

        } catch (ModelNotFoundException $exception){

            return $this->responseFail(null,404,'بيانات سند القبض غير موجوده',404);

        }
    }


}
