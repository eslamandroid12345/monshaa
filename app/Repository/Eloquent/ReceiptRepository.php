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



}
