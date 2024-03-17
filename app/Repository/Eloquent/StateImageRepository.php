<?php

namespace App\Repository\Eloquent;

use App\Models\StateImage;
use App\Repository\StateImageRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class StateImageRepository extends Repository implements StateImageRepositoryInterface
{

    protected Model $model;

    public function __construct(StateImage $model)
    {
        parent::__construct($model);
    }
}
