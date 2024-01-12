<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Services\User\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(StoreUserRequest $request): JsonResponse{

        return $this->userService->register($request);
    }
    public function login(LoginUserRequest $request): JsonResponse{


        return $this->userService->login($request);

    }


    public function getProfile(Request $request): JsonResponse{

        return $this->userService->getProfile($request);

    }

    public function updateProfile(UpdateUserRequest $request): JsonResponse{

        return $this->userService->updateProfile($request);

    }


    public function logout(Request $request): ?JsonResponse
    {


        return $this->userService->logout($request);
    }

}
