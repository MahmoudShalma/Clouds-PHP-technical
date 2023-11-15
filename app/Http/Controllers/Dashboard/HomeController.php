<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function welcome()
    {
        return view('dashboard.home.index');
    }
   
}
