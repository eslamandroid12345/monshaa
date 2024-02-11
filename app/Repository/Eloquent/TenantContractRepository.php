<?php

namespace App\Repository\Eloquent;
use App\Models\TenantContract;
use App\Repository\TenantContractRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class TenantContractRepository extends Repository implements TenantContractRepositoryInterface
{

    protected Model $model;

    public function __construct(TenantContract $model)
    {
        parent::__construct($model);
    }

}
