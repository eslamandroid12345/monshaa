<?php

namespace App\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface StateRepositoryInterface extends RepositoryInterface
{

    public function getAllStatusQuery() : LengthAwarePaginator;
}
