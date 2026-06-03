@extends('app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">List Animal for Sale</h3>

    <form method="POST" action="{{ route('animals.store') }}" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label class="form-label">Animal Name *</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description *</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price (optional)</label>
            <input type="text" name="price" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Age (optional)</label>
            <input type="text" name="age" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Gender </label>
            <input type="text" name="gender" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Location </label>
            <input type="text" name="location" class="form-control">
        </div>


        <div class="mb-3">
            <label class="form-label">Breed (optional)</label>
            <input type="text" name="breed" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Images (3–10 required)</label>
            <input type="file" name="images[]" class="form-control" multiple required>
        </div>

        <div class="mb-3">
            <label class="form-label">Video (optional)</label>
            <input type="file" name="videos[]" class="form-control" multiple>

        </div>

        <button type="submit" class="btn btn-success">
            Publish Animal
        </button>
    </form>
</div>
@endsection
