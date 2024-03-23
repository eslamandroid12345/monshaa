<?php

namespace App\Repository\Eloquent;

use App\Models\TechnicalSupport;
use App\Repository\TechnicalSupportRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class TechnicalSupportRepository extends Repository implements TechnicalSupportRepositoryInterface
{

    protected Model $model;

    public function __construct(TechnicalSupport $model)
    {
        parent::__construct($model);
    }

}
