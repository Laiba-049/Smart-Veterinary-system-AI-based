<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PET SHOP - Blog Detail</title>
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

    <!-- Bootstrap -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

<!-- Topbar -->
<div class="container-fluid border-bottom d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-4 text-center py-2">
            <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
            <span>123 Street, New York, USA</span>
        </div>
        <div class="col-lg-4 text-center border-start border-end py-2">
            <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
            <span>info@example.com</span>
        </div>
        <div class="col-lg-4 text-center py-2">
            <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
            <span>+012 345 6789</span>
        </div>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 mb-5">
    <a href="{{ url('/') }}" class="navbar-brand ms-lg-5">
        <h1 class="m-0 text-uppercase text-dark">
            <i class="bi bi-shop fs-1 text-primary me-3"></i>Pet Shop
        </h1>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto">
            <a href="{{ url('/') }}" class="nav-link">Home</a>
            <a href="{{ url('/about') }}" class="nav-link">About</a>
            <a href="{{ url('/service') }}" class="nav-link">Service</a>
            <a href="{{ url('/product') }}" class="nav-link">Product</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu">
                    <a href="{{ url('/price') }}" class="dropdown-item">Pricing</a>
                    <a href="{{ url('/team') }}" class="dropdown-item">Team</a>
                    <a href="{{ url('/testimonial') }}" class="dropdown-item">Testimonial</a>
                    <a href="{{ url('/blog') }}" class="dropdown-item">Blog</a>
                    <a href="{{ url('/detail') }}" class="dropdown-item active">Blog Detail</a>
                </div>
            </div>

            <a href="{{ url('/contact') }}" class="nav-link bg-primary text-white px-4 ms-lg-3">
                Contact <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</nav>

<!-- Blog Detail -->
<div class="container py-5">
    <div class="row g-5">

        <!-- Content -->
        <div class="col-lg-8">
            <img class="img-fluid w-100 rounded mb-5"
                 src="{{ asset('assets/img/blog-1.jpg') }}" alt="">

            <h1 class="text-uppercase mb-4">Diam dolor est labore duo ipsum clita</h1>

            <p>Sadipscing labore amet rebum est et justo gubergren...</p>
            <p>Voluptua est takimata stet invidunt sed rebum...</p>
            <p>Diam dolor est labore duo invidunt ipsum clita...</p>

            <!-- Comment Form -->
            <div class="bg-light rounded p-5 mt-5">
                <h3 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">
                    Leave a comment
                </h3>
                <form>
                    <input class="form-control mb-3" placeholder="Your Name">
                    <input class="form-control mb-3" placeholder="Your Email">
                    <textarea class="form-control mb-3" rows="5" placeholder="Comment"></textarea>
                    <button class="btn btn-primary w-100 py-3">Submit</button>
                </form>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <h3 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">
                Recent Posts
            </h3>

            <div class="d-flex mb-3">
                <img src="{{ asset('assets/img/blog-2.jpg') }}"
                     class="img-fluid" style="width:100px;height:100px;">
                <a href="#" class="h5 bg-light px-3 d-flex align-items-center mb-0">
                    Lorem ipsum dolor sit
                </a>
            </div>

            <img src="{{ asset('assets/img/blog-3.jpg') }}" class="img-fluid rounded mt-4">
        </div>
    </div>
</div>

<!-- Footer -->
<div class="container-fluid bg-dark text-white-50 py-4">
    <div class="container text-center">
        <p class="mb-0">
            &copy; {{ date('Y') }} Pet Shop. All Rights Reserved.
        </p>
    </div>
</div>

<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top py-3 fs-4">
    <i class="bi bi-arrow-up"></i>
</a>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
