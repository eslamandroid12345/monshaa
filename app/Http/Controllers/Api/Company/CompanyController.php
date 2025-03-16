<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CompanyRequest;
use App\Http\Services\Company\CompanyService;
use Illuminate\Http\JsonResponse;

class CompanyController extends Controller
{
    private  CompanyService $companyService;

    public function __construct(
       CompanyService $companyService
    )
    {
        $this->companyService = $companyService;
    }

    public function getAllCompanies(): JsonResponse
    {
        return $this->companyService->getAllCompanies();
    }

    public function show($id): JsonResponse
    {
        return $this->companyService->show($id);
    }

    public function update($id,CompanyRequest $request): JsonResponse
    {
        return $this->companyService->update($id,$request);
    }

    public function delete($id): JsonResponse
    {
        return $this->companyService->delete($id);
    }

}
