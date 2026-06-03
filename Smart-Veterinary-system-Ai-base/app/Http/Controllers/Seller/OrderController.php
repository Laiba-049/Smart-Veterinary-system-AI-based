<?php
namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('animal')
            ->where('seller_id', Auth::id())
            ->latest()
            ->get();

        return view('seller.orders.index', compact('orders'));
    }
}
