<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Animal;

class SellerDashboardController extends Controller
{
    public function index()
    {
        $animals = Animal::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('seller.dashboard', compact('animals'));
    }
}
