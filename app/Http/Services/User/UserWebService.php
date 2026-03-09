<?php

namespace App\Http\Services\User;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\HomePage\HomePageAdminResource;
use App\Http\Resources\HomePage\HomePageEmployeeResource;
use Illuminate\Http\JsonResponse;
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

    public function home()
    {

        $clientsInspections = $this->clientRepository->getAllClientsInspectionToday();
        foreach ($clientsInspections as $client){
            $this->clientRepository->update($client->id,['inspection_notification_send' => 1]);
            $this->sendFirebaseForCompany( ['title' => 'اشعار جديد لديك','body' => 'تذكير مهم للموظف ' . $client->user->name . ' لديك معاينة اليوم مع العميل ' . $client->name . ' الساعة ' . $client->inspection_time], companyId(), 'clients');
        }

        $contractsExpiredCount = $this->tenantContractRepository->getAllContractsExpiredCount(companyId());
        if($contractsExpiredCount > 0){
            $this->sendFirebaseForCompany( ['title' => 'اشعار جديد لديك','body' => ' يجب عليك الاطلاع علي جميع العقود المنتهيه ' ], companyId(), 'expired_contracts');

        }

        $contractsExpired = $this->tenantContractRepository->getAllContractsExpired(companyId());
        foreach ($contractsExpired as $contractExpired) {
            $this->tenantContractRepository->update($contractExpired->id,['is_expired' => 1]);
        }

        return view('admin.dashboard.home');
    }

    public function logout()
    {
       auth()->logout();
        return redirect()->route('admin.login.view')->with('logout','تم تسجيل الخروج بنجاح!');

    }
}
