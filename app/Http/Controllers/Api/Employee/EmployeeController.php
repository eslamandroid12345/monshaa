<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActiveEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Services\Employee\EmployeeService;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{


    protected EmployeeService $employeeService;

    public function __construct(EmployeeService $employeeService)
    {

        $this->employeeService = $employeeService;
    }

    public function getAllEmployees(): JsonResponse{

        return $this->employeeService->getAllEmployees();

    }


    public function create(StoreEmployeeRequest $request): JsonResponse{

        return $this->employeeService->create($request);

    }


    public function getProfile($id): JsonResponse{


        return $this->employeeService->getProfile($id);

    }


    public function update($id,UpdateEmployeeRequest $request): JsonResponse{

        return $this->employeeService->update($id,$request);

    }

    public function delete($id): JsonResponse{

        return $this->employeeService->delete($id);

    }


    public function active($id,ActiveEmployeeRequest $request): JsonResponse{

        return $this->employeeService->active($id,$request);

    }
}
