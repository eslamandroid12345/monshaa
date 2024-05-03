<?php

namespace App\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ExpenseRepositoryInterface extends RepositoryInterface
{

    public function getAllExpenses();
    public function getAllRevenues();
    public function getCurrentRevenuesTotal();
    public function getCurrentExpensesTotal();

    public function revenuesReports(): LengthAwarePaginator;

    public function expensesReports(): LengthAwarePaginator;
    public function profits();




}
