<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Http\Services\Dashboard\Admin\Company\CompanyService;

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

    public function destroy($id){

        return $this->companyService->destroy($id);
    }
}
