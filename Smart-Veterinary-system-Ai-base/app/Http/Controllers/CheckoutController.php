<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // show checkout form
    public function showani(Animal $animal)
    {
        return view('checkout.show', compact('animal'));
    }

    // submit order
    public function store(Request $request, Animal $animal)
    {
        $request->validate([
            'mobile' => 'required',
            'alternate_mobile' => 'required',
            'address' => 'required',
            'when_needed' => 'required',
        ]);


        $order = Order::create([
            'order_no' => 'ORD-' . now()->format('Ymd') . '-' . rand(1000, 9999),

            'animal_id' => $animal->id,
            'buyer_id' => Auth::id(),
            'seller_id' => $animal->user_id,

            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'mobile' => $request->mobile,
            'alternate_mobile' => $request->alternate_mobile,
            'address' => $request->address,
            'address_2' => $request->address_2,
            'expectations' => $request->expectations,
            'when_needed' => $request->when_needed,

            'animal_price' => $animal->price,
            'delivery_charges' => 5000,
        ]);

        // 🔥 AUTO DOWNLOAD RECEIPT
        return redirect()->route('order.success', $order->id);
    }
    public function success(Order $order)
    {
        if ($order->buyer_id !== Auth::id()) {
            abort(403);
        }

        return view('orders.success', compact('order'));
    }


    public function receipt(Order $order)
    {
        // only buyer can download
        if ($order->buyer_id !== Auth::id()) {
            abort(403);
        }

        $pdf = Pdf::loadView('orders.receipt', compact('order'));

        return $pdf->download('receipt-' . $order->order_no . '.pdf');
    }
}
