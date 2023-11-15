<?php

namespace App\Helpers\Dashboard;

use Illuminate\Support\Facades\Auth;

class AuthHelper
{
    private static $user;

    public static function getUser()
    {
        if (!static::$user) {
            static::$user = Auth::user();
        }
        return static::$user;
    } // end of getUser function
}// end of AuthHelper class
