@extends('layouts.simple')

@section('content')
    <!-- Hero -->
    <div class="hero bg-body-extra-light overflow-hidden">
        <div class="hero-inner">
            <div class="content content-full text-center">
                <h1 class="fw-bold mb-2">
                    Welcome {{ ucfirst(Auth::user()->name) }} to the Laravel site
                </h1>
                {{-- <a class="btn btn-alt-primary" href="{{ route("login") }}">
                    Logout
                    <i class="fa fa-fw fa-arrow-right opacity-50 ms-1"></i>
                </a> --}}

                <a class="btn btn-alt-primary mt-4" href="javascript:void(0)"
                    onclick="document.getElementById('logout-form').submit()">
                    <span class="fs-sm fw-medium">Log Out</span>
                </a>

                <form action="{{ route('logout') }}" id="logout-form" method="POST">
                    @csrf

                </form>

            </div>
        </div>
    </div>
    <!-- END Hero -->
@endsection
