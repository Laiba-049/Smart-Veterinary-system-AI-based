<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans; font-size: 12px; }
        .title { font-size: 18px; font-weight: bold; }
        .box { border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; }
    </style>
</head>
<body>

<p class="title">Order Receipt</p>

<div class="box">
<strong>Order No:</strong> {{ $order->order_no }}<br>
<strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }}
</div>

<div class="box">
<strong>Customer Name:</strong> {{ $order->name }}<br>
<strong>Email:</strong> {{ $order->email }}<br>
<strong>Mobile:</strong> {{ $order->mobile }}<br>
<strong>Alternate Mobile:</strong> {{ $order->alternate_mobile }}<br>
<strong>Address:</strong> {{ $order->address }} {{ $order->address_2 }}
</div>

<div class="box">
<strong>Animal:</strong> {{ $order->animal->title }}<br>
<strong>Breed:</strong> {{ $order->animal->breed }}<br>
<strong>Price:</strong> {{ $order->animal_price }}<br>
<strong>Delivery Charges:</strong> Rs 5,000 (Payable on delivery)
</div>

<p><strong>Note:</strong> Delivery charges are payable at delivery time.</p>

</body>
</html>
