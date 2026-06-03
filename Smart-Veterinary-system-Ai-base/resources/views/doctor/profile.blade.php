@extends('app')

@section('content')
<div class="container-fluid py-5">
    <div class="container">

        <!-- Heading -->
        <div class="border-start border-5 border-primary ps-4 mb-5" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase">Doctor Profile</h6>
            <h1 class="display-6 text-uppercase mb-0">Manage Your Account</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-9">

                @if(session('success'))
                <div class="alert alert-success d-flex align-items-center mb-4">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
                @endif

                <div class="row g-4">

                    <!-- LEFT -->
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-4 text-center shadow-sm">
                            <img src="{{ $doctor->photo ? asset('storage/'.$doctor->photo) : asset('assets/img/user.png') }}"
                                class="img-fluid rounded-circle mb-3"
                                style="width:160px;height:160px;object-fit:cover;">

                            <h5 class="text-uppercase mb-1">{{ $doctor->name }}</h5>
                            <p class="text-muted mb-3">{{ $doctor->specialization }}</p>

                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" class="form-control mb-3" name="photo">
                                <button class="btn btn-outline-primary w-100">
                                    <i class="bi bi-camera me-1"></i> Update Photo
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="col-lg-8">

                        <!-- Profile Info -->
                        <div class="bg-light rounded p-5 shadow-sm mb-4">
                            <h4 class="text-uppercase mb-4 border-bottom pb-2">
                                <i class="bi bi-person-lines-fill me-2 text-primary"></i>
                                Personal Information
                            </h4>

                            <form method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-uppercase">Full Name</label>
                                        <input class="form-control" name="name" value="{{ $doctor->name }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-uppercase">Phone</label>
                                        <input class="form-control" name="phone" value="{{ $doctor->phone }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-uppercase">Specialization</label>
                                        <input class="form-control" name="specialization" value="{{ $doctor->specialization }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-uppercase">Experience (Years)</label>
                                        <input type="number" class="form-control" name="experience" value="{{ $doctor->experience }}">
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-bold text-uppercase">Short Bio</label>
                                        <textarea class="form-control" rows="4" name="bio">{{ $doctor->bio }}</textarea>
                                    </div>
                                </div>

                                <div class="text-end mt-4">
                                    <button class="btn btn-primary px-4">
                                        <i class="bi bi-save me-1"></i> Update Profile
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Appointments -->
                        <h4 class="mt-5 mb-3">Appointment Requests</h4>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Patient</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Problem</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($appointments as $a)

                                <!-- Main Row -->
                                <tr>
                                    <td>{{ $a->patient_name }}</td>
                                    <td>{{ $a->patient_phone }}</td>
                                    <td>{{ $a->appointment_date }}</td>
                                    <td>{{ $a->appointment_time }}</td>
                                    <td>{{ $a->disease_description }}</td>
                                    <td>
                                        @if($a->status == 'pending')
                                            <form method="POST" action="{{ url('/doctor/appointment/'.$a->id.'/approve') }}" class="d-inline">
                                                @csrf
                                                <button class="btn btn-success btn-sm">
                                                    <i class="bi bi-check-circle"></i>
                                                </button>
                                            </form>

                                            <form method="POST" action="{{ url('/doctor/appointment/'.$a->id.'/reject') }}" class="d-inline">
                                                @csrf
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="bi bi-x-circle"></i>
                                                </button>
                                            </form>
                                        @elseif($a->status == 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @else
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Media -->
                                @if($a->images || $a->video)
                                <tr>
                                    <td colspan="6">
                                        @if($a->images)
                                        <div class="row g-2">
                                            @foreach($a->images as $img)
                                            <div class="col-md-3">
                                                <img src="{{ asset('storage/'.$img) }}" class="img-fluid rounded">
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif

                                        @if($a->video)
                                        <video controls class="w-100 mt-3">
                                            <source src="{{ asset('storage/'.$a->video) }}">
                                        </video>
                                        @endif
                                    </td>
                                </tr>
                                @endif

                                <!-- Doctor Response -->
                                <tr>
                                    <td colspan="6">
                                        <form method="POST" action="{{ url('/doctor/appointment/'.$a->id.'/respond') }}">
                                            @csrf
                                            <textarea name="doctor_comment" class="form-control mb-2" placeholder="Doctor comments">{{ $a->doctor_comment }}</textarea>
                                            <textarea name="prescription" class="form-control mb-2" placeholder="Prescription">{{ $a->prescription }}</textarea>
                                            <button class="btn btn-success">Submit Response</button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>

                        <!-- Change Password -->
                        <div class="bg-light rounded p-5 shadow-sm">
                            <h4 class="text-uppercase mb-4 border-bottom pb-2">
                                <i class="bi bi-shield-lock-fill me-2 text-primary"></i>
                                Change Password
                            </h4>

                            <form method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">New Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>

                                <div class="text-end mt-4">
                                    <button class="btn btn-dark px-4">
                                        <i class="bi bi-key-fill me-1"></i> Change Password
                                    </button>
                                </div>
                            </form>

                            <form method="POST" action="{{ url('/doctor/logout') }}" class="text-end mt-4">
                                @csrf
                                <button class="btn btn-danger px-4">
                                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                                </button>
                            </form>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
