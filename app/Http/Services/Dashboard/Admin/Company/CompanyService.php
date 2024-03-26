<?php

namespace App\Http\Services\Dashboard\Admin\Company;

use App\Repository\CompanyRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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


    public function edit($id)
    {

       $company =  $this->companyRepository->getById($id);

        $date1 = Carbon::parse($company->date_start_subscription); // First date
        $date2 = Carbon::parse($company->date_end_subscription); // Second date

        $numberOfDays = $date1->diffInDays($date2);

        return view('dashboard.companies.edit',compact('company','numberOfDays'));

    }


    public function update($id,Request $request): RedirectResponse
    {

        $company = $this->companyRepository->getById($id);

        $numberOfEmployees = $request->input('number_of_employees');

        $this->companyRepository->update($company->id,[
            'date_end_subscription' => $company->date_end,
            'number_of_employees' => $numberOfEmployees,
            'is_active' =>  $request->is_active ?? false,
        ]);

        toastr()->error('نم تعديل بيانات الشركه بنجاح','تعديل');

        return redirect()->route('admin.companies');

    }

    public function destroy($id): RedirectResponse
    {

        $this->companyRepository->delete($id);

        toastr()->error('تم حذف بيانات الشركه بنجاح','حذف');

        return redirect()->back();
    }

}
