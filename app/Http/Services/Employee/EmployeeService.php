<?php

namespace App\Http\Services\Employee;

use App\Http\Requests\ActiveEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeGetDataResource;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\FirebaseNotification;
use App\Http\Traits\Responser;
use App\Repository\CompanyRepositoryInterface;
use App\Repository\EmployeeRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class EmployeeService
{

    use Responser,FirebaseNotification;
    protected EmployeeRepositoryInterface $employeeRepository;

    protected FileManagerService $fileManagerService;

    protected GetService $getService;

    protected  CompanyRepositoryInterface $companyRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository,FileManagerService $fileManagerService, GetService $getService,CompanyRepositoryInterface $companyRepository)
    {

        $this->employeeRepository = $employeeRepository;
        $this->fileManagerService = $fileManagerService;
        $this->getService = $getService;
        $this->companyRepository = $companyRepository;

    }


    public function getAllEmployees(): JsonResponse
    {

        return $this->getService->handle(resource: EmployeeGetDataResource::class,repository: $this->employeeRepository,method: 'getByTwoColumns',parameters: ['company_id',companyId(),'is_admin',0],message:'تم جلب جميع الموظفين التابعه للشركه العقاريه بنجاح',dataType: 'get');

    }


    public function create(StoreEmployeeRequest $request): JsonResponse
    {
        try {

            $inputs = $request->validated();

           if($this->companyRepository->countEmployees() <= $this->companyRepository->checkCompanyLimit()){

               if ($request->hasFile('employee_image')) {
                   $image = $this->fileManagerService->handle("employee_image", "employees/images");
                   $inputs['employee_image'] = $image;
               }

               $inputs['company_id'] = companyId();
               $inputs['employee_permissions'] = json_encode( $inputs['employee_permissions']);
               $inputs['password'] = Hash::make($inputs['password']);

               $employee = $this->employeeRepository->create($inputs);

               $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم اضافه موظف جديد لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'employees');

               return $this->getService->handle(resource: EmployeeGetDataResource::class,repository: $this->employeeRepository,method: 'getById',parameters: [$employee->id],is_instance: true,message:'تم اضافه البيانات بنجاح' );

           }else{

               return $this->responseFail(null, 411, message: 'لقد نعديت الحد الاقصي لاضافه للموظفين يرجي التواصل مع الادمن !');
           }

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

            return $this->getService->handle(resource: EmployeeGetDataResource::class,repository: $this->employeeRepository,method: 'getById',parameters: [$id],is_instance: true,message: 'تم تعديل بيانات الموظف بنجاح' );

       } catch (ModelNotFoundException $exception) {
            return $this->responseFail(null, 404, 'بيانات الموظف غير موجوده', 404);

        } catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {
            return $this->responseFail(null, 500, $e->getMessage(), 500);

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

    }catch (AuthorizationException $exception){
        return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

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
            return $this->getService->handle(resource: EmployeeGetDataResource::class,repository: $this->employeeRepository,method: 'getByIdWithCondition',parameters: [$id,'is_admin',0],is_instance: true,message: 'تم تعديل حاله الموظف بنجاح');


        }catch (ModelNotFoundException $exception){
      return $this->responseFail(null,404,'بيانات الموظف غير موجوده',404);

    }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        } catch (\Exception $e) {

            DB::rollBack();
            return $this->responseFail(null, 500, $e->getMessage(), 500);

        }

    }


    public function show($id): JsonResponse
    {
        try {

            $employee = $this->employeeRepository->getByIdWithCondition($id,'is_admin',0);

            Gate::authorize('check-company-auth',$employee);
            return $this->getService->handle(resource: EmployeeGetDataResource::class,repository: $this->employeeRepository,method: 'getByIdWithCondition',parameters: [$id,'is_admin',0],is_instance: true,message:'تم عرض بيانات الموظف بنجاح' );

        }catch (ModelNotFoundException $exception){
            return $this->responseFail(null,404,'بيانات الموظف غير موجوده',404);

        }catch (AuthorizationException $exception){
            return $this->responseFail(null, 403, 'غير مصرح لك للدخول لذلك الصفحه',403);

        }
    }



}
