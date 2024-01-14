<?php

namespace App\Http\Services\User;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\UserResource;
use App\Http\Services\Mutual\FileManagerService;
use App\Http\Traits\Responser;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{

    use Responser;

    protected UserRepositoryInterface $userRepository;

    protected FileManagerService $fileManagerService;

    public function __construct(UserRepositoryInterface $userRepository,FileManagerService $fileManagerService)
    {

        $this->userRepository = $userRepository;
        $this->fileManagerService = $fileManagerService;
    }

    public function register(StoreUserRequest $request): JsonResponse{


        try {

            if($request->privacy_and_policy == 1){

                $inputs = $request->validated();
                $inputs['password'] = Hash::make($inputs['password']);
                $user = $this->userRepository->create($inputs);

                if($user->save()){

                    $token = Auth::guard('user-api')->attempt($request->only('phone', 'password'));

                    $auth = Auth::guard('user-api')->user();
                    $auth['token'] = $token;

                    return $this->responseSuccess(new UserResource($auth),200,'تم اضافه بيانات الشركه بنجاح');

                }else{

                    return $this->responseFail(null,500,'يوجد خطاء ما اثناء اضافه البيانات يرجي المحاوله مره اخري',500);
                }
            }else{

                return $this->responseFail(null,422,'يجب الموافقه علي الشروط والسياسات بقيمه 1',422);

            }

        }catch (\Exception $exception){

            return $this->responseFail(null,500,$exception->getMessage(),500);

        }

    }
    public function login(LoginUserRequest $request): JsonResponse
    {


        try {
            $guard = $request->user_type === 'user' ? 'user-api' : 'employee-api';
            $token = auth($guard)->attempt($request->only('phone', 'password'));


            if ($token) {
                $auth = Auth::guard($guard)->user();
                $auth['token'] = $token;

                $message = $request->user_type === 'user'
                    ? 'تم تسجيل دخول المدير بنجاح'
                    : 'تم تسجيل دخول الموظف بنجاح';

                 $resource = $request->user_type === 'user'
                    ? new UserResource($auth)
                    : new EmployeeResource($auth);


                return $this->responseSuccess($resource, 200, $message);
            } else {
                return $this->responseFail(null, 404,'بيانات الدخول غير صحيحة برجاء إدخال البيانات صحيحة وحاول مرة أخرى', 404);
            }
        } catch (\Exception $exception) {
            return $this->responseFail(null, 500, $exception->getMessage(), 500);
        }


    }


    public function getProfile(Request $request): JsonResponse
    {

        $token = $request->bearerToken();

        if ($token) {
            $guards = ['user-api', 'employee-api'];

            foreach ($guards as $guard) {
                if (Auth::guard($guard)->setToken($token)->check()) {
                    $auth = Auth::guard($guard)->user();
                    $auth['token'] = $token;

                    $resource = $guard === 'user-api' ? new UserResource($auth) : new EmployeeResource($auth);

                    $message = $guard === 'user-api'
                        ? 'تم الحصول على بيانات بروفايل الشركة بنجاح'
                        : 'تم الحصول على بيانات بروفايل الموظف بنجاح';

                    return $this->responseSuccess($resource, 200, $message);
                }
            }


            return $this->responseFail(null,401,'Invalid token or does not belong to any specified guard',401);

        }

        return $this->responseFail(null,401,'Token not present',401);

    }

    public function updateProfile(UpdateUserRequest $request): JsonResponse
    {


        try {
            $auth = Auth::guard('user-api')->user();
            $auth['token'] = $request->bearerToken();

            $inputs = $request->validated();
            $user = $this->userRepository->getById($auth->id);

            if ($request->hasFile('logo')) {
                $image = $this->fileManagerService->handle("logo", "users/images",$user->logo);
                $inputs['logo'] = $image;
            }

            if ($request->filled('password')) {
                $inputs['password'] = Hash::make($inputs['password']);
            } else {
                unset($inputs['password']);
            }

            $this->userRepository->update($user->id, $inputs);

            return $this->responseSuccess(new UserResource($auth), 200, 'تم تعديل بيانات الشركة بنجاح');

        } catch (\Exception $exception) {

            return $this->responseFail(null, 500, $exception->getMessage(), 500);
        }



    }


    public function logout(Request $request)
    {

        $token = $request->bearerToken();

        if ($token) {
            $guards = ['user-api', 'employee-api'];

            foreach ($guards as $guard) {
                if (Auth::guard($guard)->setToken($token)->check()) {
                     Auth::guard($guard)->logout();

                    $message = $guard === 'user-api'
                        ? 'تم تسجيل خروج الشركه بنجاح'
                        : 'تم تسجيل خروج الموظف بنجاح';

                    return $this->responseSuccess(null, 200, $message);
                }
            }

        }

    }
}