<?php

namespace App\Http\Services\Employee;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
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
                return redirect()->back()->with('employee_limit_error','لقد تعديت الحد الاقصي لاضافه للموظفين يرجي الانتقال لمرحله الاشتراك !');
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
                return redirect()->back()->with('employee_create','تم اضافه بيانات الموظف بنجاح');
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('employee_create_error','حدث خطاء اثناء اضافه بيانات الموظف!');
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
            return redirect()->back()->with('employee_update','تم تعديل بيانات الموظف بنجاح!');
        }  catch (\Exception $e) {
            return redirect()->back()->with('employee_update_error','يوجد خطاء اثناء تعديل بيانات الموظف');

        }
    }

    public function delete($id)
    {

        $employee = $this->employeeRepository->getByIdWithCondition($id,'is_admin',0);
        Gate::authorize('check-company-auth',$employee);
        $this->employeeRepository->delete($employee->id);
        return redirect()->back()->with('employee_delete','تم حذف بيانات الموظف بنجاح!');
    }

    public function show($id)
    {
        $employee = $this->employeeRepository->getByIdWithCondition($id,'is_admin',0);
        Gate::authorize('check-company-auth',$employee);
        return view('admin.employees.show', compact('employee'));

    }
}
