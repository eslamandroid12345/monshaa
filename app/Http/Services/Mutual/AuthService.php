<?php

namespace App\Http\Services\Mutual;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

class AuthService
{

    public function checkGuard(){

        if (Auth::guard('user-api')->check()) {
            return Auth::guard('user-api')->id();
        } elseif (Auth::guard('employee-api')->check()) {
            return Auth::guard('employee-api')->user()->user_id;
        } else {
            throw new AuthorizationException('Unauthorized', 401);
        }
    }

    public function checkEmployeeGuard(): int|string|null
    {
        return auth::guard('employee-api')->user() ? Auth::guard('employee-api')->id() : null;
    }
}
