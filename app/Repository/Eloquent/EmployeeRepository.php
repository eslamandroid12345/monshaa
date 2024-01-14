<?php

namespace App\Repository\Eloquent;

use App\Models\Employee;
use App\Repository\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class EmployeeRepository extends Repository implements EmployeeRepositoryInterface
{

    protected Model $model;

    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }

}
