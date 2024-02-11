<?php

namespace App\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TenantRepositoryInterface extends RepositoryInterface
{


    public function tenants() : LengthAwarePaginator;


}
