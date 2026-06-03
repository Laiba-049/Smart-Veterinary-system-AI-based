<?php
namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorAuthController extends Controller
{
    // Show register form
    public function showRegister()
    {
        return view('doctor.register');
    }

    // Register doctor
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:doctors',
            'password' => 'required|min:6|confirmed',
            'specialization' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('doctors', 'public');
        }

        $doctor = Doctor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'specialization' => $request->specialization,
            'experience' => $request->experience,
            'photo' => $photoPath,
            'bio' => $request->bio,
        ]);

        Auth::guard('doctor')->login($doctor);

        return redirect('/doctor/profile');
    }

    // Show login form
    public function showLogin()
    {
        return view('doctor.login');
    }

    // Login doctor
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('doctor')->attempt($credentials)) {
            return redirect('/doctor/profile');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Logout
    public function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect('/');
    }
}
