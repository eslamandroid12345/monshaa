<?php

namespace App\Repository;

interface EmployeeRepositoryInterface extends RepositoryInterface
{

    public function getAllEmployees();
    public function listOfCompanyEmployees();



}
