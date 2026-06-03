<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class DoctorProfileController extends Controller
{

    public function index()
    {
        $doctor = Auth::guard('doctor')->user();
        $appointments = $doctor->appointments()->latest()->get();

        return view('doctor.profile', compact('doctor', 'appointments'));
    }
    // public function index()
    // {
    //     $doctor = Auth::guard('doctor')->user();
    //     return view('doctor.profile', compact('doctor'));
    // }

    public function update(Request $request)
    {
        $doctor = Auth::guard('doctor')->user();

        $doctor->update($request->only([
            'name',
            'phone',
            'specialization',
            'experience',
            'bio'
        ]));

        return back()->with('success', 'Profile updated successfully');
    }
}
