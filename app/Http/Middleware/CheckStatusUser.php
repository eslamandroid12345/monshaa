<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStatusUser
{

    public function handle(Request $request, Closure $next)
    {

        $userAuth = auth('user-api')->user();

        if(!Auth::guard('user-api')->check()){
            return response()->json(['message' => 'User Delete From App' ,'code' => 401],401);
        }elseif ($userAuth->is_active == 0){
            return response()->json(['message' =>'User Not Active' ,'code' => 401],401);

        }else{
            return $next($request);

        }

    }
}
