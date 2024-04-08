<?php

namespace App\Http\Services\Dashboard\Admin\Company;
use App\Repository\CompanyRepositoryInterface;
use App\Repository\FcmTokenRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class CompanyService
{

    protected CompanyRepositoryInterface $companyRepository;
    protected UserRepositoryInterface $userRepository;
    protected FcmTokenRepositoryInterface $fcmTokenRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository,UserRepositoryInterface $userRepository,FcmTokenRepositoryInterface $fcmTokenRepository)
    {
        $this->companyRepository = $companyRepository;
        $this->userRepository = $userRepository;
        $this->fcmTokenRepository = $fcmTokenRepository;
    }

    public function getAllCompanies(){


        $companies = $this->companyRepository->getAllCompanies();

        return view('dashboard.companies.index',compact('companies'));
    }


    public function edit($id)
    {

       $company =  $this->companyRepository->getById($id);

        $date1 = Carbon::parse($company->date_start_subscription);
        $date2 = Carbon::parse($company->date_end_subscription);

        $numberOfDays = $date1->diffInDays($date2);

        return view('dashboard.companies.edit',compact('company','numberOfDays'));

    }


    public function update($id,Request $request): RedirectResponse
    {

        DB::beginTransaction();
        try {

            $company = $this->companyRepository->getById($id);
            $numberOfEmployees = $request->input('number_of_employees');

            $date_end_subscription =  $request->one_year == 365 ? $company->date_end : $company->date_end_subscription;

            $isActive = $request->input('is_active', false);

            $this->companyRepository->update($company->id,[
                'is_package' => $request->one_year == 365 ? 1 : 0,
                'date_end_subscription' => $date_end_subscription,
                'number_of_employees' => $numberOfEmployees,
                'is_active' =>  $isActive,
            ]);

            ##### false ########
            if (!$isActive) {
                $this->deactivateUsers($company->id);
            }else{
                $this->activateUsers($company->id);
            }

            DB::commit();
            toastr()->error('نم تعديل بيانات الشركه بنجاح','تعديل');

            return redirect()->route('admin.companies');

        }catch (\Exception $e){

            DB::rollBack();

            toastr()->error('يوجد خطاء ما بالسيرفر','خطاء');

            return redirect()->back();

        }

    }

    private function deactivateUsers($companyId): void
    {

        $users = $this->userRepository->getAllUsersOfCompany($companyId);
        $fcmTokens = $this->fcmTokenRepository->getAllDeviceTokenBelongsToCompany($companyId);
        foreach ($users as $user) {
            if ($user->access_token) {
                JWTAuth::setToken($user->access_token)->invalidate();
            }
            $this->userRepository->update($user->id, [
                'access_token' => null,
                'is_active' => 0,
            ]);
        }

        foreach ($fcmTokens as $token){
            $this->fcmTokenRepository->delete($token->id);
        }

    }


    private function activateUsers($companyId): void
    {

        $users = $this->userRepository->getAllUsersOfCompany($companyId);
        foreach ($users as $user) {
            $this->userRepository->update($user->id, ['is_active' => 1]);
        }

    }

    public function destroy($id): RedirectResponse
    {

        $this->companyRepository->delete($id);

        toastr()->error('تم حذف بيانات الشركه بنجاح','حذف');
        return redirect()->back();
    }

}
