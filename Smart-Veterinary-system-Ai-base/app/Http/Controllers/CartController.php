<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Animal;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Add to cart
    public function add(Animal $animal)
    {
        Cart::firstOrCreate([
            'user_id' => Auth::id(),
            'animal_id' => $animal->id,
        ]);

        return redirect()->route('cart.index')
            ->with('success', 'Animal added to cart');
    }

    // View cart
    public function index()
    {
        $cartItems = Cart::with('animal.images')
            ->where('user_id', Auth::id())
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    // Remove from cart
    public function remove(Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cart->delete();

        return back()->with('success', 'Removed from cart');
    }
}
