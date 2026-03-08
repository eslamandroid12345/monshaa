<?php

namespace App\Http\Controllers\Api\EmployeeCommission;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeCommission\EmployeeCommissionRequest;
use App\Http\Services\EmployeeCommission\EmployeeCommissionService;
use App\Models\EmployeeCommission;
use App\Models\Expense;
use App\Models\User;

class EmployeeCommissionController extends Controller
{
    private EmployeeCommissionService $employeeCommissionService;

    public function __construct(
      EmployeeCommissionService $employeeCommissionService
    )
    {
        $this->middleware('permission:employee_commission');
        $this->employeeCommissionService = $employeeCommissionService;
    }

    public function getAllEmployeesCommissions()
    {
        return $this->employeeCommissionService->getAllEmployeesCommissions();
    }

    public function create(EmployeeCommissionRequest $request)
    {
        return $this->employeeCommissionService->create($request);
    }

    public function show($id)
    {
        return $this->employeeCommissionService->show($id);
    }

    public function edit($id){
        if (request()->ajax()) {
            $commission = EmployeeCommission::query()->findOrFail($id);
            $employees = User::query() ->select('id','name','company_id')
                ->where('company_id','=',companyId())
                ->get();
            return view('admin.commissions.edit',compact('commission','employees'));
        }
    }

    public function update($id,EmployeeCommissionRequest $request)
    {
        return $this->employeeCommissionService->update($id,$request);
    }

    public function delete($id)
    {
        return $this->employeeCommissionService->delete($id);
    }

}
