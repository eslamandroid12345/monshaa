<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\Admin\Company\CompanyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{


    protected CompanyService $companyService;

    public function __construct( CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }


    public function getAllCompanies(){

        return $this->companyService->getAllCompanies();
    }

    public function edit($id){

        return $this->companyService->edit($id);
    }

    public function update($id,Request $request): RedirectResponse
    {

        return $this->companyService->update($id,$request);
    }

    public function destroy($id){

        return $this->companyService->destroy($id);
    }
}
