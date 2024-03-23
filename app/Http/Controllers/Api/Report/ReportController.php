<?php

namespace App\Http\Controllers\Api\Report;

use App\Http\Controllers\Controller;
use App\Http\Services\Report\ReportService;
use Illuminate\Http\JsonResponse;

class ReportController extends Controller
{

    protected ReportService $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;

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
