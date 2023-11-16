<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where("type","customer")->where(function ($q) use ($request) {
                if (request()->has('name') && request('name') != null) {
                    $q->where("name", 'like', '%' . request('name') . '%');
                }
                if (request()->has('email') && request('email') != null) {
                    $q->where("email", 'like', '%' . request('email') . '%');
                }
                if (request()->has('status') && request('status') != null) {
                    $q->where("status", request('status'));
                }
            });

            return DataTables::of($data)

                ->addIndexColumn()
                ->make(true);
        }

        return view('dashboard.users.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',

        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
        ]);

        session()->flash('success', trans('dashboard.added_successfully'));
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where("id", $id)->first();
        return view('dashboard.users.show', compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where("id", $id)->first();

        return view('dashboard.users.edit', compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where("id", $id)->first();
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            "name" => $request->name,
            "email" => $request->email,
        ]);


        session()->flash('success', trans('dashboard.updated_successfully'));
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        User::where("id", $id)->delete();
        session()->flash('warning', trans('dashboard.deleted_successfully'));
        return redirect()->route('dashboard.users.index');
    }
    
    public function change_status($id)
    {
        $user = User::where("id", $id)->first();
        if ($user->status == "activate") {
            $user->update([
                "status" => "deactivate"
            ]);
        } else {
            $user->update([
                "status" => "activate"
            ]);
        }

        session()->flash('warning', trans('dashboard.changed_successfully'));
        return redirect()->back();
    }
}
