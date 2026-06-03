@extends('app')
<!DOCTYPE html>
<html lang="en">

@section('content')

<!-- Products -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="owl-carousel product-carousel">
            @for($i=1;$i<=4;$i++)
            <div class="pb-5">
                <div class="product-item bg-light text-center">
                    <img class="img-fluid mb-4" src="{{ asset('assets/img/product-'.$i.'.png') }}" alt="Product {{$i}}">
                    <h6 class="text-uppercase">Quality Pet Foods</h6>
                    <h5 class="text-primary">$199.00</h5>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>

<!-- Offer -->
<div class="container-fluid bg-offer my-5 py-5">
    <div class="container text-white text-center">
        <h1 class="display-5 text-uppercase">Save 50% on first order</h1>
        <a href="{{ url('/product') }}" class="btn btn-light">Shop Now</a>
    </div>
</div>



<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top">
    <i class="bi bi-arrow-up"></i>
</a>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
@endsection
</html>
