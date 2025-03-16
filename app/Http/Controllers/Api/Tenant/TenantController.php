<?php

namespace App\Http\Controllers\Api\Tenant;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Http\Services\Tenant\TenantService;
use Illuminate\Http\JsonResponse;

class TenantController extends Controller
{

    private readonly TenantService $tenantService;
    public function __construct(
       TenantService $tenantService
    )
    {
        $this->tenantService = $tenantService;
    }

    public function getAllTenants(): JsonResponse{

        return  $this->tenantService->getAllTenants();
    }

    public function create(StoreTenantRequest $request): JsonResponse{

        return  $this->tenantService->create($request);
    }

    public function update($id,UpdateTenantRequest $request): JsonResponse{

        return  $this->tenantService->update($id,$request);
    }

    public function show($id): JsonResponse{

        return  $this->tenantService->show($id);
    }

    public function delete($id): JsonResponse{

        return  $this->tenantService->delete($id);
    }
}
