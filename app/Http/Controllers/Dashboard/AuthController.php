<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view("auth.login");
    } //end of showLogin

    public function doLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]); // end of validator

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } //end of if

        $userData = array(
            'email' => $request->email,
            'password' => $request->password
        ); // end of userData

        $remember_me = $request->has('remember') ? true : false;

        $user = User::where('email', $request->email)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return Redirect::to('dashboard/login')->withErrors(['الايميل او كلمة المرور غير صحيحه']);
        }
        elseif ($user->status=="deactivate") {
            return Redirect::to('dashboard/login')->withErrors(['لا يمكن للعملاء الذين تم إلغاء تنشيطهم تسجيل الدخول']);
        }
        else {
            Auth::attempt($userData, $remember_me);
            return Redirect::route('dashboard.welcome');
        }
       
    } // end of doLogin

    public function logout()
    {
        // logout user
        Auth::logout();
        // redirect to login page
        return Redirect::to('dashboard/login');
    } //end of logout
}
