<?php

use App\Models\TechnicalSupport;
use Carbon\Carbon;

if(!function_exists('employee')){
    function employee(){
        if (request()->is('api/*'))
        return auth('user-api')->user()->name;
        return auth()->user()->name;

    }
}


if(!function_exists('employeeId')){
    function employeeId()
    {
        if (request()->is('api/*'))
            return auth('user-api')->id();
        return auth()->id();
    }
}

if(!function_exists('companyId')){
    function companyId(){

        if (request()->is('api/*'))
            return auth('user-api')->user()->company_id;
        return auth()->user()->company_id;

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
