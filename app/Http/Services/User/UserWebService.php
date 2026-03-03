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
            toastr()->success('تم إضافة بيانات الشركة والمدير بنجاح والنسخه مفعله لمده 7 ايام من يوم التسجيل');
            return redirect()->route('admin.dashboard');
        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error('حدث خطاء اثناء تسجيل النسخه التجريبيه للشركه......');
        }
    }

    public function login(LoginUserRequest $request)
    {
        try {
            $token = auth()->attempt($request->only('phone', 'password'));
            if (!$token) {
                toastr()->error('بيانات الدخول غير صحيحة برجاء إدخال البيانات صحيحة وحاول مرة أخرى');
                return redirect()->back();
            }

            $auth = auth()->user();

            if (!$this->isActiveUser($auth)) {
                $message = $this->getActivationMessage($auth);
                toastr()->error($message);
                return redirect()->back();
            }

            $message = $this->getLoginSuccessMessage($auth);
            toastr()->success($message);
            return redirect()->route('admin.dashboard');

        } catch (\Exception $exception) {
            toastr()->error('يوجد خطاء ما في بيانات الارسال بالسيرفر');
            return redirect()->back();
        }
    }

    public function logout()
    {
       auth()->logout();
        toastr()->success('تم تسجيل الخروج بنجاح');
        return redirect()->route('admin.login.view');

    }
}
