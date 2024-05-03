<?php

namespace App\Http\Services\EmployeeCommission;

use App\Http\Requests\EmployeeCommission\EmployeeCommissionRequest;
use App\Http\Resources\EmployeeCommission\EmployeeCommissionResource;
use App\Http\Resources\ExpenseResource;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\FirebaseNotification;
use App\Http\Traits\Responser;
use App\Repository\EmployeeCommissionRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class EmployeeCommissionService
{
    use Responser,FirebaseNotification;

    protected GetService $getService;

    protected EmployeeCommissionRepositoryInterface $employeeCommissionRepository;

    public function __construct(GetService $getService,EmployeeCommissionRepositoryInterface $employeeCommissionRepository)
    {

        $this->getService = $getService;
        $this->employeeCommissionRepository = $employeeCommissionRepository;
    }

    public function getAllEmployeesCommissions(): JsonResponse
    {

        $data = $this->employeeCommissionRepository->getAllEmployeesCommissions();

        return $this->responseSuccess(data: EmployeeCommissionResource::collection($data)->response()->getData(true),code: 200,message: 'تم الحصول علي جميع بيانات عموله الموظفين بنجاح',status: 200,newAttributeName: 'total',newAttributeValue: $this->employeeCommissionRepository->getCurrentTotalCommission());

    }


    public function create(EmployeeCommissionRequest $request): JsonResponse
    {
        try {

            $inputs = $request->validated();

            $inputs['company_id'] = companyId();
            $inputs['user_id'] = employeeId();

            $employeeCommission = $this->employeeCommissionRepository->create($inputs);

            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم اضافه عموله لموظف لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'employee_commission');

            return $this->getService->handle(resource: EmployeeCommissionResource::class,repository: $this->employeeCommissionRepository,method: 'getById',parameters: [$employeeCommission->id],is_instance: true,message:'تم اضافه البيانات بنجاح' );
        }catch (AuthorizationException $exception){

            return $this->responseFail(null, 403, 'ليس لديك صلاحيه علي هذا',403);
        } catch (\Exception $e) {

            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }
    }

    public function show($id): JsonResponse
    {
        try {

            $employeeCommission = $this->employeeCommissionRepository->getById($id);

            Gate::authorize('check-company-auth',$employeeCommission);

            return $this->getService->handle(resource: EmployeeCommissionResource::class,repository: $this->employeeCommissionRepository,method: 'getById',parameters: [$id],is_instance: true,message:'تم عرض بيانات عموله الموظف بنجاح' );

        }catch (ModelNotFoundException $exception){
            return $this->responseFail(null,404,'بيانات عموله الموظف غير موجوده',404);

        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        }
    }


    public function update($id,EmployeeCommissionRequest $request): JsonResponse
    {

        try {

            $employeeCommission = $this->employeeCommissionRepository->getById($id);

            Gate::authorize('check-company-auth',$employeeCommission);

            $inputs = $request->validated();

            $this->employeeCommissionRepository->update($employeeCommission->id,$inputs);

            return $this->getService->handle(resource: EmployeeCommissionResource::class,repository: $this->employeeCommissionRepository,method: 'getById',parameters: [$id],is_instance: true,message: 'تم تعديل بيانات عموله الموظف بنجاح' );

        } catch (ModelNotFoundException $exception) {
            return $this->responseFail(null, 404, 'بيانات عموله الموظف غير موجوده', 404);

        } catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في السيرفر', 500);

        }

    }

    public function delete($id): JsonResponse
    {
        try {

            $employeeCommission = $this->employeeCommissionRepository->getById($id);

            Gate::authorize('check-company-auth',$employeeCommission);

            $this->employeeCommissionRepository->delete($employeeCommission->id);

            return $this->responseSuccess(null,200,'تم حذف العموله بنجاح');

        } catch (ModelNotFoundException $exception) {
            return $this->responseFail(null, 404, 'بيانات عموله الموظف غير موجوده', 404);

        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        }
    }

}
