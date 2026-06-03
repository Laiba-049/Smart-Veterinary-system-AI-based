<?php
namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('team', compact('doctors'));
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctor.detail', compact('doctor'));
    }


}
