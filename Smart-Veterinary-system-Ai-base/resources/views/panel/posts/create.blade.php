@extends('app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">

            <h5 class="mb-3">🐕 Create New Post</h5>

            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- Content --}}
                <div class="mb-3">
                    <textarea class="form-control"
                              name="description"
                              rows="4"
                              placeholder="Share something about your animal..."
                              required></textarea>
                </div>

                {{-- Image --}}
                <div class="mb-3">
                    <input type="file" name="image" class="form-control">
                </div>

                {{-- Actions --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('posts.panel') }}" class="btn btn-light">
                        Cancel
                    </a>
                    <button class="btn btn-success">
                        🚀 Post
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
