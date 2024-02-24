<?php

namespace App\Http\Services\Tenant;

use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Http\Resources\TenantResource;
use App\Http\Traits\Responser;
use App\Repository\TenantRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class TenantService
{

    use Responser;
    protected TenantRepositoryInterface $tenantRepository;

    public function __construct(TenantRepositoryInterface $tenantRepository)
    {
        $this->tenantRepository = $tenantRepository;
    }


    public function getAllTenants(): JsonResponse{

        try {
            $tenants = $this->tenantRepository->tenants();

            return $this->responseSuccess(TenantResource::collection($tenants)->response()->getData(true), 200, 'تم الحصول على بيانات جميع المستاجرين بنجاح');

        } catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }

    }


    public function create(StoreTenantRequest $request): JsonResponse{


        try {

            $inputs = $request->validated();

            $inputs['company_id'] = auth('user-api')->user()->company_id;

            $tenant = $this->tenantRepository->create($inputs);

            return $this->responseSuccess(new TenantResource($tenant), 200, 'تم اضافه البيانات بنجاح');


        }catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }
    }


    public function update($id,UpdateTenantRequest $request): JsonResponse{

        try {

            $tenant = $this->tenantRepository->getById($id);

            Gate::authorize('check-company-auth',$tenant);

            $inputs = $request->validated();


            $this->tenantRepository->update($tenant->id,$inputs);

            return $this->responseSuccess(new TenantResource($this->tenantRepository->getById($id)), 200, 'تم تعديل بيانات المستاجر بنجاح');

        }catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات المستاجر غير موجوده', 404);

        } catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }

    }


    public function show($id): JsonResponse{

        try {

            $tenant = $this->tenantRepository->getById($id);

            Gate::authorize('check-company-auth',$tenant);

            return $this->responseSuccess(new TenantResource($this->tenantRepository->getById($id)), 200, 'تم عرض بيانات المستاجر بنجاح');

        }catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات المستاجر غير موجوده', 404);

        }

    }

    public function delete($id): JsonResponse{

        try {

            $tenant = $this->tenantRepository->getById($id);

            Gate::authorize('check-company-auth',$tenant);

            $this->tenantRepository->delete($tenant->id);

            return $this->responseSuccess(null, 200, 'تم حذف بيانات المستاجر  بنجاح');

        } catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات المستاجر غير موجوده', 404);

        }catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        }

    }


}
