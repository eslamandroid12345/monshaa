<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\AdminAuthRequest;
use App\Http\Services\Dashboard\Admin\Auth\AuthService;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{



    public function __construct(
       private readonly AuthService $authService
    )
    {
    }

    public function loginView(){

        return $this->authService->loginView();
    }

    public function login(AdminAuthRequest $request){

        return $this->authService->login($request);

    }

    public function logout(): RedirectResponse
    {
        return $this->authService->logout();

    }
}
