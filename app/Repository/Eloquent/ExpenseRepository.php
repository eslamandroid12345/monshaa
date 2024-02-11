<?php

namespace App\Repository\Eloquent;

use App\Models\Expense;
use App\Repository\ExpenseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ExpenseRepository  extends Repository implements ExpenseRepositoryInterface
{

    protected Model $model;

    public function __construct(Expense $model)
    {
        parent::__construct($model);
    }

}
