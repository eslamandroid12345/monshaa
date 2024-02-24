<?php

namespace App\Repository\Eloquent;

use App\Models\Cash;
use App\Models\TenantContract;
use App\Repository\CashRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CashRepository extends Repository implements CashRepositoryInterface
{

    protected Model $model;

    public function __construct(Cash $model)
    {
        parent::__construct($model);
    }


}
