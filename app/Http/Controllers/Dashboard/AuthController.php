<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    public function loginView()
    {
        return view('admin.auth.login');
    }

    public function registerView()
    {
        return view('admin.auth.register');
    }

    public function dashboard()
    {
        return view('admin.dashboard.home');
    }

}
