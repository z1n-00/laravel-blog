    @extends("layouts.app")

    @section("content")
        <div class="container">
            {{ $articles->links()}}

            @if(session('info'))
                <div class="alert alert-info">
                    {{ session('info') }}
                </div>
            @endif

            @foreach($articles as $article)
                <div class="card my-3 shadow-sm border-top-0">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <div class="card-subtitle mb-2 text-muted small">
                            {{ $article->created_at->diffForHumans() }}
                        </div>
                        <p class="card-text">{{ $article->body }}</p>

                        <div class="small mb-2">
                            By <b>{{ $article->user->name }}</b>,
                            {{ $article->created_at->diffForHumans() }}
                        </div>

                        <a class="card-link text-decoration-none bg-light px-2 rounded-pill" 
                            href="{{ url("/articles/detail/$article->id") }}" >
                                View Detail <i class="fa-sharp fa-solid fa-angles-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
