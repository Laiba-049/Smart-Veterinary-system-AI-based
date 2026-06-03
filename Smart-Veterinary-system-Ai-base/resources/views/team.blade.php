@extends('app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Smart Veterinary - Our Doctors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/lib/flaticon/font/flaticon.css') }}" rel="stylesheet">

    <!-- Libraries -->
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
@section('content')
<body>



<!-- Team -->
<div class="container py-5">
    <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width:600px;">
        <h6 class="text-primary text-uppercase">Team Members</h6>
        <h1 class="display-5 text-uppercase">Qualified Veterinary Doctors</h1>
    </div>

    {{--  <div class="owl-carousel team-carousel position-relative" style="padding-right:25px;">
        @for($i=1; $i<=5; $i++)
        <div class="team-item">
            <div class="position-relative overflow-hidden">
                <img class="img-fluid w-100" src="{{ asset('assets/img/team-'.$i.'.jpg') }}">
                <div class="team-overlay">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                        <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="bg-light text-center p-4">
                <h5 class="text-uppercase">Doctor Name</h5>
                <p class="m-0">Veterinary Specialist</p>
            </div>
        </div>
        @endfor
    </div>  --}}
    <div class="owl-carousel team-carousel position-relative" style="padding-right:25px;">
    @foreach($doctors as $doctor)
    <div class="team-item">
        <div class="position-relative overflow-hidden">
            <img class="img-fluid w-100"
                 src="{{ $doctor->photo ? asset('storage/'.$doctor->photo) : asset('assets/img/user.png') }}">

            <div class="team-overlay">
                <div class="d-flex align-items-center justify-content-center">
                    <!-- Example social icons, you can replace href with actual links -->
                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>
                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>
                    <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="bg-light text-center p-4">
            <h5 class="text-uppercase">{{ $doctor->name }}</h5>
            <p class="m-0">{{ $doctor->specialization }}</p>

            <a href="{{ url('/doctor/'.$doctor->id) }}" class="btn btn-primary mt-3">
                View Profile
            </a>
        </div>
    </div>
    @endforeach
</div>

</div>



<!-- JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>



</body>
@endsection
</html>
