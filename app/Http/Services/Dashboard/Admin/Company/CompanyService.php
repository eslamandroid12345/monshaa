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


        $companies = $this->companyRepository->getAllCompanies();

        return view('dashboard.companies.index',compact('companies'));
    }


    public function destroy($id)
    {

        $this->companyRepository->delete($id);

        toastr()->error('تم حذف بيانات الشركه بنجاح');

        return redirect()->back();
    }

}
