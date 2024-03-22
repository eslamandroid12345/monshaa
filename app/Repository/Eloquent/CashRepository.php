<?php

namespace App\Repository\Eloquent;

use App\Models\Cash;
use App\Repository\CashRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CashRepository extends Repository implements CashRepositoryInterface
{

    protected Model $model;

    public function __construct(Cash $model)
    {
        parent::__construct($model);
    }


    public function countCash($tenantContractId): int
    {

        return $this->model::query()
            ->where('company_id','=',companyId())
            ->where('tenant_contract_id','=',$tenantContractId)
            ->count();
    }

}
