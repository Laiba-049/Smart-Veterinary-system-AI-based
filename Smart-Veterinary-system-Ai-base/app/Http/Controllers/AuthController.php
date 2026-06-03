<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show login page
    public function loginPage() {
        return view('login');
    }


public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        // 🔐 FORCE role-based redirect (ignore intended)
        if ($user->role === 'seller') {
            return redirect()->to('/seller/animals');
        }

        return redirect()->to('/'); // normal users
    }

    return back()->withErrors([
        'email' => 'Invalid credentials',
    ]);
}


    // Handle login
    // public function login(Request $request) {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|string',
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect('/'); // homepage
    //     }

    //     return back()->withErrors([
    //         'email' => 'Invalid credentials',
    //     ]);
    // }

    // Show signup page
    public function signupPage() {
        return view('signup');
    }

    // Handle signup
    public function signup(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:seller,buyer,customer',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully! Please login.');
    }

    // Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
