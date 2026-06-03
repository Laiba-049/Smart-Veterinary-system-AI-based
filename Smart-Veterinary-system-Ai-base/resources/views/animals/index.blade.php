@extends('app')

@section('content')

<div class="container py-5">
    <div class="row g-4">

        @foreach($animals as $animal)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="{{ route('animals.show', $animal->id) }}" class="text-decoration-none">

                <div class="card h-100 shadow-sm border-0">
                    {{-- IMAGE --}}
                    @if($animal->images->count() > 0)
                        <img src="{{ asset('storage/' . $animal->images->first()->image_path) }}"
                             class="card-img-top"
                             style="height:220px; object-fit:cover;">
                    @else
                        <img src="{{ asset('assets/img/no-image.png') }}"
                             class="card-img-top"
                             style="height:220px; object-fit:cover;">
                    @endif

                    <div class="card-body text-center">
                        <h6 class="text-uppercase text-dark mb-1">
                            {{ $animal->title }}
                        </h6>

                        <p class="text-muted small mb-1">
                            {{ $animal->breed ?? 'N/A' }} • {{ $animal->location ?? 'N/A' }}
                        </p>

                        <h5 class="text-primary">
                            {{ $animal->price }}
                        </h5>
                    </div>
                </div>

            </a>
        </div>
        @endforeach

        @if($animals->count() == 0)
            <p class="text-center text-muted">No animals available.</p>
        @endif

    </div>
</div>

@endsection
