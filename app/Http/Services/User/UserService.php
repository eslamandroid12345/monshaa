<?php

namespace App\Http\Services\User;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\UserResource;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\CompanyRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{

    use Responser;

    protected UserRepositoryInterface $userRepository;

    protected FileManagerService $fileManagerService;
    protected CompanyRepositoryInterface $companyRepository;

    public function __construct(UserRepositoryInterface $userRepository,FileManagerService $fileManagerService,CompanyRepositoryInterface $companyRepository)
    {

        $this->userRepository = $userRepository;
        $this->fileManagerService = $fileManagerService;
        $this->companyRepository = $companyRepository;
    }

    public function register(StoreUserRequest $request): JsonResponse{


        DB::beginTransaction();

        try {


            $permissions = ["home_page", "states", "lands", "tenants", "tenant_contracts", "financial_receipt", "financial_cash", "expenses", "employees", "reports", "notifications", "setting", "technical_support", "expired_contracts", "revenues", "profits", "tenant_stats", "selling_states",];
            $requestOfCompany = $request->only('company_phone','company_name','company_address','privacy_and_policy');
            $requestOfCompany['currency'] = 'الجنيه المصري';
            $company = $this->companyRepository->create($requestOfCompany);
            $requestOfUser = $request->only('name','phone','password');

            $requestOfUser['company_id'] = $company['id'];
            $requestOfUser['is_admin'] = 1;
            $requestOfUser['employee_permissions'] = json_encode($permissions);
            $requestOfUser['password'] = Hash::make($requestOfUser['password']);

            $this->userRepository->create($requestOfUser);

            DB::commit();

            $token = Auth::guard('user-api')->attempt($request->only('phone', 'password'));

            $auth = Auth::guard('user-api')->user();
            $auth['token'] = $token;

            return $this->responseSuccess(new UserResource($auth),200,'تم اضافه بيانات الشركه والمدير العام بنجاح');

        }catch (\Exception $exception){

            DB::rollBack();
            return $this->responseFail(null,500,$exception->getMessage(),500);

        }
    }

    public function login(LoginUserRequest $request): JsonResponse
    {

        try {
            $token = auth('user-api')->attempt($request->only('phone', 'password'));

            if (!$token) {
                return $this->responseFail(null, 409, 'بيانات الدخول غير صحيحة برجاء إدخال البيانات صحيحة وحاول مرة أخرى');
            }

            $auth = Auth::guard('user-api')->user();

            if ($auth->is_active == 0) {
                $message = $auth->is_admin == 1 ? 'الحساب غير مفعل يرجي التواصل مع مطور البرنامج' : 'الحساب غير مفعل يرجي التواصل مع مديرك المباشر لتفعيل الحساب';
                return $this->responseFail(null, 403, $message, 403);
            }

            $auth['token'] = $token;
            $this->userRepository->update($auth->id, ['access_token' => $token]);

            $resource = $auth->is_admin == 1 ? new UserResource($auth) : new EmployeeResource($auth);
            $message = $auth->is_admin == 1 ? 'تم تسجيل دخول المدير بنجاح' : 'تم تسجيل دخول الموظف بنجاح';

            return $this->responseSuccess($resource, 200, $message);

        } catch (\Exception $exception) {

            return $this->responseFail(null, 500, $exception->getMessage(), 500);
        }

    }


    public function getProfile(): JsonResponse
    {

        $auth = Auth::guard('user-api')->user();

        $auth['token'] = request()->bearerToken();
        return $this->responseSuccess($auth->is_admin == 1 ? new UserResource($auth) : new EmployeeResource($auth), 200, $auth->is_admin == 1 ? 'تم تسجيل دخول المدير بنجاح' : 'تم تسجيل دخول الموظف بنجاح');

    }

    public function updateProfile(UpdateUserRequest $request): JsonResponse
    {

        DB::beginTransaction();

        try {

            $auth = Auth::guard('user-api')->user();

            $auth['token'] = $request->bearerToken();
            $requestOfCompany = $request->only('company_phone','company_name','company_address','logo','currency');

            $requestOfUser = $request->only('name','phone','password');

            $user = $this->userRepository->getById($auth->id);


            if ($request->hasFile('logo')) {
                $image = $this->fileManagerService->handle("logo", "users/images",$user->logo);
                $requestOfCompany['logo'] = $image;
            }


            if ($request->filled('password')) {
                $requestOfUser['password'] = Hash::make($requestOfUser['password']);
            } else {
                unset($requestOfUser['password']);
            }

            $this->companyRepository->update($auth->company_id,$requestOfCompany);

            $this->userRepository->update($auth->id,$requestOfUser);

            DB::commit();

            return $this->responseSuccess(new UserResource($auth), 200, 'تم تعديل بيانات الشركة بنجاح');

        } catch (\Exception $exception) {

            DB::rollBack();
            return $this->responseFail(null, 500, $exception->getMessage(), 500);
        }

    }


    public function logout(): JsonResponse
    {

        $auth = Auth::guard('user-api')->user();

        $this->userRepository->update($auth->id,['access_token' => null]);

        auth('user-api')->logout();

        return $this->responseSuccess(null, 200, 'تم تسجيل الخروج بنجاح');


    }
}
