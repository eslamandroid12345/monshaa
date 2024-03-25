<?php

if(!function_exists('employee')){
    function employee(){

        return auth('user-api')->user()->name;
    }
}


if(!function_exists('employeeId')){
    function employeeId()
    {
        return auth('user-api')->id();
    }
}

if(!function_exists('companyId')){
    function companyId(){

        return auth('user-api')->user()->company_id;
    }
}

