@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                @if ($errors->any())
                <div class="alert alert-warning">
                    <ol>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ol>
                </div>
                @endif

        @auth
            <div class="card shadow-sm border-top-0">
                <div class="card-body">
                    <form method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="title" >
                                <i class="fa-solid fa-newspaper pe-2"></i> 
                                Title
                            </label>
                            <input type="text" value="{{ $article->title }}" class="form-control" name="title">
                        </div>

                        <div class="form-group mb-3">
                            <label for="body">
                                <i class="fa-solid fa-pen-nib pe-2"></i>
                                Body
                            </label>
                            <textarea name="body" class="form-control" id="" cols="30" rows="5">{{ $article->body }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="category">
                                <i class="fa-solid fa-align-left pe-2"></i>
                                Category
                            </label>
                            <select name="category_id" class="form-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category["id"]}}">
                                        {{ $category["name"] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary border-0">
                            <i class="fa-solid fa-wrench"></i>
                            Update
                        </button>
                    </form>
                </div>
            </div>
        @endauth
            </div>
        </div>
    </div>
@endsection