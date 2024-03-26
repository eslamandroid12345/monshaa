<?php

use App\Models\Company;
use App\Models\TechnicalSupport;
use Carbon\Carbon;

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


if(!function_exists('messagesCount')){
    function messagesCount(): int
    {
        return TechnicalSupport::query()
            ->whereDate('created_at','=',Carbon::now()->format('Y-m-d'))
            ->count();
    }
}


if(!function_exists('checkAccountType')){
    function checkAccountType($id): int
    {
        $company =  Company::query()->findOrFail($id);

        $date1 = Carbon::parse($company->date_start_subscription);
        $date2 = Carbon::parse($company->date_end_subscription);

        return $date1->diffInDays($date2);
    }
}

