<?php

namespace App\Http\Services\Report;

use App\Http\Resources\ExpenseResource;
use App\Http\Resources\TenantContractResource;

class ReportWebService extends ReportService
{

    public function states()
    {
        $states = $this->stateRepository->statesReports();
        return view('admin.reports.states', compact('states'));
    }


    public function lands()
    {
        $lands = $this->landRepository->landsReports();
        return view('admin.reports.lands', compact('lands'));
    }

    public function tenantContracts()
    {
        $contracts = $this->tenantContractRepository->tenantContractsReports();
        return view('admin.reports.contracts', compact('contracts'));
    }

    public function revenues()
    {
        $data = $this->expenseRepository->revenuesReports();
        return $this->responseSuccess(data: ExpenseResource::collection($data)->response()->getData(true),code: 200,message: 'تم الحصول على بيانات جميع الايردات بنجاح',status: 200,newAttributeName: 'total',newAttributeValue: $this->expenseRepository->getCurrentRevenuesTotal());
    }

    public function expenses()
    {
        $data = $this->expenseRepository->expensesReports();
        return $this->responseSuccess(data: ExpenseResource::collection($data)->response()->getData(true),code: 200,message: 'تم الحصول على بيانات جميع المصروفات بنجاح',status: 200,newAttributeName: 'total',newAttributeValue: $this->expenseRepository->getCurrentExpensesTotal());
    }

    public function profits(){
        return $this->expenseRepository->profits();
    }

}
