<?php

namespace App\Http\Controllers\Api\Report;

use App\Http\Controllers\Controller;
use App\Http\Services\Report\ReportService;
use Illuminate\Http\JsonResponse;

class ReportController extends Controller
{
    private ReportService $reportService;

    public function __construct(
       ReportService $reportService
    )
    {
        $this->middleware('permission:states')->only('states');
        $this->middleware('permission:lands')->only('lands');
        $this->middleware('permission:tenant_contracts')->only('tenantContracts');
        $this->middleware('permission:revenue')->only('revenues');
        $this->middleware('permission:expenses')->only('expenses');
        $this->middleware('permission:profits')->only('profits');
        $this->reportService = $reportService;
    }

    public function index()
    {
        return view('admin.reports.index');
    }


    public function states()
    {
        return $this->reportService->states();
    }

    public function lands()
    {
        return $this->reportService->lands();
    }

    public function tenantContracts()
    {
        return $this->reportService->tenantContracts();
    }

    public function revenues()
    {
        return $this->reportService->revenues();
    }

    public function expenses()
    {
        return $this->reportService->expenses();
    }

    public function profits(){

        return $this->reportService->profits();
    }
}
