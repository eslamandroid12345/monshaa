<?php

namespace App\Repository\Eloquent;
use App\Models\Receipt;
use App\Repository\ReceiptRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ReceiptRepository extends Repository implements ReceiptRepositoryInterface
{

    protected Model $model;

    public function __construct(Receipt $model)
    {
        parent::__construct($model);
    }



    public function receiptCount($tenantContractId): int
    {

        return $this->model::query()
            ->where('company_id','=',companyId())
            ->where('tenant_contract_id','=',$tenantContractId)
            ->count();
    }


}
