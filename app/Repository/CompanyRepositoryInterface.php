<?php

namespace App\Repository;

interface CompanyRepositoryInterface extends  RepositoryInterface
{

    public function getAllCompanies();

    public function countEmployees();
    public function checkCompanyLimit();



}
