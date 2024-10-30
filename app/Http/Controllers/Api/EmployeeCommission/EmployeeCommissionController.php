<?php

namespace App\Http\Controllers\Api\EmployeeCommission;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeCommission\EmployeeCommissionRequest;
use App\Http\Services\EmployeeCommission\EmployeeCommissionService;
use Illuminate\Http\JsonResponse;

class EmployeeCommissionController extends Controller
{

    public function __construct(
       private readonly EmployeeCommissionService $employeeCommissionService
    )
    {
        $this->middleware('permission:employee_commission');
    }

    public function getAllEmployeesCommissions(): JsonResponse
    {
        return $this->employeeCommissionService->getAllEmployeesCommissions();
    }


    public function create(EmployeeCommissionRequest $request): JsonResponse
    {
        return $this->employeeCommissionService->create($request);

    }

    public function show($id): JsonResponse
    {
        return $this->employeeCommissionService->show($id);

    }


    public function update($id,EmployeeCommissionRequest $request): JsonResponse
    {

        return $this->employeeCommissionService->update($id,$request);

    }

    public function delete($id): JsonResponse
    {
        return $this->employeeCommissionService->delete($id);

    }

}
