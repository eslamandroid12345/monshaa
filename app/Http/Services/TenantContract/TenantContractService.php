<?php

namespace App\Http\Services\TenantContract;

use App\Http\Requests\StoreTenantContractRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantContractRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Http\Resources\TenantContractResource;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\FirebaseNotification;
use App\Http\Traits\Responser;
use App\Repository\ExpenseRepositoryInterface;
use App\Repository\TenantContractRepositoryInterface;
use App\Repository\TenantRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class TenantContractService
{

    use Responser,FirebaseNotification;
    protected TenantContractRepositoryInterface $tenantContractRepository;
    protected TenantRepositoryInterface $tenantRepository;

    protected GetService $getService;

    protected ExpenseRepositoryInterface $expenseRepository;


    public function __construct(TenantContractRepositoryInterface $tenantContractRepository,TenantRepositoryInterface $tenantRepository,GetService $getService,ExpenseRepositoryInterface $expenseRepository)
    {
        $this->tenantContractRepository = $tenantContractRepository;
        $this->tenantRepository = $tenantRepository;
        $this->getService = $getService;
        $this->expenseRepository = $expenseRepository;
    }


    public function allTenantContracts(): JsonResponse{

        try {

            return $this->getService->handle(resource: TenantContractResource::class,repository: $this->tenantContractRepository,method: 'allTenantContracts',message:'تم الحصول على بيانات جميع عقود الايجار بنجاح' );

        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }

    }

    public function tenantContractsExpired(): JsonResponse{

        try {

            return $this->getService->handle(resource: TenantContractResource::class,repository: $this->tenantContractRepository,method: 'tenantContractsExpired',message:'تم الحصول على بيانات جميع عقود الايجار المنتهيه بنجاح' );

        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }

    }


    public function  removeFromScreen($id): JsonResponse
    {
        $tenantContract = $this->tenantContractRepository->getById($id);

        if($tenantContract->is_expired == 0){

            return $this->responseFail(null, 418, 'هذا العقد غير منتهي!');
        }

        $this->tenantContractRepository->update($tenantContract->id,['is_show' => 0]);

        return  $this->responseSuccess(data: null,code: 200,message: 'تم حذف العقد المنتهي من القائمه');
    }

    public function create(StoreTenantRequest $tenantRequest,StoreTenantContractRequest $request): JsonResponse{


        DB::beginTransaction();

        try {

            $inputs = $this->storeTenantContract($request);

            if (!is_null($request->input('tenant_id'))) {

                $this->tenantRepository->getById($request->input('tenant_id'));
                $this->setExistingTenantInputs($inputs);
            } else {
                $tenant = $this->createNewTenant($tenantRequest);
                $inputs['tenant_id'] = $tenant->id;
            }

            $tenantContract = $this->tenantContractRepository->create($inputs);

            $this->expenseRepository->create(['type' => 'revenue', 'company_id' => companyId(), 'user_id' => employeeId(), 'tenant_contract_id' => $tenantContract->id, 'total_money' => $tenantContract->commission, 'description' => 'عقد ايجار', 'transaction_date' => $tenantContract->contract_date,]);

            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم اضافه بيانات عقد ايجار لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'states');

            DB::commit();

            return $this->getService->handle(resource: TenantContractResource::class,repository: $this->tenantContractRepository,method: 'getById',parameters: [$tenantContract->id],is_instance: true,message:'تم اضافه البيانات بنجاح' );


        }catch (ModelNotFoundException $exception) {
            DB::rollBack();
            return $this->responseFail(null, 404, 'بيانات المستاجر غير موجوده', 404);

        } catch (AuthorizationException $exception) {
            DB::rollBack();
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }
    }

    protected function storeTenantContract(StoreTenantContractRequest $request): array{

        $inputs = $request->validated();
        $inputs['user_id'] = employeeId();
        $inputs['company_id'] = companyId();
        return $inputs;
    }

    protected function setExistingTenantInputs(array &$inputs): void{

        $inputs['tenant_id'] = request('tenant_id');
    }


    protected function createNewTenant(StoreTenantRequest $request): ?Model{

         $tenantRequests = $request->validated();
         $tenantRequests['company_id'] = companyId();

        return $this->tenantRepository->create($tenantRequests);
    }


    public function update($id,UpdateTenantRequest $tenantRequest,UpdateTenantContractRequest $request): JsonResponse{

        DB::beginTransaction();

        try {

            $tenantContract = $this->tenantContractRepository->getById($id);

            Gate::authorize('check-company-auth',$tenantContract);

           $tenantRequests =  $tenantRequest->validated();

           $tenantContractRequests =  $request->validated();

            $this->tenantRepository->update($tenantContract->tenant_id,$tenantRequests);

           $this->tenantContractRepository->update($tenantContract->id,$tenantContractRequests);

            $revenue = $this->expenseRepository->getByColumn('tenant_contract_id',$id);
            $this->expenseRepository->update($revenue->id,['total_money' => $tenantContract->commission]);

            DB::commit();
            return $this->getService->handle(resource: TenantContractResource::class,repository: $this->tenantContractRepository,method: 'getById',parameters: [$id],is_instance: true,message: 'تم تعديل بيانات عقد الايجار  بنجاح');


        }catch (ModelNotFoundException $exception) {
            DB::rollBack();
            return $this->responseFail(null, 404, 'بيانات عقد الايجار غير موجوده', 404);

        } catch (AuthorizationException $exception) {
            DB::rollBack();
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }

    }


    public function show($id): JsonResponse{

        try {

            $tenantContract = $this->tenantContractRepository->getById($id);
            Gate::authorize('check-company-auth',$tenantContract);

            return $this->getService->handle(resource: TenantContractResource::class,repository: $this->tenantContractRepository,method: 'getById',parameters: [$id],is_instance: true,message: 'تم عرض بيانات عقد الايجار بنجاح');

        }catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات عقد الايجار غير موجوده', 404);

        }

    }

    public function delete($id): JsonResponse{

        DB::beginTransaction();

        try {

            $tenantContract = $this->tenantContractRepository->getById($id);

            Gate::authorize('check-company-auth',$tenantContract);
            $this->tenantContractRepository->delete($tenantContract->id);

            DB::commit();
            return $this->responseSuccess(null, 200, 'تم حذف بيانات عقد الايجار  بنجاح');

        } catch (ModelNotFoundException $exception) {
            DB::rollBack();
            return $this->responseFail(null, 404, 'بيانات عقد الايجار غير موجوده', 404);

        }catch (\Exception $e) {
            DB::rollBack();
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);
        }

    }

}
