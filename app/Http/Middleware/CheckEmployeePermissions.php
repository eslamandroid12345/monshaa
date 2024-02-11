<?php

namespace App\Http\Middleware;

use App\Http\Traits\Responser;
use Closure;
use Illuminate\Http\Request;

class CheckEmployeePermissions
{

    use Responser;

    public function handle(Request $request, Closure $next,$permission)
    {
        $user = auth('user-api')->user();

        if($user->is_admin == 1){

            return $next($request);

        }else{

            $permissions = json_decode($user->employee_permissions, true);

            if(!in_array($permission,$permissions)){

                return $this->responseFail(null, 403,'ليس لديك صلاحيه للوصول لذلك الصفحه يرجي التواصل مع الوكيل او المشرف العام الخاس بك',403);

            }else{
                return $next($request);

            }

        }

    }
}
