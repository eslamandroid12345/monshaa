<?php

namespace App\Http\Services\Report;

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
        $revenues = $this->expenseRepository->revenuesReports();
        $total = $this->expenseRepository->getCurrentRevenuesTotal();
        return view('admin.reports.revenue', compact('revenues','total'));
    }

    public function expenses()
    {
        $expenses = $this->expenseRepository->expensesReports();
        $total = $this->expenseRepository->getCurrentExpensesTotal();
        return view('admin.reports.expenses', compact('expenses','total'));

    }

    public function profits(){
        $profits = $this->expenseRepository->profits();
        return view('admin.reports.profits', compact('profits'));


    }

}
