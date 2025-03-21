<?php

namespace App\Http\Controllers\Admin\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Company\CompanyUpdateRequest;
use App\Http\Services\Dashboard\Admin\Company\CompanyService;

class CompanyController extends Controller
{
    private CompanyService $companyService;

    public function __construct(
       CompanyService $companyService
    )
    {
        $this->companyService = $companyService;
    }

    public function getAllCompanies()
    {
        return $this->companyService->getAllCompanies();
    }

    public function edit($id)
    {
        return $this->companyService->edit($id);
    }

    public function update($id,CompanyUpdateRequest $request)
    {
        return $this->companyService->update($id,$request);
    }

    public function destroy($id)
    {
        return $this->companyService->destroy($id);
    }
}
