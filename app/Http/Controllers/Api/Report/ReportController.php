<?php

namespace App\Http\Controllers\Api\Report;

use App\Http\Controllers\Controller;
use App\Http\Services\Report\ReportService;
use Illuminate\Http\JsonResponse;

class ReportController extends Controller
{

    public function __construct(
        private readonly ReportService $reportService
    )
    {
        $this->middleware('permission:states')->only('states');
        $this->middleware('permission:lands')->only('lands');
        $this->middleware('permission:tenant_contracts')->only('tenantContracts');
        $this->middleware('permission:revenue')->only('revenues');
        $this->middleware('permission:expenses')->only('expenses');
        $this->middleware('permission:profits')->only('profits');

    }

    public function states(): JsonResponse
    {

        return $this->reportService->states();
    }


    public function lands(): JsonResponse
    {

        return $this->reportService->lands();
    }

    public function tenantContracts(): JsonResponse
    {

        return $this->reportService->tenantContracts();
    }


    public function revenues(): JsonResponse
    {

        return $this->reportService->revenues();
    }

    public function expenses(): JsonResponse
    {

        return $this->reportService->expenses();
    }

    public function profits(){

        return $this->reportService->profits();
    }
}
