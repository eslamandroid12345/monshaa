<?php

namespace App\Repository;

interface EmployeeCommissionRepositoryInterface extends RepositoryInterface
{

    public function getAllEmployeesCommissions();
    public function getCurrentTotalCommission();
}
