@extends('app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Edit Animal</h3>

    <form method="POST" action="{{ route('animals.update', $animal->id) }}" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- BASIC INFO --}}
        <div class="mb-3">
            <label class="form-label">Animal Name *</label>
            <input type="text" name="title" value="{{ old('title', $animal->title) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description *</label>
            <textarea name="description" class="form-control" rows="4"
                required>{{ old('description', $animal->description) }}</textarea>
        </div>

        {{-- DETAILS --}}
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" value="{{ old('price', $animal->price) }}" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Age</label>
                <input type="text" name="age" value="{{ old('age', $animal->age) }}" class="form-control">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label">Gender</label>
                <input type="text" name="gender" value="{{ old('gender', $animal->gender) }}" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" value="{{ old('location', $animal->location) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Breed</label>
            <input type="text" name="breed" value="{{ old('breed', $animal->breed) }}" class="form-control">
        </div>

        {{-- EXISTING IMAGES --}}
        <div class="mb-3">
            <label class="form-label">Current Images</label>

            <div class="d-flex flex-wrap gap-3">
                @if($animal->images->count() > 0)
                @foreach($animal->images as $img)
                <img src="{{ asset('storage/' . $img->image_path) }}" width="100" height="100" class="rounded border">
                @endforeach
                @else
                <p class="text-muted mb-0">No images uploaded.</p>
                @endif
            </div>
        </div>


        {{-- UPDATE IMAGES --}}
        <div class="mb-3">
            <label class="form-label">
                Replace Images (optional)
            </label>

            <input type="file" name="images[]" class="form-control" multiple>

            <small class="text-muted">
                Leave empty to keep existing images.
            </small>
        </div>

        {{-- ACTIONS --}}
        <div class="mt-4">
            <button class="btn btn-success">
                Update Animal
            </button>

            <a href="{{ route('animals.index') }}" class="btn btn-secondary ms-2">
                Back
            </a>
        </div>
    </form>
</div>
@endsection
