<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CustomerPlane;
use App\Models\Plane;
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
    public function showRegister()
    {
        $planes = Plane::get();
        return view("auth.register", compact("planes"));
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
        } elseif ($user->status == "deactivate") {
            return Redirect::to('dashboard/login')->withErrors(['لا يمكن للعملاء الذين تم إلغاء تنشيطهم تسجيل الدخول']);
        } else {
            Auth::attempt($userData, $remember_me);
            return Redirect::route('dashboard.welcome');
        }
    } // end of doLogin

    public function doRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'plane_id' => 'required|exists:planes,id',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
        ]); // end of validator

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } //end of if

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        CustomerPlane::create([
            "user_id" => $user->id,
            "plane_id" => $request->plane_id,
        ]);

        session()->flash('success', trans('dashboard.added_successfully'));
        return redirect()->route('login');
    } // end of doRegister

    public function logout()
    {
        // logout user
        Auth::logout();
        // redirect to login page
        return Redirect::to('dashboard/login');
    } //end of logout
}
