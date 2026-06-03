@extends('app')

@section('content')
<div class="container py-4">

<h4 class="mb-3">Orders Received</h4>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Order #</th>
            <th>Animal</th>
            <th>Buyer</th>
            <th>Mobile</th>
            <th>Price</th>
            <th>Delivery</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->order_no }}</td>
            <td>
                {{ $order->animal->title }} <br>
                <small>{{ $order->animal->breed }}</small>
            </td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->mobile }}</td>
            <td>{{ $order->animal_price }}</td>
            <td>Rs 5,000</td>
            <td>{{ $order->created_at->format('d M Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@if($orders->count() == 0)
<p class="text-muted">No orders received yet.</p>
@endif

</div>
@endsection
