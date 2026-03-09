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
            return redirect()->back()->with('commission_index_error','يوجد خطاء اثناء عرض بيانات عموله الموظفين يرجي اعاده المحاوله!');

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

            return redirect()->back()->with('commission_create','تم اضافه بيانات عموله الموظفين بنجاح');
        }catch (\Exception $e) {
            return redirect()->back()->with('commission_create_error','يوجد خطاء اثناء تسجيل بيانات عموله الموظفين يرجي اعاده المحاوله!');

        }
    }


    public function update($id,EmployeeCommissionRequest $request)
    {
        try {
            $employeeCommission = $this->employeeCommissionRepository->getById($id);
            Gate::authorize('check-company-auth',$employeeCommission);
            $inputs = $request->validated();
            $this->employeeCommissionRepository->update($employeeCommission->id,$inputs);

            return redirect()->back()->with('commission_update','تم تحديث بيانات عموله الموظفين بنجاح');

        }catch (\Exception $e) {
            return redirect()->back()->with('commission_update_error','يوجد خطاء اثناء تحديث بيانات عموله الموظفين يرجي اعاده المحاوله!');

        }
    }

    public function delete($id)
    {
        try {
            $employeeCommission = $this->employeeCommissionRepository->getById($id);
            Gate::authorize('check-company-auth',$employeeCommission);
            $this->employeeCommissionRepository->delete($employeeCommission->id);

            return redirect()->back()->with('commission_delete','تم حذف عموله الموظف بنجاح');

        } catch (\Exception $e) {
            return redirect()->back()->with('commission_delete_error','يوجد خطاء اثناء حذف بيانات عموله الموظفين يرجي اعاده المحاوله!');

        }
    }
}
