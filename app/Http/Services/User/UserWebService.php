<?php

namespace App\Http\Services\User;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\DB;

class UserWebService extends UserService
{
    public function register(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $company = $this->createCompany($request);
            $this->createUser($request,$company);

            DB::commit();
            auth()->attempt($request->only('phone', 'password'));
            return redirect()->route('admin.dashboard')->with('register','تم إضافة بيانات الشركة والمدير بنجاح والنسخه مفعله لمده 7 ايام من يوم التسجيل');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('register_fail','حدث خطاء اثناء تسجيل النسخه التجريبيه للشركه!');
        }
    }

    public function login(LoginUserRequest $request)
    {
        try {
            $token = auth()->attempt($request->only('phone', 'password'));
            if (!$token) {
                return redirect()->back()->with('login_failed','بيانات الدخول غير صحيحة برجاء إدخال البيانات صحيحة وحاول مرة أخرى');
            }

            $auth = auth()->user();

            if (!$this->isActiveUser($auth)) {
                $message = $this->getActivationMessage($auth);
                toastr()->error($message);
                return redirect()->back();
            }

            $message = $this->getLoginSuccessMessage($auth);
            return redirect()->route('admin.dashboard')->with('login',$message);

        } catch (\Exception $exception) {
            return redirect()->back()->with('login_fail','حدث خطاء اثناء تسجيل الدخول يرجي اعاده المحاوله!');

        }
    }

    public function logout()
    {
       auth()->logout();
        return redirect()->route('admin.login.view')->with('logout','تم تسجيل الخروج بنجاح!');

    }
}
