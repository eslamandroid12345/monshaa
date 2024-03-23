<?php

namespace App\Http\Services\Report;

use App\Http\Resources\ExpenseResource;
use App\Http\Resources\LandResource;
use App\Http\Resources\StateResource;
use App\Http\Resources\TenantContractResource;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\Responser;
use App\Repository\ExpenseRepositoryInterface;
use App\Repository\LandRepositoryInterface;
use App\Repository\StateRepositoryInterface;
use App\Repository\TenantContractRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ReportService
{


    use Responser;

    protected GetService $getService;

    protected StateRepositoryInterface $stateRepository;
    protected LandRepositoryInterface $landRepository;
    protected TenantContractRepositoryInterface $tenantContractRepository;
    protected ExpenseRepositoryInterface $expenseRepository;

    public function __construct(GetService $getService,StateRepositoryInterface $stateRepository,LandRepositoryInterface $landRepository,TenantContractRepositoryInterface $tenantContractRepository,ExpenseRepositoryInterface $expenseRepository)
    {

        $this->getService = $getService;
        $this->stateRepository = $stateRepository;
        $this->landRepository = $landRepository;
        $this->tenantContractRepository = $tenantContractRepository;
        $this->expenseRepository = $expenseRepository;
    }


    public function states(): JsonResponse
    {
        return $this->getService->handle(resource: StateResource::class,repository: $this->stateRepository,method: 'statesReports',message:'تم الحصول علي جميع العقارات بنجاح' );

    }


    public function lands(): JsonResponse
    {

        return $this->getService->handle(resource: LandResource::class,repository: $this->landRepository,method: 'landsReports',message:'تم الحصول علي جميع الاراضي بنجاح' );


    }

    public function tenantContracts(): JsonResponse
    {

        return $this->getService->handle(resource: TenantContractResource::class,repository: $this->tenantContractRepository,method: 'tenantContractsReports',message:'تم الحصول علي جميع عقود الايجار بنجاح' );

    }


    public function revenues(): JsonResponse
    {

        return $this->getService->handle(resource: ExpenseResource::class,repository: $this->expenseRepository,method: 'revenuesReports',message:'تم الحصول علي جميع الايردات بنجاح' );

    }

    public function expenses(): JsonResponse
    {

        return $this->getService->handle(resource: ExpenseResource::class,repository: $this->expenseRepository,method: 'expensesReports',message:'تم الحصول علي جميع المصروفات بنجاح' );

    }

    public function profits(){

        return $this->expenseRepository->profits();
    }

}
