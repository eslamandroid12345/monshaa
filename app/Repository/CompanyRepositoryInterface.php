<?php

namespace App\Repository;

interface CompanyRepositoryInterface extends  RepositoryInterface
{

    public function countEmployees();
    public function checkCompanyLimit();



}
