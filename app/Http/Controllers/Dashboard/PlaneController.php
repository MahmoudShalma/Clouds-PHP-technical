<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CustomerPlane;
use App\Models\Plane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Plane::where(function ($q) use ($request) {
                if (request()->has('name') && request('name') != null) {
                    $q->where("name", 'like', '%' . request('name') . '%');
                }
                if (request()->has('price') && request('price') != null) {
                    $q->where("price", request('price'));
                }
            });

            return DataTables::of($data)

                ->addIndexColumn()
                ->make(true);
        }

        return view('dashboard.planes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.planes.create');

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
            'name' => 'required|max:255|unique:planes,name',
            'price' => 'required',

        ]);

      Plane::create([
            "name" => $request->name,
            "price" => $request->price,
        ]);

        session()->flash('success', trans('dashboard.added_successfully'));
        return redirect()->route('dashboard.planes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = Plane::where("id", $id)->first();
        return view('dashboard.planes.show', compact("plan"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = Plane::where("id", $id)->first();

        return view('dashboard.planes.edit', compact("plan"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $plan = Plane::where("id", $id)->first();
        $validated = $request->validate([
            'name' => 'required|max:255|unique:planes,name,' . $plan->id,
            'price' => 'required',
        ]);

        $plan->update([
            "name" => $request->name,
            "price" => $request->price,
        ]);


        session()->flash('success', trans('dashboard.updated_successfully'));
        return redirect()->route('dashboard.planes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plane  $plane
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerPlane = CustomerPlane::where("plan_id", $id)->get();
        if (count($customerPlane) > 0) {
            session()->flash('warning', trans('dashboard.cannot_deleted_successfully'));
            return redirect()->route('dashboard.planes.index');
        }
        Plane::where("id", $id)->delete();
        session()->flash('warning', trans('dashboard.deleted_successfully'));
        return redirect()->route('dashboard.planes.index');
    }

     public function subscription(Request $request)
    {
        CustomerPlane::where("user_id",Auth()->id())->where("plane_id",$request->plan)->update([
            "is_pay" => "1",
            "date_pay" => now()
        ]);
        session()->flash('success', trans('dashboard.pay_successfully'));
        return redirect()->route('dashboard.welcome');
    }
}
