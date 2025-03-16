<?php

namespace App\Http\Services\Dashboard\Admin\Company;
use App\Http\Requests\Admin\Company\CompanyUpdateRequest;
use App\Repository\CompanyRepositoryInterface;
use App\Repository\FcmTokenRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class CompanyService
{

    protected CompanyRepositoryInterface $companyRepository;
    protected UserRepositoryInterface $userRepository;
    protected FcmTokenRepositoryInterface $fcmTokenRepository;

    public function __construct(
        CompanyRepositoryInterface $companyRepository,
        UserRepositoryInterface $userRepository,
        FcmTokenRepositoryInterface $fcmTokenRepository
    )
    {
        $this->companyRepository = $companyRepository;
        $this->userRepository = $userRepository;
        $this->fcmTokenRepository = $fcmTokenRepository;
    }

    public function getAllCompanies()
    {
        $companies = $this->companyRepository->getAllCompanies();
        return view('dashboard.companies.index',compact('companies'));
    }

    public function edit($id)
    {
        $company =  $this->companyRepository->getById($id);
        return view('dashboard.companies.edit',compact('company'));
    }

    public function update($id,CompanyUpdateRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $company = $this->companyRepository->getById($id);
            $date_end_subscription =  $request->is_package == 1 ? $company->date_end : $company->date_end_subscription;
            $isActive = $request->input('is_active', false);

            if($request->add_new_package == 1){
                $this->companyRepository->update($company->id,[
                    'date_start_subscription' => Carbon::now()->format('Y-m-d'),
                    'date_end_subscription' => Carbon::now()->addYear()->format('Y-m-d'),
                    'is_active' =>  $isActive,
                ]);
            }else{
                $this->companyRepository->update($company->id,[
                    'is_package' => $request->is_package == 1 ? 1 : $company->is_package,
                    'date_end_subscription' => $date_end_subscription,
                    'is_active' =>  $isActive,
                ]);
            }

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
            $this->userRepository->update($user->id, [
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
