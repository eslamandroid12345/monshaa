<?php

namespace App\Repository\Eloquent;

use App\Repository\RepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface StateRepositoryInterface extends RepositoryInterface
{

    public function getAllStatusQuery() : LengthAwarePaginator;
}
