    @extends("layouts.app")

    @section("content")
    
        <div class="container">
           <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    @if(session('info'))
                    <div class="alert alert-info">
                        {{ session('info') }}
                    </div>
                    @endif

                    <div class="card mb-3 shadow-sm border-top-0">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                                <div class="card-subtitle mb-2 text-muted small">
                                    {{ $article->created_at->diffForHumans() }}</div>
                                    Category: <b>{{ $article->category->name }}</b>
                                    <p class="card-text">{{ $article->body }}</p>
    
                            <div class="small mb-3">
                                By <b>{{ $article->user->name }}</b>,
                                {{ $article->created_at->diffForHumans() }}
                            </div>
                        
                            <a href="{{ url("/articles/edit/$article->id")}}" class="btn btn-primary border-0">
                                <i class="fa-solid fa-pen-to-square pe-2"></i>
                                Edit
                            </a>
                            

                            {{-- Modal delete button for article  --}}
                            <a href="{{ url("/articles/delete/$article->id")}}" class="btn btn-warning border-0" 
                                data-bs-toggle="modal"
                                data-bs-target="#btn">
                                <i class="fa-solid fa-trash pe-2"></i>
                                Delete
                            </a>
                            <div class="modal fade" id="btn">
                                <div class="modal-dialog">
                                    <div class="modal-content">                      
                                        <h5 class="modal-header p-0 border-0 position-relative">
                                            <button class="btn
                                                btn-close
                                                bg-warning
                                                top-1
                                                start-100 translate-middle-x
                                                position-absolute"
                                            data-bs-dismiss="modal"></button>
                                        </h5>
                                        <div class="modal-body pb-0 border-0">
                                            <h5 class="text-center">Are you sure want to delete?</h5>
                                        </div>
    
                                        <div class="modal-footer border border-0 p-0">
                                            <button type="button" class="btn btn-secondary text-center border-0"
                                            data-bs-dismiss="modal">
                                                <i class="fa-solid fa-xmark pe-2"></i>
                                                Cancel
                                            </button>
                                        <a href="{{ url("/articles/delete/$article->id")}}" 
                                            type="submit" class="btn btn-warning border-0">
                                            <i class="fa-solid fa-trash pe-2"></i>
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body bg-light">
                        <ul class="list-group">
                            <li class="list-group-item active">
                                <b>Comments ({{ count($article->comments) }})</b>
                            </li>
                            @foreach ($article->comments as $comment)
                            <li class="list-group-item ">
                                <a href="{{ url("/comments/delete/$comment->id") }}"
                                   class="btn-close float-end small border border-primary border-1">  
                                </a>
                                {{ $comment->content }}
                                <div class="small mt-2">
                                    By <b>{{ $comment->user->name }}</b>,
                                    {{ $comment->created_at->diffForHumans() }}
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
    
                    @auth
                    <div class="card-footer bg-white border-top-0 my-2">
                        <form action="{{ url("comments/add") }}" method="post">
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
                            <input type="submit" value="Add Comment" class="btn btn-secondary">
                        </form>
                    </div> 
                    @endauth
                </div>
            </div>
        </div>
    @endsection
