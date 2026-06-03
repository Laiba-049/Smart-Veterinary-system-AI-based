@extends('app')
<!DOCTYPE html>
<html lang="en">


@section('content')

<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded"
                         src="{{ asset('assets/img/about.jpg') }}"
                         style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="border-start border-5 border-primary ps-5 mb-5">
                    <h6 class="text-primary text-uppercase">About Us</h6>
                    <h1 class="display-5 text-uppercase mb-0">We Keep Your Pets Happy All Time</h1>
                </div>
                <h4 class="text-body mb-4">
                    Diam dolor diam ipsum tempor sit. Clita erat ipsum et lorem stet no labore
                </h4>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="owl-carousel team-carousel">
            @for($i = 1; $i <= 5; $i++)
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100"
                             src="{{ asset('assets/img/team-'.$i.'.jpg') }}" alt="">
                    </div>
                    <div class="bg-light text-center p-4">
                        <h5 class="text-uppercase">Full Name</h5>
                        <p class="m-0">Designation</p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
<!-- Team End -->



<!-- Back to Top -->
<a href="#" class="btn btn-primary py-3 fs-4 back-to-top">
    <i class="bi bi-arrow-up"></i>
</a>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
@endsection
</html>
