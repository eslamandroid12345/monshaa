<?php

namespace App\Http\Services\Dashboard\Admin\Auth;

use App\Http\Requests\Admin\Auth\AdminAuthRequest;
use Illuminate\Http\RedirectResponse;

class AuthService
{


    public function loginView(){

        return view('dashboard.auth_admin.login');
    }
    public function login(AdminAuthRequest $request): RedirectResponse
    {

        $credentials = $request->validated();
        if (auth('admin')->attempt($credentials)) {
            toastr()->success('اهلا بك ايها الادمن في لوحه التحكم','دخول الادمن');
            return redirect()->route('admin.companies');
        } else {

            toastr()->error('بيانات الدخول غير صحيحه');
            return redirect()->back();
        }
    }

    public function logout(): RedirectResponse
    {
        auth('admin')->logout();
        toastr()->error('تم تسجيل الخروج بنجاح','تسجيل خروج');

        return redirect()->route('login');
    }


}
