<?php

namespace App\Http\Middleware;

use App\Http\Traits\Responser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckGuardAuth
{

    use Responser;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $token = $request->bearerToken();

        if ($token) {
            $guards = ['user-api', 'employee-api'];

            foreach ($guards as $guard) {
                if (Auth::guard($guard)->setToken($token)->check()) {

                   if($guard === 'user-api'){

                       return $next($request);

                   }elseif ($guard === 'employee-api'){

                       return  $this->responseFail(null,403,'ليس لديك اي صلاحيه علي هذا الرابط',403);
                   }else{

                       return $this->responseFail(null,401,'Token not present',401);

                   }
                }
            }

        }

    }
}
