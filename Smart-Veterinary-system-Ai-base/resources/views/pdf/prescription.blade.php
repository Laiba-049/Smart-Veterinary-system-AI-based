<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans; font-size: 14px; }
        h2 { margin-bottom: 5px; }
        .box { border:1px solid #000; padding:10px; margin-top:10px; }
    </style>
</head>
<body>

<h2>Medical Prescription</h2>
<p><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
<p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>

<div class="box">
    <strong>Doctor Comments</strong>
    <p>{{ $appointment->doctor_comment }}</p>
</div>

<div class="box">
    <strong>Prescription</strong>
    <p>{{ $appointment->prescription }}</p>
</div>

</body>
</html>
