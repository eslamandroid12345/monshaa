<?php

namespace App\Http\Services\Employee;

use App\Http\Requests\ActiveEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeGetDataResource;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\EmployeeRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class EmployeeService
{

    use Responser;
    protected EmployeeRepositoryInterface $employeeRepository;

    protected FileManagerService $fileManagerService;

    public function __construct(EmployeeRepositoryInterface $employeeRepository,FileManagerService $fileManagerService)
    {

        $this->employeeRepository = $employeeRepository;
        $this->fileManagerService = $fileManagerService;

    }


    public function getAllEmployees(): JsonResponse
    {

        $employees = $this->employeeRepository->getByTwoColumns('company_id',auth('user-api')->user()->company_id,'is_admin',0);

        return $this->responseSuccess(EmployeeGetDataResource::collection($employees)->response()->getData(true),200,'تم جلب جميع الموظفين التابعه للشركه العقاريه بنجاح');

    }


    public function create(StoreEmployeeRequest $request): JsonResponse
    {

        try {

            $inputs = $request->validated();

            if ($request->hasFile('employee_image')) {
                $image = $this->fileManagerService->handle("employee_image", "employees/images");
                $inputs['employee_image'] = $image;
            }

            $inputs['company_id'] = auth('user-api')->user()->company_id;
            $inputs['employee_permissions'] = json_encode( $inputs['employee_permissions']);
            $inputs['password'] = Hash::make($inputs['password']);


            $employee = $this->employeeRepository->create($inputs);

            return $this->responseSuccess(new EmployeeGetDataResource($employee), 200, 'تم اضافه بيانات الموظف بنجاح');

        } catch (\Exception $exception) {

            return $this->responseFail(null, 500, $exception->getMessage(), 500);

        }
    }



    public function update($id,UpdateEmployeeRequest $request): JsonResponse
    {

        try {

        $employee = $this->employeeRepository->getByIdWithCondition($id,'is_admin',0);

            Gate::authorize('check-company-auth',$employee);

            $inputs = $request->validated();

        if ($request->hasFile('employee_image')) {
            $image = $this->fileManagerService->handle("employee_image", "employees/images",$employee->employee_image);
            $inputs['employee_image'] = $image;
        }


            $inputs['employee_permissions'] = $request->employee_permissions !== null
                ? json_encode($request->employee_permissions)
                : null;

            $inputs['password'] = Hash::make($inputs['password']);

          $this->employeeRepository->update($employee->id,$inputs);


        return $this->responseSuccess(new EmployeeGetDataResource($this->employeeRepository->getById($id)),200,'تم تعديل بيانات الموظف بنجاح');

     } catch (ModelNotFoundException $exception) {

            return $this->responseFail(null, 404, 'بيانات الموظف غير موجوده', 404);

        } catch (\Exception $exception) {

            return $this->responseFail(
                null, $exception instanceof AuthorizationException ? 403 : 500,
                $exception instanceof AuthorizationException ? 'غير مصرح لك للدخول لذلك الصفحه' : $exception->getMessage(),
                $exception instanceof AuthorizationException ? 403 : 500
            );

        }

    }

    public function delete($id): JsonResponse
    {

    try {

        $employee = $this->employeeRepository->getByIdWithCondition($id,'is_admin',0);

        Gate::authorize('check-company-auth',$employee);

        $this->employeeRepository->delete($employee->id);

        return $this->responseSuccess(null,200,'تم حذف الموظف بنجاح');

    } catch (ModelNotFoundException $exception) {

        return $this->responseFail(null, 404, 'بيانات الموظف غير موجوده', 404);

    }

    }

    public function active($id,ActiveEmployeeRequest $request): JsonResponse
    {

        DB::beginTransaction();
        try {

        $employee = $this->employeeRepository->getByIdWithCondition($id,'is_admin',0);

            Gate::authorize('check-company-auth',$employee);


            $this->employeeRepository->update($employee->id,$request->validated());

        $this->employeeRepository->update($employee->id,['access_token' => null]);

        DB::commit();
        return $this->responseSuccess(new EmployeeGetDataResource($this->employeeRepository->getById($id)),200,'تم تعديل حاله الموظف بنجاح');

    }catch (ModelNotFoundException $exception){

       DB::rollBack();
      return $this->responseFail(null,404,'بيانات الموظف غير موجوده',404);

    }

    }


    public function show($id): JsonResponse
    {

        try {

            $employee = $this->employeeRepository->getByIdWithCondition($id,'is_admin',0);

            Gate::authorize('check-company-auth',$employee);

            return $this->responseSuccess(new EmployeeGetDataResource($employee),200,'تم عرض بيانات الموظف بنجاح');

        }catch (ModelNotFoundException $exception){

            return $this->responseFail(null,404,'بيانات الموظف غير موجوده',404);

        }
    }



}
