<?php

namespace App\Repository\Eloquent;

use App\Models\LandImage;
use App\Repository\LandImageRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class LandImageRepository extends Repository implements LandImageRepositoryInterface
{

    protected Model $model;

    public function __construct(LandImage $model)
    {
        parent::__construct($model);
    }
}
