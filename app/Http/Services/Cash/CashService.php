<?php

namespace App\Http\Services\Cash;

use App\Http\Requests\CashRequest;
use App\Http\Resources\CashResource;
use App\Http\Resources\TenantContractWithCashResource;
use App\Http\Traits\Responser;
use App\Repository\CashRepositoryInterface;
use App\Repository\TenantContractRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class CashService
{


    use Responser;
    protected CashRepositoryInterface $cashRepository;

    protected TenantContractRepositoryInterface $tenantContractRepository;


    public function __construct(CashRepositoryInterface $cashRepository,TenantContractRepositoryInterface $tenantContractRepository)
    {

        $this->cashRepository = $cashRepository;
        $this->tenantContractRepository = $tenantContractRepository;
    }


    public function getAllCashes(): JsonResponse
    {

        try {
            $tenantContracts = $this->tenantContractRepository->allTenantContracts();

            return $this->responseSuccess(TenantContractWithCashResource::collection($tenantContracts)->response()->getData(true), 200, 'تم الحصول على بيانات جميع سندات القبض بنجاح');

        }  catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }

    }

    public function create($id,CashRequest $request): JsonResponse
    {

        try {

            $tenantContract = $this->tenantContractRepository->getById($id);

            Gate::authorize('check-company-auth',$tenantContract);

            $inputs = $request->validated();

            $inputs['user_id'] = auth('user-api')->id();
            $inputs['company_id'] = auth('user-api')->user()->company_id;
            $inputs['tenant_contract_id'] = $tenantContract->id;

            $cash = $this->cashRepository->create($inputs);

            return $this->responseSuccess(new CashResource($cash), 200, 'تم اضافه البيانات بنجاح');

        }catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات عقد الايجار غير موجوده', 404);

        } catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }
    }


    public function update($id,CashRequest $request): JsonResponse
    {

        try {

            $cash = $this->cashRepository->getById($id);

            Gate::authorize('check-company-auth',$cash);

            $inputs = $request->validated();


            $this->cashRepository->update($cash->id,$inputs);

            return $this->responseSuccess(new CashResource($this->cashRepository->getById($id)), 200, 'تم تعديل بيانات سند القبض  بنجاح');

        } catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات سند القبض غير موجوده', 404);

        } catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }
    }


    public function show($id): JsonResponse
    {

        try {

            $cash = $this->cashRepository->getById($id);

            Gate::authorize('check-company-auth',$cash);

            return $this->responseSuccess(new CashResource($cash), 200, 'تم عرض بيانات سند القبض  بنجاح');

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

            return $this->responseSuccess(null, 200, 'تم حذف بيانات سند القبض  بنجاح');

        } catch (ModelNotFoundException $exception){

            return $this->responseFail(null,404,'بيانات سند القبض غير موجوده',404);

        }
    }


}
