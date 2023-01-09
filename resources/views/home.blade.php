@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header alert mb-0 border-bottom border-2 border-0">
                    {{ __('Dashboard') }}
                </div>

                <div class="card-body bg-light border-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are now logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




