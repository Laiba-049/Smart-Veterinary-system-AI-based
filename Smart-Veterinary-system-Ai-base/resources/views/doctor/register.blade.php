@extends('app')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                <!-- Heading -->
                <div class="border-start border-5 border-primary ps-4 mb-4">
                    <h6 class="text-primary text-uppercase">Doctor</h6>
                    <h1 class="display-6 text-uppercase mb-0">Doctor Registration</h1>
                </div>

                <!-- Card -->
                <div class="bg-light p-5 rounded">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <input class="form-control" name="name" placeholder="Full Name">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="email" placeholder="Email Address">
                            </div>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                            </div>

                            <div class="col-md-6">
                                <input class="form-control" name="phone" placeholder="Phone Number">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="specialization" placeholder="Specialization">
                            </div>

                            <div class="col-md-6">
                                <input class="form-control" name="experience" placeholder="Experience (Years)">
                            </div>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="photo">
                            </div>

                            <div class="col-12">
                                <textarea class="form-control" name="bio" rows="4" placeholder="Short Bio"></textarea>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <button class="btn btn-primary px-4 py-2">
                                Register
                            </button>

                            <span class="text-muted">
                                Already registered?
                                <a href="{{ url('/doctor/login') }}" class="text-primary fw-bold">
                                    Login here
                                </a>
                            </span>
                        </div>
                    </form>
                </div>
                <!-- Card End -->

            </div>
        </div>
    </div>
</div>
@endsection
