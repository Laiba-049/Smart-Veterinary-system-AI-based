@extends('app')

@section('content')
<div class="container py-5">

    {{-- 🎉 SUCCESS MESSAGE --}}
    <div class="alert alert-success text-center">
        <h4 class="mb-2">🎉 Congratulations!</h4>
        <p class="mb-0">
            Your order has been placed successfully.
            <br>
            <strong>Order No:</strong> {{ $order->order_no }}
        </p>
    </div>

    {{-- ORDER DETAILS --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <h5 class="mb-3">Order Details</h5>

            <table class="table table-bordered">
                <tr>
                    <th>Animal</th>
                    <td>{{ $order->animal->title ?? '' }}</td>
                </tr>
                <tr>
                    <th>Breed</th>
                    <td>{{ $order->animal->breed ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Your Name</th>
                    <td>{{ $order->name }}</td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>{{ $order->mobile }}</td>
                </tr>
                <tr>
                    <th>Alternate Mobile</th>
                    <td>{{ $order->alternate_mobile }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $order->address }}</td>
                </tr>
                @php
                $price = (int) preg_replace('/[^0-9]/', '', $order->animal_price);
                @endphp

                <tr>
                    <th>Animal Price</th>
                    <td>Rs {{ number_format($price) }}</td>
                </tr>

                <tr>
                    <th>Delivery Charges</th>
                    <td>Rs 5,000 <small class="text-muted">(Payable at delivery)</small></td>
                </tr>

                <tr class="table-success fw-bold">
                    <th>Total Amount</th>
                    <td>Rs {{ number_format($price + 5000) }}</td>
                </tr>
            </table>

        </div>
    </div>

    {{-- SELLER MESSAGE --}}
    <div class="alert alert-info text-center mb-4">
        <h5 class="mb-2">📦 Message from Seller</h5>
        <p class="mb-1">
            Your order will be delivered within <strong>3 working days</strong>.
        </p>
        <p class="mb-1">
            <strong>Expected Delivery Date:</strong>
            {{ \Carbon\Carbon::parse($order->created_at)->addDays(3)->format('d M Y') }}
        </p>
        <p class="mb-0">
            Please keep <strong>Rs 5,000</strong> ready for delivery charges at the time of delivery.
        </p>
    </div>

    {{-- CONTINUE SHOPPING --}}
    <div class="text-center">
        <a href="{{ route('animals.public.index') }}" class="btn btn-primary px-4">
            Continue Shopping
        </a>
    </div>

</div>

{{-- 🔥 AUTO DOWNLOAD RECEIPT --}}
<script>
    window.onload = function () {
        window.location.href = "{{ route('order.receipt', $order->id) }}";
    }
</script>
@endsection
