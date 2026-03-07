<?php

namespace App\Http\Controllers\Api\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActiveEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Services\Employee\EmployeeService;
use App\Models\Land;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{

    private  EmployeeService $employeeService;
    public function __construct(
     EmployeeService $employeeService
    )
    {
        $this->employeeService = $employeeService;
    }

    public function getAllEmployees()
    {
        return $this->employeeService->getAllEmployees();
    }

    public function create(StoreEmployeeRequest $request){

        return $this->employeeService->create($request);
    }

    public function show($id){
        return $this->employeeService->show($id);
    }

    public function edit($id){
        if (request()->ajax()) {
            $employee = User::query()->findOrFail($id);
            return view('admin.employees.edit',compact('employee'));
        }
    }


    public function update($id,UpdateEmployeeRequest $request){

        return $this->employeeService->update($id,$request);
    }

    public function delete($id){

        return $this->employeeService->delete($id);
    }

    public function active($id,ActiveEmployeeRequest $request){

        return $this->employeeService->active($id,$request);
    }
}
