<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckStatusUser
{

    public function handle(Request $request, Closure $next)
    {

        $userAuth = auth('user-api')->user();
        if($userAuth->is_active == 0){
            return response()->json(['message' =>'Token is Invalid' ,'code' => 401],401);

        }
        return $next($request);
    }
}
