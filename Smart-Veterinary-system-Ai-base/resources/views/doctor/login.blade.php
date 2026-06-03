@extends('app')

@section('content')
<div class="container py-5">
<h2>Doctor Login</h2>

<form method="POST">
@csrf
<input class="form-control mb-2" name="email" placeholder="Email">
<input class="form-control mb-3" type="password" name="password" placeholder="Password">

<button class="btn btn-primary">Login</button>
</form>
</div>
@endsection
