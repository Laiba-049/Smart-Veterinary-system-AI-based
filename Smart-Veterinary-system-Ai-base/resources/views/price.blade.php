@extends('app')
<!DOCTYPE html>
<html lang="en">
    @section('content')


<!-- Pricing -->
<div class="container py-5">
    <div class="border-start border-5 border-primary ps-5 mb-5">
        <h6 class="text-primary text-uppercase">Pricing Plan</h6>
        <h1 class="display-5 text-uppercase">Competitive Pricing</h1>
    </div>

    <div class="row g-5">
        @foreach([
            ['Basic',49],
            ['Standard',99],
            ['Extended',149]
        ] as $plan)
        <div class="col-lg-4">
            <div class="bg-light text-center pt-5">
                <h2 class="text-uppercase">{{ $plan[0] }}</h2>
                <div class="bg-primary p-4 mb-3">
                    <h1 class="text-white">${{ $plan[1] }} / Mo</h1>
                </div>
                <a href="#" class="btn btn-primary my-3">Order Now</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Team -->
<div class="container py-5">
    <div class="border-start border-5 border-primary ps-5 mb-5">
        <h6 class="text-primary text-uppercase">Our Doctors</h6>
        <h1 class="display-5 text-uppercase">Qualified Professionals</h1>
    </div>

    <div class="owl-carousel team-carousel">
        @for($i=1;$i<=5;$i++)
        <div class="team-item">
            <img class="img-fluid" src="{{ asset('assets/img/team-'.$i.'.jpg') }}">
            <div class="bg-light text-center p-4">
                <h5>Doctor Name</h5>
                <p>Veterinary Doctor</p>
            </div>
        </div>
        @endfor
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
