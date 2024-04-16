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

            $array = [];

            $permissions = json_decode($user->employee_permissions, true);

            foreach ($permissions as $per){

                $array[] = $per;
            }

            if(!in_array($permission,$array)) {

                return $this->responseFail(null, 403,'ليس لديك صلاحيه للوصول لذلك الصفحه يرجي التواصل مع الوكيل او المشرف العام الخاس بك',403);

            }else{
                return $next($request);

            }

        }

    }
}
