<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PlaneController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        // auth routes
        Route::get('dashboard/login', [AuthController::class, 'showLogin'])->middleware('guest')->name('login');
        Route::post('dashboard/login', [AuthController::class, 'doLogin']);
        Route::get('dashboard/register', [AuthController::class, 'showRegister'])->middleware('guest')->name('register');
        Route::post('dashboard/register', [AuthController::class, 'doRegister']);
        Route::prefix('dashboard')->name("dashboard.")->middleware(["auth"])->group(function () {

            // Logout Route
            Route::post("/logout", [AuthController::class, "logout"])->name("logout");
            Route::get("/", [HomeController::class, "welcome"])->name("welcome");


            // users
            Route::resource('users', UserController::class);
            Route::resource('planes', PlaneController::class);
            Route::get("users/change_status/{id}", [UserController::class, "change_status"])->name("users.change_status");

        }); //end of dashboard routes

    }
);
