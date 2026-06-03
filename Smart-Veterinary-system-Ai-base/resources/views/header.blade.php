<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Smart Veterinary')</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/lib/flaticon/font/flaticon.css') }}" rel="stylesheet">


    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid border-bottom d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-4 text-center py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Our Office</h6>
                        <span>Chak No. 331 JB, Toba Tek Singh</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center border-start border-end py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Email Us</h6>
                        <span>info@smartveterinary.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Call Us</h6>
                        <span>+92 335 6785 876</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="{{ url('/') }}" class="navbar-brand ms-lg-5">
            <h1 class="m-0 text-uppercase text-dark"><i class="bi bi-shop fs-1 text-primary me-3"></i>Smart Veterinary
            </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ url('/about') }}" class="nav-item nav-link">About</a>
                <a href="{{ url('/service') }}" class="nav-item nav-link">Social</a>
                <a href="{{ ('/animals') }}" class="nav-item nav-link">Market-Place</a>
                {{-- <a href="{{ url('/doctor/register') }}" class="nav-item nav-link">Register-As-Doctor</a> --}}


                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ url('/price') }}" class="dropdown-item">Pricing Plan</a>
                        <a href="{{ url('/team') }}" class="dropdown-item">The Team</a>
                        <a href="{{ url('/doctor/register') }}" class="dropdown-item">register-as-a-doctor</a>
                        <a href="{{ url('/my-appointments') }}" class="dropdown-item">My-Appointments</a>
                        {{-- <a href="{{ url('/testimonial') }}" class="dropdown-item">Testimonial</a>
                        <a href="{{ url('/blog') }}" class="dropdown-item">Blog Grid</a>
                        <a href="{{ url('/detail') }}" class="dropdown-item">Blog Detail</a> --}}
                        <a href="{{ url('/chat') }}" class="dropdown-item">Chat-Boot</a>
                        <a href="{{ url('/panel/posts') }}" class="dropdown-item">Social Animals</a>


                    </div>
                </div>
                @auth
                <form action="{{ route('logout') }}" method="POST" class="d-inline ms-lg-3">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm d-flex align-items-center mt-4">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
                @endauth



                <a href="{{url('/contact')}}"
                    class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Contact
                    <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <style>
        .dropdown-menu {
            border-radius: 10px;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }
    </style>
    <!-- Navbar End -->
