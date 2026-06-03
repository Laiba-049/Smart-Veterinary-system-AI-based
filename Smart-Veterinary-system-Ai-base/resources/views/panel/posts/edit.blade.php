@extends('app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">

            <h5 class="mb-3">✏ Edit Post</h5>

            <form action="{{ url('/panel/posts/'.$post->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Content --}}
                <div class="mb-3">
                    <label class="form-label">Post Content</label>
                    <textarea name="description"
                              class="form-control"
                              rows="4"
                              required>{{ old('description', $post->description) }}</textarea>
                </div>

                {{-- Current Image --}}
                @if($post->image)
                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        <img src="{{ asset('storage/'.$post->image) }}"
                             class="img-fluid rounded"
                             style="max-height:250px;">
                    </div>
                @endif

                {{-- Change Image --}}
                <div class="mb-3">
                    <label class="form-label">Change Image (optional)</label>
                    <input type="file" name="image" class="form-control">
                </div>

                {{-- Buttons --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ url('/panel/posts') }}" class="btn btn-light">
                        Cancel
                    </a>
                    <button class="btn btn-primary">
                        💾 Update Post
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
