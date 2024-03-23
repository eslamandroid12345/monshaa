<?php

namespace App\Http\Services\Dashboard\Admin\Company;

use App\Repository\CompanyRepositoryInterface;

class CompanyService
{

    protected CompanyRepositoryInterface $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getAllCompanies(){


        $companies = $this->companyRepository->paginate();

        return view('dashboard.companies.index',compact('companies'));
    }

}
