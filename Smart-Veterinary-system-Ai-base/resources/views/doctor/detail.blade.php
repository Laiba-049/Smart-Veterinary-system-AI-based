@extends('app')

@section('content')
<div class="container py-5">

    <div class="row g-5">

        <!-- LEFT: Doctor Profile -->
        <div class="col-lg-4">
            <div class="bg-light rounded shadow-sm p-4 text-center">
                <img class="rounded-circle mb-3"
                     src="{{ $doctor->photo ? asset('storage/'.$doctor->photo) : asset('assets/img/user.png') }}"
                     style="width:200px;height:200px;object-fit:cover;">

                <h3 class="text-uppercase mb-1">{{ $doctor->name }}</h3>
                <p class="text-muted mb-2">{{ $doctor->specialization }}</p>

                <p class="mb-1">
                    <strong>Experience:</strong>
                    {{ $doctor->experience ?? 0 }} Years
                </p>
            </div>
        </div>

        <!-- RIGHT: Details + Appointment -->
        <div class="col-lg-8">

            <!-- About Doctor -->
            <div class="mb-5">
                <h4 class="border-bottom pb-2 mb-3">About Doctor</h4>
                <p>{{ $doctor->bio ?? 'No bio available.' }}</p>
            </div>

            <!-- Appointment Form -->
            <div class="bg-light rounded shadow-sm p-4">
                <h4 class="mb-4">
                    <i class="bi bi-calendar-check text-primary me-2"></i>
                    Book Appointment
                </h4>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST"
                      action="{{ url('/doctor/'.$doctor->id.'/appointment') }}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="fw-bold">Your Name</label>
                            <input class="form-control" name="patient_name" required>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold">Contact Number</label>
                            <input class="form-control" name="patient_phone" required>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold">Appointment Date</label>
                            <input type="date" class="form-control" name="appointment_date" required>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold">Appointment Time</label>
                            <input type="time" class="form-control" name="appointment_time" required>
                        </div>

                        {{-- Images --}}
                        <div class="col-md-6">
                            <label class="fw-bold">Upload Images</label>
                            <input type="file" name="images[]" multiple accept="image/*" class="form-control">
                            <small class="text-muted">
                                Up to 3 images (optional)
                            </small>
                        </div>

                        {{-- Video --}}
                        <div class="col-md-6">
                            <label class="fw-bold">Upload Video</label>
                            <input type="file" name="video" accept="video/mp4,video/mov" class="form-control">
                            <small class="text-muted">
                                Optional video (max 5MB)
                            </small>
                        </div>

                        <div class="col-12">
                            <label class="fw-bold">Describe the Problem</label>
                            <textarea class="form-control"
                                      rows="4"
                                      name="disease_description"
                                      placeholder="Explain the disease or issue in detail"></textarea>
                        </div>

                    </div>

                    <button class="btn btn-primary mt-4 px-4">
                        <i class="bi bi-send"></i>
                        Request Appointment
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
