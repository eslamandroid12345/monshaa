<?php

namespace App\Http\Services\Tenant;

use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Http\Resources\TenantResource;
use App\Http\Services\Mutual\GetService;
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
    protected GetService $getService;


    public function __construct(TenantRepositoryInterface $tenantRepository,GetService $getService)
    {
        $this->tenantRepository = $tenantRepository;
        $this->getService = $getService;
    }


    public function getAllTenants(): JsonResponse{

        try {
            return $this->getService->handle(resource: TenantResource::class,repository: $this->tenantRepository,method: 'tenants',message:'تم الحصول على بيانات جميع المستاجرين بنجاح');

        } catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }

    }


    public function create(StoreTenantRequest $request): JsonResponse{

        try {

            $inputs = $request->validated();

            $inputs['company_id'] = companyId();

            $tenant = $this->tenantRepository->create($inputs);

            return $this->getService->handle(resource: TenantResource::class,repository: $this->tenantRepository,method: 'getById',parameters: [$tenant->id],is_instance: true,message:'تم اضافه البيانات بنجاح' );

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
            return $this->getService->handle(resource: TenantResource::class,repository: $this->tenantRepository,method: 'getById',parameters: [$id],is_instance: true,message: 'تم تعديل بيانات المستاجر بنجاح' );


        }catch (ModelNotFoundException $exception) {
            return $this->responseFail(null, 404, 'بيانات المستاجر غير موجوده', 404);

        } catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }

    }


    public function show($id): JsonResponse{

        try {

            $tenant = $this->tenantRepository->getById($id);

            Gate::authorize('check-company-auth',$tenant);

            return $this->getService->handle(resource: TenantResource::class,repository: $this->tenantRepository,method: 'getById',parameters: [$id],is_instance: true,message: 'تم عرض بيانات المستاجر بنجاح' );

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
