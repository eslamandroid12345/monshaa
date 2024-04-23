<?php

namespace App\Http\Services\User;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\HomePage\HomePageAdminResource;
use App\Http\Resources\HomePage\HomePageEmployeeResource;
use App\Http\Resources\UserResource;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Services\Mutual\GetService;
use App\Http\Traits\FirebaseNotification;
use App\Http\Traits\Responser;
use App\Repository\CompanyRepositoryInterface;
use App\Repository\FcmTokenRepositoryInterface;
use App\Repository\TenantContractRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserService
{

    use Responser,FirebaseNotification;

    protected UserRepositoryInterface $userRepository;

    protected FileManagerService $fileManagerService;
    protected CompanyRepositoryInterface $companyRepository;

    protected FcmTokenRepositoryInterface $fcmTokenRepository;

    protected GetService $getService;

    protected TenantContractRepositoryInterface $tenantContractRepository;

    public function __construct(TenantContractRepositoryInterface $tenantContractRepository,FcmTokenRepositoryInterface $fcmTokenRepository,UserRepositoryInterface $userRepository,FileManagerService $fileManagerService,CompanyRepositoryInterface $companyRepository,GetService $getService)
    {
        $this->fcmTokenRepository = $fcmTokenRepository;
        $this->userRepository = $userRepository;
        $this->fileManagerService = $fileManagerService;
        $this->companyRepository = $companyRepository;
        $this->getService = $getService;
        $this->tenantContractRepository = $tenantContractRepository;

    }

    public function register(StoreUserRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {

            $company = $this->createCompany($request);
            $user = $this->createUser($request,$company);

            DB::commit();
            $token = Auth::guard('user-api')->attempt($request->only('phone', 'password'));
            $user['token'] = $token;

            return $this->responseSuccess(new UserResource($user), 200, 'تم إضافة بيانات الشركة والمدير بنجاح والنسخه مفعله لمده 7 ايام من يوم التسجيل');

        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);
        }
    }

    protected function createCompany(StoreUserRequest $request): ?Model
    {

        $companyData = $request->only('company_phone', 'company_name', 'company_address', 'privacy_and_policy');
        $companyData['currency'] = 'الجنيه المصري';
        $companyData['date_start_subscription'] = Carbon::now()->format('Y-m-d');
        $companyData['date_end_subscription'] = Carbon::now()->addDays(7)->format('Y-m-d');

        return $this->companyRepository->create($companyData);
    }

    protected function createUser(StoreUserRequest $request,$company): ?Model
    {
        $userData = $request->only('name', 'phone', 'password');
        $userData['company_id'] = $company['id'];
        $userData['is_admin'] = 1;
        $userData['password_show'] = $userData['password'];
        $userData['password'] = Hash::make($userData['password']);

        return $this->userRepository->create($userData);
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        try {
            $token = auth('user-api')->attempt($request->only('phone', 'password'));

            if (!$token) {
                return $this->responseFail(null, 409, 'بيانات الدخول غير صحيحة برجاء إدخال البيانات صحيحة وحاول مرة أخرى');
            }

            $auth = Auth::guard('user-api')->user();
            $auth['token'] = $token;

            if (!$this->isActiveUser($auth)) {
                $message = $this->getActivationMessage($auth);
                return $this->responseFail(null, 403, $message, 403);
            }

            $resource = $this->getResourceBasedOnRole($auth);
            $message = $this->getLoginSuccessMessage($auth);

            if ($request->filled('token')) {
                $this->updateOrCreateFCMToken($auth->id, $request->only(['token', 'device_type']));
            }

            return $this->responseSuccess($resource, 200, $message);
        } catch (\Exception $exception) {
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);

        }
     }

    private function updateOrCreateFCMToken($userId, $data): void
    {
        $this->fcmTokenRepository->updateOrCreate(['token' => $data['token']], array_merge($data, ['user_id' => $userId]));
    }


    public function home(): JsonResponse
    {

        $user = auth('user-api')->user();

        $contractsExpiredCount = $this->tenantContractRepository->getAllContractsExpiredCount(companyId());

        if($contractsExpiredCount > 0){
            $this->sendFirebaseForCompany( ['title' => 'اشعار جديد لديك','body' => ' يجب عليك الاطلاع علي جميع العقود المنتهيه ' ], companyId(), 'expired_contracts');

        }

        $contractsExpired = $this->tenantContractRepository->getAllContractsExpired(companyId());
        foreach ($contractsExpired as $contractExpired) {
            $this->tenantContractRepository->update($contractExpired->id,['is_expired' => 1]);
        }

        $resource = $user->is_admin ? new HomePageAdminResource($user) : new HomePageEmployeeResource($user);
        $message = $user->is_admin ? 'تم عرض بيانات الصفحه الرئيسيه بنجاح للادمن' : 'تم عرض بيانات الصفحه الرئيسيه بنجاح للموظف';

        return $this->responseSuccess($resource, 200, $message);

    }

    protected function isActiveUser($auth): bool
    {
        return $auth->is_active == 1;
    }

    protected function getActivationMessage($auth): string
    {
        return $auth->is_admin == 1 ? 'الحساب غير مفعل يرجى التواصل مع مطور البرنامج' : 'الحساب غير مفعل يرجى التواصل مع مديرك المباشر لتفعيل الحساب';
    }


    protected function getResourceBasedOnRole($auth): UserResource|EmployeeResource
    {
        return $auth->is_admin == 1 ? new UserResource($auth) : new EmployeeResource($auth);
    }

    protected function getLoginSuccessMessage($auth): string
    {
        return $auth->is_admin == 1 ? 'تم تسجيل دخول المدير بنجاح' : 'تم تسجيل دخول الموظف بنجاح';
    }


    public function getProfile(): JsonResponse
    {

        $auth = Auth::guard('user-api')->user();

        $auth['token'] = request()->bearerToken();

        $resource = $auth->is_admin == 1 ? new UserResource($auth) : new EmployeeResource($auth);
        $message = $auth->is_admin == 1 ? 'تم عرض بيانات المدير العام والشركه بنجاح' : 'تم عرض بيانات الموظف بنجاح';

        return $this->responseSuccess($resource, 200, $message);

    }


    public function updateProfile(UpdateUserRequest $request): JsonResponse
    {

        DB::beginTransaction();

        try {

            $requestOfUser = $request->only('name','phone','password');
            $user = $this->userRepository->getById(employeeId());

            if ($request->filled('password')) {

                if(!Hash::check($request->old_password,$user->password)){
                    return $this->responseFail(null, 416, 'كلمه المرور القديمه غير صحيحه');
                }
                $requestOfUser['password_show'] =  $requestOfUser['password'];
                $requestOfUser['password'] = Hash::make($requestOfUser['password']);
            } else {
                unset($requestOfUser['password']);
            }

            $this->updateCompanyProfile($request,$user);
            $this->userRepository->update($user->id,$requestOfUser);

            $auth = $this->userRepository->getById(employeeId());
            $auth['token'] = $request->bearerToken();

            DB::commit();

            return $this->responseSuccess(new UserResource($auth), 200, 'تم تعديل بيانات الشركة بنجاح');

        } catch (\Exception $exception) {

            DB::rollBack();
            return $this->responseFail(null, 500, 'يوجد خطاء ما في بيانات الارسال بالسيرفر', 500);
        }

    }

    protected function updateCompanyProfile($request,$user): bool
    {

        $requestOfCompany = $request->only('company_phone','company_name','company_address','logo','currency');

        if ($request->hasFile('logo')) {
            $image = $this->fileManagerService->handle("logo","users/images",$user->logo);
            $requestOfCompany['logo'] = $image;
        }

        return $this->companyRepository->update($user->company_id,$requestOfCompany);

    }


    public function logout(): JsonResponse
    {

        if (request()->has('token')) {
            $token = $this->fcmTokenRepository->getByColumn('token',request('token'));
            if ($token) {
                $this->fcmTokenRepository->delete($token->id);
            }
        }

        auth('user-api')->logout();
        return $this->responseSuccess(null, 200, 'تم تسجيل الخروج بنجاح');

    }
}
