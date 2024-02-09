<?php

namespace App\Repository\Eloquent;

use App\Models\Company;
use App\Repository\CompanyRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CompanyRepository extends Repository implements CompanyRepositoryInterface
{

    protected Model $model;

    public function __construct(Company $model)
    {
        parent::__construct($model);
    }
}
