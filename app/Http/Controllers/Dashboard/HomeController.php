<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use PDF;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('dashboard.home.index');
    }

    public function generateInvoice($id)
    {
        $user = User::where("id", $id)->first();
        if ($user->customerPlane->is_pay == 0) {
            session()->flash('warning', trans('dashboard.pay first'));
            $intent = auth()->user()->createSetupIntent();
            $plan=$user->customerPlane->plane;
            return view("dashboard.planes.subscription", compact("plan", "intent"));
        }
        $date = $user->customerPlane->date_pay;
        $dueDate = $user->customerPlane->plane->name != "yearly" ? Carbon::parse($date)->addDays(365)->format('Y-m-d') : Carbon::parse($date)->addDays(30)->format('Y-m-d');
        $data = [
            'invoiceDate' => Carbon::parse($user->customerPlane->date_pay)->format('Y-m-d'),
            'dueDate' => $dueDate,
            'items' => [
                ['description' => $user->customerPlane->plane->name, 'total' => $user->customerPlane->plane->price . " $"],
            ],
            'totalAmount' => $user->customerPlane->plane->price . " $",
            'thankYouMessage' => 'Thank you for your business!',
        ];
        $pdf = PDF::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');
    }
}
