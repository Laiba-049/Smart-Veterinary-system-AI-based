<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Notifications\AppointmentStatusNotification;

class AppointmentController extends Controller
{
    /**
     * Store appointment request (Patient side)
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'patient_name' => 'required',
            'patient_phone' => 'required',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'images.*' => 'image|max:2048',        // each image ≤ 2MB
            'video' => 'mimes:mp4,mov|max:5120',
        ]);

        $images = [];

        if ($request->hasFile('images')) {
            foreach (array_slice($request->file('images'), 0, 3) as $image) {
                $images[] = $image->store('appointments/images', 'public');
            }
        }

        $videoPath = null;
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('appointments/videos', 'public');
        }

        Appointment::create([
            'doctor_id' => $id,
            'patient_name' => $request->patient_name,
            'patient_phone' => $request->patient_phone,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'images' => $images,
            'video' => $videoPath,
            'disease_description' => $request->disease_description,
            'status' => 'pending', // explicit
        ]);

        return back()->with('success', 'Appointment request sent successfully');
    }
    public function prescriptionPdf($id)
    {
        $appointment = Appointment::with('doctor')->findOrFail($id);

        $pdf = Pdf::loadView('pdf.prescription', compact('appointment'));

        return $pdf->download('Prescription_' . $appointment->id . '.pdf');
    }

    /**
     * Doctor approves appointment
     */
    public function approve($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'approved';
        $appointment->save();

        // 🔔 Notify patient (database notification)
        $appointment->notify(
            new AppointmentStatusNotification($appointment, 'approved')
        );

        return back()->with('success', 'Appointment approved successfully');
    }
    public function respond(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $appointment->update([

            'doctor_comment' => $request->doctor_comment,
            'prescription' => $request->prescription,
        ]);

        return back()->with('success', 'Appointment updated successfully');
    }

    /**
     * Doctor rejects appointment
     */
    public function reject($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'rejected';
        $appointment->save();

        $appointment->notify(
            new AppointmentStatusNotification($appointment, 'rejected')
        );

        return back()->with('success', 'Appointment rejected successfully');
    }

    /**
     * Patient appointment status page
     */
    public function myAppointments()
    {
        // If you don't have user login yet
        $appointments = Appointment::latest()->get();

        return view('appointments', compact('appointments'));
    }
}
