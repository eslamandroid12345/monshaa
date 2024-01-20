<?php

namespace App\Repository\Eloquent;

use App\Repository\RepositoryInterface;

interface StateRepositoryInterface extends RepositoryInterface
{

    public function getAllStatusQuery();
}
