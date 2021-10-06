@extends('layouts.simple')

@section('content')
    <!-- Hero -->
    <div class="hero bg-body-extra-light overflow-hidden">
        <div class="hero-inner">
            <div class="content content-full text-center">
                <h1 class="fw-bold mb-2">
                   Welcome to the Laravel site
                </h1>

                <a class="btn btn-alt-primary" href="{{ route("login") }}">
                    Login
                    <i class="fa fa-fw fa-arrow-right opacity-50 ms-1"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- END Hero -->
@endsection
