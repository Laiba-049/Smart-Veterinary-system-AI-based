-<div class="container py-4" style="max-width: 700px;">

    @foreach($posts as $post)
        <div class="card mb-4 shadow-sm">

            {{-- POST HEADER --}}
            <div class="card-body pb-2">
                <div class="d-flex align-items-center mb-2">
                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                         style="width:40px;height:40px;">
                        {{ strtoupper(substr($post->user->name,0,1)) }}
                    </div>

                    <div class="ms-3">
                        <h6 class="mb-0 fw-bold">{{ $post->user->name }}</h6>
                        <small class="text-muted">
                            {{ $post->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>

                <p class="mt-3 mb-2">
                    {{ $post->description }}
                </p>
            </div>

            @if($post->image)
                <img src="{{ asset('storage/'.$post->image) }}"
                     class="img-fluid w-100"
                     style="max-height:400px;object-fit:cover;">
            @endif

            <div class="card-body py-2">
                <div class="d-flex justify-content-between text-muted small">
                    <span>❤️ {{ $post->likes->count() }} Likes</span>
                    <span>{{ $post->comments->count() }} Comments</span>
                </div>
            </div>

            <div class="card-body py-2 border-top border-bottom">
                <div class="d-flex justify-content-around">

                    <form method="POST" action="{{ url('/posts/'.$post->id.'/like') }}">
                        @csrf
                        <button class="btn btn-sm btn-light w-100">
                            ❤️ Like
                        </button>
                    </form>

                    <button class="btn btn-sm btn-light w-100"
                            onclick="document.getElementById('comment-{{ $post->id }}').focus()">
                        💬 Comment
                    </button>
                </div>
            </div>

            <div class="card-body">

                @foreach($post->comments as $comment)
                    <div class="d-flex mb-2">
                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                             style="width:30px;height:30px;font-size:12px;">
                            {{ strtoupper(substr($comment->user->name,0,1)) }}
                        </div>

                        <div class="ms-2 bg-light rounded px-3 py-2 w-100">
                            <small class="fw-bold">{{ $comment->user->name }}</small>
                            <div>{{ $comment->comment }}</div>
                        </div>
                    </div>
                @endforeach

                @auth
                <form method="POST" action="{{ route('posts.comment', $post->id) }}">
                    @csrf
                    <input type="text"
                           id="comment-{{ $post->id }}"
                           name="comment"
                           class="form-control form-control-sm rounded-pill mt-2"
                           placeholder="Write a comment...">
                </form>
                @endauth

            </div>
        </div>
    @endforeach

</div>
