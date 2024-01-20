<?php

namespace App\Http\Services\Mutual;

use Illuminate\Support\Facades\Auth;

class AuthService
{

    public function checkGuard(){

        if(Auth::guard('user-api')->check())
            return Auth::guard('user-api')->id();
        return Auth::guard('employee-api')->user()->user_id;
    }

    public function checkEmployeeGuard(): int|string|null
    {
        return auth::guard('employee-api')->user() ? Auth::guard('employee-api')->id() : null;
    }
}
