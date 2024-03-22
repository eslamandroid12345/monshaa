<?php

namespace App\Http\Controllers\Api\TenantContract;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTenantContractRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantContractRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Http\Services\TenantContract\TenantContractService;
use Illuminate\Http\JsonResponse;

class TenantContractController extends Controller
{

    protected TenantContractService $tenantContractService;

    public function __construct(TenantContractService $tenantContractService)
    {
        $this->tenantContractService = $tenantContractService;
    }


    public function allTenantContracts(): JsonResponse{

        return $this->tenantContractService->allTenantContracts();
    }

    public function  tenantContractsExpired(): JsonResponse{

        return $this->tenantContractService->tenantContractsExpired();
    }

    public function create(StoreTenantRequest $tenantRequest,StoreTenantContractRequest $request): JsonResponse{

        return $this->tenantContractService->create($tenantRequest,$request);

    }


    public function update($id,UpdateTenantRequest $tenantRequest,UpdateTenantContractRequest $request): JsonResponse{

        return $this->tenantContractService->update($id,$tenantRequest,$request);

    }


    public function show($id): JsonResponse{

        return $this->tenantContractService->show($id);

    }

    public function delete($id): JsonResponse{

        return $this->tenantContractService->delete($id);

    }

}
