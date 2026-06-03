@extends('app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Checkout</h3>

    <form method="POST" action="{{ route('checkout.store', $animal->id) }}">
        @csrf

        {{-- Fixed --}}
        <input class="form-control mb-2" value="{{ auth()->user()->name }}" readonly>
        <input class="form-control mb-2" value="{{ auth()->user()->email }}" readonly>

        {{-- Editable --}}
        <input name="mobile" class="form-control mb-2" placeholder="Mobile Number" required>
        <input name="alternate_mobile" class="form-control mb-2" placeholder="Alternate Mobile" required>

        <textarea name="address" class="form-control mb-2" placeholder="Address" required></textarea>
        <textarea name="address_2" class="form-control mb-2" placeholder="Address 2 (Optional)"></textarea>

        <textarea name="expectations" class="form-control mb-2" placeholder="Expectations"></textarea>

        <input name="when_needed" class="form-control mb-3" placeholder="When do you need?" required>

        {{-- Pricing --}}
        <div class="border rounded p-3 mb-3">
            <p class="mb-1"><strong>Animal Price:</strong> {{ $animal->price }}</p>
            <p class="mb-0 text-danger">
                <strong>Delivery Charges:</strong> Rs 5,000 (Payable on delivery)
            </p>
        </div>

        <button class="btn btn-success w-100">
            Confirm Order
        </button>
    </form>
</div>
@endsection
