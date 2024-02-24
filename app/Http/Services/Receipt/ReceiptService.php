<?php

namespace App\Http\Services\Receipt;

use App\Http\Requests\CashRequest;
use App\Http\Requests\ReceiptRequest;
use App\Http\Resources\CashResource;
use App\Http\Resources\ReceiptResource;
use App\Http\Resources\TenantContractWithReceiptResource;
use App\Http\Traits\Responser;
use App\Repository\ReceiptRepositoryInterface;
use App\Repository\TenantContractRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class ReceiptService
{

    use Responser;
    protected ReceiptRepositoryInterface $receiptRepository;

    protected TenantContractRepositoryInterface $tenantContractRepository;


    public function __construct(ReceiptRepositoryInterface $receiptRepository,TenantContractRepositoryInterface $tenantContractRepository)
    {

        $this->receiptRepository = $receiptRepository;
        $this->tenantContractRepository = $tenantContractRepository;
    }


    public function getAllReceipts(): JsonResponse
    {

        try {

            $tenantContracts = $this->tenantContractRepository->allTenantContracts();

            return $this->responseSuccess(TenantContractWithReceiptResource::collection($tenantContracts)->response()->getData(true), 200, 'تم الحصول على بيانات جميع سندات الصرف بنجاح');

        }  catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }

    }

    public function create($id,ReceiptRequest $request): JsonResponse
    {

        try {

            $tenantContract = $this->tenantContractRepository->getById($id);

            Gate::authorize('check-company-auth',$tenantContract);

            $inputs = $request->validated();

            $inputs['user_id'] = auth('user-api')->id();
            $inputs['company_id'] = auth('user-api')->user()->company_id;
            $inputs['tenant_contract_id'] = $tenantContract->id;

            $receipt = $this->receiptRepository->create($inputs);

            return $this->responseSuccess(new ReceiptResource($receipt), 200, 'تم اضافه البيانات بنجاح');

        }catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات عقد الايجار غير موجوده', 404);

        } catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }
    }


    public function update($id,ReceiptRequest $request): JsonResponse
    {

        try {

            $receipt = $this->receiptRepository->getById($id);

            Gate::authorize('check-company-auth',$receipt);

            $inputs = $request->validated();

            $this->receiptRepository->update($receipt->id,$inputs);

            return $this->responseSuccess(new ReceiptResource($this->receiptRepository->getById($id)), 200, 'تم تعديل بيانات سند الصرف  بنجاح');

        } catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات سند الصرف غير موجوده', 404);

        } catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }
    }


    public function show($id): JsonResponse
    {

        try {

            $receipt = $this->receiptRepository->getById($id);

            Gate::authorize('check-company-auth',$receipt);

            return $this->responseSuccess(new ReceiptResource($receipt), 200, 'تم عرض بيانات سند الصرف  بنجاح');

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

            return $this->responseSuccess(null, 200, 'تم حذف بيانات سند الصرف  بنجاح');

        } catch (ModelNotFoundException $exception){

            return $this->responseFail(null,404,'بيانات سند الصرف غير موجوده',404);

        }
    }



}
