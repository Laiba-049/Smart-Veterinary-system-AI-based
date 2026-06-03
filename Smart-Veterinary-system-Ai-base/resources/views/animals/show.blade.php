@extends('app')

@section('content')
<div class="container py-5">

    <div class="row g-4">

        {{-- LEFT: IMAGES --}}
        <div class="col-lg-7">

            {{-- Main Image --}}
            @if($animal->images->count() > 0)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $animal->images->first()->image_path) }}"
                    class="img-fluid rounded w-100 border" style="max-height: 420px; object-fit: cover;">
            </div>

            {{-- Thumbnails --}}
            <div class="row g-2">
                @foreach($animal->images as $img)
                <div class="col-3">
                    <img src="{{ asset('storage/' . $img->image_path) }}" class="img-fluid rounded border"
                        style="height: 90px; object-fit: cover; cursor: pointer;">
                </div>
                @endforeach
            </div>
            @else
            <p class="text-muted">No images available</p>
            @endif

            {{-- Description --}}
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="mb-3">Description</h5>
                    <p class="mb-0">{{ $animal->description }}</p>
                </div>
            </div>

            {{-- Videos --}}
            @if($animal->videos->count() > 0)
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="mb-3">Videos</h5>
                    <div class="row g-3">
                        @foreach($animal->videos as $vid)
                        <div class="col-md-6">
                            <video controls class="w-100 rounded border">
                                <source src="{{ asset('storage/' . $vid->video_path) }}">
                            </video>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

        </div>

        {{-- RIGHT: DETAILS --}}
        <div class="col-lg-5">

            <div class="card shadow-sm sticky-top" style="top: 90px;">
                <div class="card-body">

                    {{-- Title --}}
                    <h3 class="mb-2">{{ $animal->title }}</h3>

                    {{-- Price --}}
                    <h4 class="text-primary fw-bold mb-3">
                        {{ $animal->price }}
                    </h4>

                    {{-- Quick Info --}}
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div class="border rounded p-2 small">
                                <strong>Breed</strong><br>
                                {{ $animal->breed ?? 'N/A' }}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border rounded p-2 small">
                                <strong>Age</strong><br>
                                {{ $animal->age ?? 'N/A' }}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border rounded p-2 small">
                                <strong>Gender</strong><br>
                                {{ $animal->gender ?? 'N/A' }}
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border rounded p-2 small">
                                <strong>Location</strong><br>
                                {{ $animal->location ?? 'N/A' }}
                            </div>
                        </div>
                    </div>

                    {{-- Seller --}}
                    <div class="border rounded p-3 mb-3">
                        <strong>Seller</strong>
                        <p class="mb-1">{{ $animal->seller->name ?? 'N/A' }}</p>
                        <small class="text-muted">Verified Seller</small>
                    </div>

                    {{-- CTA Buttons --}}
                    <div class="d-grid gap-2">
                        <form method="POST" action="{{ route('cart.add', $animal->id) }}">
                            @csrf
                            <button class="btn btn-primary">
                                Add to Cart
                            </button>
                        </form>

                        <a href="#" class="btn btn-outline-secondary">
                            Save Listing
                        </a>
                    </div>


                </div>
            </div>

        </div>
    </div>

</div>
@endsection
