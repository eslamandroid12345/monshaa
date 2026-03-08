<?php

namespace App\Http\Services\EmployeeCommission;

use App\Http\Requests\EmployeeCommission\EmployeeCommissionRequest;
use Illuminate\Support\Facades\Gate;

class EmployeeCommissionWebService extends EmployeeCommissionService
{
    public function getAllEmployeesCommissions()
    {
        try {

            $commissions = $this->employeeCommissionRepository->getAllEmployeesCommissions();
            $total = $this->employeeCommissionRepository->getCurrentTotalCommission();
            $employees = $this->userRepository->usersSelect();
            return view('admin.commissions.index',compact('commissions','total','employees'));

        }catch (\Exception $e) {
            toastr()->error('يوجد خطاء اثناء عرض بيانات عموله الموظفين', 'Error');
            return redirect()->back();
        }
    }

    public function create(EmployeeCommissionRequest $request)
    {
        try {
            $inputs = $request->validated();
            $inputs['company_id'] = companyId();
            $inputs['user_id'] = employeeId();

            $this->employeeCommissionRepository->create($inputs);
            $this->sendFirebaseNotification(data:['title' => 'اشعار جديد لديك','body' => ' تم اضافه عموله لموظف لديك بواسطه ' . employee() ],userId: employeeId(),permission: 'employee_commission');

            toastr()->success('تم اضافه بيانات عموله الموظفين بنجاح');
            return redirect()->back();
        }catch (\Exception $e) {
            toastr()->error('يوجد خطاء اثناء تسجيل بيانات عموله الموظفين', 'Error');
            return redirect()->back();
        }
    }


    public function update($id,EmployeeCommissionRequest $request)
    {
        try {
            $employeeCommission = $this->employeeCommissionRepository->getById($id);
            Gate::authorize('check-company-auth',$employeeCommission);
            $inputs = $request->validated();
            $this->employeeCommissionRepository->update($employeeCommission->id,$inputs);

            toastr()->success('تم تحديث بيانات عموله الموظفين بنجاح');
            return redirect()->back();
        }catch (\Exception $e) {
            toastr()->error('يوجد خطاء اثناء تحديث بيانات عموله الموظفين', 'Error');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            $employeeCommission = $this->employeeCommissionRepository->getById($id);
            Gate::authorize('check-company-auth',$employeeCommission);
            $this->employeeCommissionRepository->delete($employeeCommission->id);

            toastr()->success('تم حذف عموله الموظف بنجاح');
            return redirect()->back();
        } catch (\Exception $e) {
            toastr()->error('يوجد خطاء اثناء حذف بيانات عموله الموظفين', 'Error');
            return redirect()->back();
        }
    }
}
