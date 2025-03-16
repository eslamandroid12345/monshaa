<?php

namespace App\Http\Services\Company;
use App\Http\Requests\Company\CompanyRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\Responser;
use App\Repository\CompanyRepositoryInterface;
use App\Repository\FcmTokenRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CompanyService
{

    use Responser;
    private CompanyRepositoryInterface $companyRepository;
    private GetService $getService;
    private UserRepositoryInterface $userRepository;
    private FcmTokenRepositoryInterface $fcmTokenRepository;
    public function __construct(
       CompanyRepositoryInterface $companyRepository,
       GetService $getService,
       UserRepositoryInterface $userRepository,
       FcmTokenRepositoryInterface $fcmTokenRepository
    )
    {
        $this->companyRepository = $companyRepository;
        $this->getService = $getService;
        $this->userRepository = $userRepository;
        $this->fcmTokenRepository = $fcmTokenRepository;
    }

    public function getAllCompanies(): JsonResponse
    {
        return $this->getService->handle(resource: CompanyResource::class,repository: $this->companyRepository,method: 'getAllCompanies',message: 'تم الحصول علي جميع بيانات الشركات بنجاح');
    }

    public function show($id): JsonResponse
    {
        return $this->getService->handle(resource: CompanyResource::class,repository: $this->companyRepository, method: 'getById',parameters: [$id], is_instance: true, message: 'تم الحصول على بيانات الشركه بنجاح');
    }


    public function update($id,CompanyRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $company = $this->companyRepository->getById($id);
            $numberOfEmployees = $request->input('number_of_employees');
            $isPackage = $request->is_package == 1 ? 1 :  $company->is_package;
            $date_end_subscription =  $request->is_package == 1 ? $company->date_end : $company->date_end_subscription;

            $isActive = $request->input('is_active');

            if(companyId() == $company->id && $isActive == 0){
                return $this->responseFail(null, 417,'غير مسموح لك باغلاق نسختك ايها المشرف');
            }

            $this->companyRepository->update($company->id,[
                'is_package' => $isPackage,
                'date_end_subscription' => $date_end_subscription,
                'number_of_employees' => $numberOfEmployees,
                'is_active' =>  $isActive
            ]);

            if ($isActive == 0) {
                $this->deactivateUsers($company->id);
            }else{
                $this->activateUsers($company->id);
            }

            DB::commit();
            return $this->getService->handle(resource: CompanyResource::class,repository: $this->companyRepository,method: 'getById',parameters: [$id],is_instance: true,message: 'تم تعديل بيانات الشركه بنجاح' );
        }catch (ModelNotFoundException $exception) {
            return $this->responseFail(null, 404, 'بيانات الشركه موجوده', 404);
        }  catch (\Exception $e) {
            return $this->responseFail(null, 500, $e->getMessage(), 500);
        }
    }

    private function deactivateUsers($companyId): void
    {
        $users = $this->userRepository->getAllUsersOfCompany($companyId);
        foreach ($users as $user) {
            $this->userRepository->update($user->id, [
                'is_active' => 0,
            ]);
        }

        $fcmTokens = $this->fcmTokenRepository->getAllDeviceTokenBelongsToCompany($companyId);
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

    public function delete($id): JsonResponse{

        try {
            $company = $this->companyRepository->getById($id);
            if(companyId() == $company->id){
                return $this->responseFail(null, 417,'غير مسموح لك بحذف نسختك ايها المشرف');
            }
            $this->companyRepository->delete($company->id);
            return $this->responseSuccess(null, 200, 'تم حذف بيانات المصروف  بنجاح');

        } catch (ModelNotFoundException $exception) {
            return $this->responseFail(null, 404, 'بيانات المصروف غير موجوده', 404);
        } catch (\Exception $e) {
            return $this->responseFail(null, 500, $e->getMessage(), 500);
        }
    }
}
