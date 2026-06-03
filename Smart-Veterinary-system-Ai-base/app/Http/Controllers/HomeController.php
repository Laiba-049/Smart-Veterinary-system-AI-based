<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;


class HomeController extends Controller
{

    public function index()
{
    $doctors = Doctor::latest()->take(6)->get();
    return view('index', compact('doctors'));
}

}
