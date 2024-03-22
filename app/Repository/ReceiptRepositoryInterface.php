<?php

namespace App\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ReceiptRepositoryInterface extends RepositoryInterface
{

    public function receiptCount($tenantContractId): int;


}
