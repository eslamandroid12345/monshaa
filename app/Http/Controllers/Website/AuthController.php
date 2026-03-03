<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    public function loginView()
    {
        return view('client.auth.login');
    }

    public function registerView()
    {
        return view('client.auth.register');
    }
    public function passwordReset()
    {
        return view('client.auth.password_reset');
    }

    public function login()
    {

    }

    public function register()
    {

    }


}
