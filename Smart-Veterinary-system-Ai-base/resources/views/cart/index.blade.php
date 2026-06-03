@extends('app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">My Cart</h3>

    @forelse($cartItems as $item)
        <div class="card mb-3">
            <div class="row g-0 align-items-center">

                <div class="col-md-2">
                    @if($item->animal->images->count() > 0)
                        <img src="{{ asset('storage/' . $item->animal->images->first()->image_path) }}"
                             class="img-fluid rounded-start">
                    @endif
                </div>

                <div class="col-md-6">
                    <div class="card-body">
                        <h5>{{ $item->animal->title }}</h5>
                        <p class="mb-1">{{ $item->animal->location }}</p>
                        <strong>{{ $item->animal->price }}</strong>
                    </div>
                </div>

                <div class="col-md-4 text-end pe-3">
                    <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Remove
                        </button>
                    </form>

                    <a href="{{ route('checkout.show', $item->animal->id) }}"
                       class="btn btn-success btn-sm mt-2">
                        Buy Now
                    </a>
                </div>

            </div>
        </div>
    @empty
        <p>Your cart is empty.</p>
    @endforelse
</div>
@endsection
