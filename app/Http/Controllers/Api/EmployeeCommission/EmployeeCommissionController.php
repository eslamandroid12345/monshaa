<?php

namespace App\Http\Controllers\Api\EmployeeCommission;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeCommission\EmployeeCommissionRequest;
use App\Http\Services\EmployeeCommission\EmployeeCommissionService;
use Illuminate\Http\JsonResponse;

class EmployeeCommissionController extends Controller
{


    protected EmployeeCommissionService $employeeCommissionService;

    public function __construct(EmployeeCommissionService $employeeCommissionService)
    {
        $this->employeeCommissionService = $employeeCommissionService;
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
