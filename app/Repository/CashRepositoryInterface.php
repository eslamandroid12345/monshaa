<?php

namespace App\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CashRepositoryInterface extends RepositoryInterface
{

    public function countCash($tenantContractId): int;

}
