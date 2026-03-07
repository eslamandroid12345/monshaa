<?php

namespace App\Http\Services\Employee;

use App\Http\Requests\ActiveEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class EmployeeWebService extends EmployeeService
{

    public function getAllEmployees()
    {
        $employees = $this->employeeRepository->listOfCompanyEmployees();
        return view('admin.employees.index', compact('employees'));
    }

    public function create(StoreEmployeeRequest $request)
    {
        try {
            $inputs = $request->validated();
            $users = $this->employeeRepository->get('company_id',companyId());
            $names = [];
            foreach ($users as $user){
                $names[] = $user->name;
            }

            if(in_array($inputs['name'],$names)){

                toastr()->info('هذا الاسم موجود من قبل يرجي ادخال الاسم رباعي');
                return redirect()->back();
            }

            if(auth()->user()->company->is_package == 0 && $this->companyRepository->countEmployees() == $this->companyRepository->checkCompanyLimit()){
                toastr()->info('لقد تعديت الحد الاقصي لاضافه للموظفين يرجي الانتقال لمرحله الاشتراك !');
            }else{
                if ($request->hasFile('employee_image')) {
                    $image = $this->fileManagerService->handle("employee_image", "employees/images");
                    $inputs['employee_image'] = $image;
                }

                $inputs['company_id'] = companyId();

                $defaultPermissionsAssignToEmployee = ['home_page', 'setting', 'reports', 'notifications'];

                $employeePermissions = is_string($inputs['employee_permissions'])
                    ? json_decode($inputs['employee_permissions'], true)
                    : $inputs['employee_permissions'];

                $mergedPermissions = array_unique(array_merge($defaultPermissionsAssignToEmployee, $employeePermissions));
                $inputs['employee_permissions'] = json_encode($mergedPermissions);

                $inputs['password_show'] = $inputs['password'];
                $inputs['password'] = Hash::make($inputs['password']);
                $this->employeeRepository->create($inputs);

                $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم اضافه موظف جديد لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'employees');

                toastr()->success('تم اضافه بيانات الموظف بنجاح');
            }
            return redirect()->back();

        } catch (\Exception $exception) {

            toastr()->error('حدث خطاء اثناء اضافه بيانات الموظف!');
            return redirect()->back();
        }
    }


    public function update($id,UpdateEmployeeRequest $request)
    {
        try {
            $employee = $this->employeeRepository->getByIdWithCondition($id,'is_admin',0);
            Gate::authorize('check-company-auth',$employee);
            $inputs = $request->validated();

            if ($request->hasFile('employee_image')) {
                $image = $this->fileManagerService->handle("employee_image", "employees/images",$employee->employee_image);
                $inputs['employee_image'] = $image;
            }


            $defaultPermissionsAssignToEmployee = ['home_page', 'setting', 'reports', 'notifications'];

            $employeePermissions = is_string($inputs['employee_permissions'])
                ? json_decode($inputs['employee_permissions'], true)
                : $inputs['employee_permissions'];

            $mergedPermissions = array_unique(array_merge($defaultPermissionsAssignToEmployee, $employeePermissions));

            $inputs['employee_permissions'] = json_encode($mergedPermissions);
            $inputs['password_show'] = $inputs['password'];
            $inputs['password'] = Hash::make($inputs['password']);
            $inputs['is_active'] = $request->is_active ?? $employee->is_active;

            $this->employeeRepository->update($employee->id,$inputs);

            toastr()->success('تم تعديل بيانات الموظف بنجاح');
            return redirect()->back();
        }  catch (\Exception $e) {
            toastr()->error('يوجد خطاء اثناء تعديل بيانات الموظف');
            return redirect()->back();
        }
    }

    public function delete($id)
    {

        $employee = $this->employeeRepository->getByIdWithCondition($id,'is_admin',0);
        Gate::authorize('check-company-auth',$employee);
        $this->employeeRepository->delete($employee->id);

        toastr()->success('تم حذف بيانات الموظف بنجاح');
        return redirect()->back();

    }

    public function active($id,ActiveEmployeeRequest $request)
    {
        DB::beginTransaction();
        try {
            $employee = $this->employeeRepository->getByIdWithCondition($id,'is_admin',0);
            Gate::authorize('check-company-auth',$employee);
            $this->employeeRepository->update($employee->id,$request->validated());
            $this->employeeRepository->update($employee->id,['access_token' => null]);

            DB::commit();
            toastr()->success('تم تحديث حاله الموظف بنجاح');
            return redirect()->back();

        }catch (\Exception $e) {
            toastr()->error('يوجد خطاء اثناء تحديث حاله الموظف');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $employee = $this->employeeRepository->getByIdWithCondition($id,'is_admin',0);
        Gate::authorize('check-company-auth',$employee);
        return view('admin.employees.show', compact('employee'));

    }
}
