<?php

namespace App\Repository;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface LandRepositoryInterface extends RepositoryInterface
{

    public function getAllLandsQuery() : LengthAwarePaginator;

    public function landsReports(): LengthAwarePaginator;



}
