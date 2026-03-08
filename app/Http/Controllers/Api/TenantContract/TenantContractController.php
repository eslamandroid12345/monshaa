<?php

namespace App\Http\Controllers\Api\TenantContract;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTenantContractRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantContractRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Http\Services\TenantContract\TenantContractService;
use App\Models\TenantContract;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class TenantContractController extends Controller
{
    private TenantContractService $tenantContractService;

    public function __construct(
     TenantContractService $tenantContractService
    )
    {
        $this->tenantContractService = $tenantContractService;
    }

    public function allTenantContracts(){

        return $this->tenantContractService->allTenantContracts();
    }

    public function  tenantContractsExpired(){

        return $this->tenantContractService->tenantContractsExpired();
    }

    public function  removeFromScreen($id){

        return $this->tenantContractService->removeFromScreen($id);
    }

    public function create(StoreTenantRequest $tenantRequest,StoreTenantContractRequest $request){

        return $this->tenantContractService->create($tenantRequest,$request);
    }

    public function update($id,UpdateTenantRequest $tenantRequest,UpdateTenantContractRequest $request){

        return $this->tenantContractService->update($id,$tenantRequest,$request);
    }

    public function edit($id){
        if (request()->ajax()) {
            $contract = TenantContract::query()->findOrFail($id);
            return view('admin.contracts.edit',compact('contract'));
        }
    }

    public function show($id){

        return $this->tenantContractService->show($id);
    }

    public function delete($id){

        return $this->tenantContractService->delete($id);
    }
}
