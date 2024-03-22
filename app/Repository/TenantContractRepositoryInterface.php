<?php

namespace App\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TenantContractRepositoryInterface extends RepositoryInterface
{

    public function allTenantContracts() : LengthAwarePaginator;
    public function tenantContractsExpired() : LengthAwarePaginator;
    public function TenantContractsByFinancialBonds() : LengthAwarePaginator;
}
