<?php

namespace App\Repository\Eloquent;
use App\Models\FinancialBonds;
use App\Repository\FinancialBondsRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FinancialBondsRepository extends Repository implements FinancialBondsRepositoryInterface
{

    protected Model $model;

    public function __construct(FinancialBonds $model)
    {
        parent::__construct($model);
    }


}
