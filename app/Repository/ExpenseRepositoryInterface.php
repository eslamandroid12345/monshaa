<?php

namespace App\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ExpenseRepositoryInterface extends RepositoryInterface
{

    public function getAllExpenses();
    public function getAllRevenues();


}
