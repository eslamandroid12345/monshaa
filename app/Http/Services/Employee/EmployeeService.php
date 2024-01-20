<?php

namespace App\Http\Services\Employee;

use App\Http\Requests\ActiveEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeGetDataResource;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\UserResource;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $employees = $this->employeeRepository->get('user_id',auth('user-api')->id());

        return $this->responseSuccess(EmployeeGetDataResource::collection($employees),200,'تم جلب جميع الموظفين التابعه للشركه العقاريه بنجاح');

    }


    public function create(StoreEmployeeRequest $request): JsonResponse
    {

        $inputs = $request->validated();

        if ($request->hasFile('image')) {
            $image = $this->fileManagerService->handle("image", "employees/images");
            $inputs['image'] = $image;
        }

        $inputs['user_id'] = auth('user-api')->id();
        $inputs['password'] = Hash::make($inputs['password']);


        $employee = $this->employeeRepository->create($inputs);

        return $this->responseSuccess(new EmployeeGetDataResource($employee),200,'تم اضافه بيانات الموظف بنجاح');

    }



    public function getProfile($id): JsonResponse
    {

        try {

            $employee = $this->employeeRepository->getById($id);

            return $this->responseSuccess(new EmployeeGetDataResource($employee),200,'تم عرض بيانات الموظف بنجاح');

        }catch (ModelNotFoundException $exception){

            return $this->responseFail(null,404,'بيانات الموظف غير موجوده',404);

        }

    }


    public function update($id,UpdateEmployeeRequest $request): JsonResponse
    {

        try {

        $employee = $this->employeeRepository->getById($id);

        $inputs = $request->validated();

        if ($request->hasFile('image')) {
            $image = $this->fileManagerService->handle("image", "employees/images",$employee->image);
            $inputs['image'] = $image;
        }

        $inputs['password'] = Hash::make($inputs['password']);

        $this->employeeRepository->update($employee->id,$inputs);


        return $this->responseSuccess(new EmployeeGetDataResource($this->employeeRepository->getById($id)),200,'تم تعديل بيانات الموظف بنجاح');

    }catch (ModelNotFoundException $exception){

     return $this->responseFail(null,404,'بيانات الموظف غير موجوده',404);

    }

    }

    public function delete($id): JsonResponse
    {

    try {

        $employee = $this->employeeRepository->getById($id);

         $this->employeeRepository->delete($employee->id);

        return $this->responseSuccess(null,200,'تم حذف الموظف بنجاح');

    }catch (ModelNotFoundException $exception){

       return $this->responseFail(null,404,'بيانات الموظف غير موجوده',404);

      }

    }


    public function active($id,ActiveEmployeeRequest $request): JsonResponse
    {

        try {

        $employee = $this->employeeRepository->getById($id);

        $this->employeeRepository->update($employee->id,$request->validated());

        return $this->responseSuccess(new EmployeeGetDataResource($this->employeeRepository->getById($id)),200,'تم تعديل حاله الموظف بنجاح');

    }catch (ModelNotFoundException $exception){

      return $this->responseFail(null,404,'بيانات الموظف غير موجوده',404);

    }

    }


    public function getProfileEmployee(): JsonResponse
    {

        $auth = Auth::guard('employee-api')->user();

        return $this->responseSuccess(new EmployeeResource($auth), 200, 'تم الحصول على بيانات بروفايل الموظف بنجاح');

    }

    public function logout(): JsonResponse
    {

        auth('employee-api')->logout();

        return $this->responseSuccess(null, 200, 'تم تسجيل خروج الموظف بنجاح');

    }

}
