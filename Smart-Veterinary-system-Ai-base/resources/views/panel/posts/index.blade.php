@extends('app')

@section('content')
<div class="container">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">🐾 My Animal Posts</h4>
        <a href="{{ url('/panel/posts/create') }}" class="btn btn-primary">
            ➕ New Post
        </a>
    </div>

    {{-- Empty State --}}
    @if($posts->count() == 0)
        <div class="alert alert-info text-center">
            You haven’t posted anything yet 🐶
            <br>
            <a href="{{ url('/panel/posts/create') }}" class="btn btn-sm btn-outline-primary mt-2">
                Create your first post
            </a>
        </div>
    @endif

    {{-- Posts --}}
    @foreach($posts as $post)
        <div class="card shadow-sm mb-3">
            <div class="card-body">

                {{-- Image --}}
                @if($post->image)
                    <img src="{{ asset('storage/'.$post->image) }}"
                         class="img-fluid rounded mb-3"
                         style="max-height:300px; object-fit:cover;">
                @endif

                {{-- Content --}}
                <p class="mb-3">{{ $post->description }}</p>

                {{-- Footer --}}
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        Posted {{ $post->created_at->diffForHumans() }}
                    </small>

                    <div class="d-flex gap-2">
                        <a href="{{ route('posts.edit', $post->id) }}"
                           class="btn btn-sm btn-outline-warning">
                            ✏ Edit
                        </a>

                        <form action="{{ url('/panel/posts/' . $post->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this post?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">
                                🗑 Delete
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @endforeach

</div>
@endsection
