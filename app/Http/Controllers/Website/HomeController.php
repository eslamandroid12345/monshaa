<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function terms()
    {
        return view('client.terms_and_condition');
    }


}
