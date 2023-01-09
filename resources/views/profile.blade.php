@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-lg-4">

            @if($errors->any())
            <div class="alert alert-warning">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
            @endif

            <div class="card mx-auto shadow-sm border-0" style="width: 18rem;">
                <form action="{{route('profile.upload')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="pt-3 ps-3 ">
                        <img class="image rounded-pill" src="{{ asset('/storage/images/'.Auth::user()->image) }}" alt="profile_image"
                        style="width: 100px; height: 100px; border-radius: 10%">
                    </div>

                    <div class="card-body p-4">
                        <h5 class="card-title">
                            <label for="image" class="text-primary">
                                <h6>{{Auth::user()->name}}</h6>
                            </label>
                        </h5>
                        <input type="file" name="image" class="form-control mb-3 border-0">
                        
                        <input class="btn btn-primary" type="submit" value="Upload">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection