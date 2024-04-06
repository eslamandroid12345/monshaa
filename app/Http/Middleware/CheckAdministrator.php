<?php

namespace App\Http\Middleware;

use App\Http\Traits\Responser;
use Closure;
use Illuminate\Http\Request;

class CheckAdministrator
{

    use Responser;

    public function handle(Request $request, Closure $next)
    {

        $auth = auth('user-api')->user();

        if($auth->is_administrator === 0){
            return $this->responseFail(null, 403, "ليس لديك صلاحيات الوصول لبيانات المشرف", 403);

        }
        return $next($request);
    }
}
