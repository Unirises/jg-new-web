@extends('layouts.master-without-nav')

@section('title')
Confirm Password
@endsection

@section('css')
<!-- owl.carousel css -->
<link rel="stylesheet" href="{{ URL::asset('assets/libs/owl.carousel/owl.carousel.min.css') }}">
@endsection

@section('body')

<body class="auth-body-bg">
    @endsection

    @section('content')

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-9">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-100 flex-column">

                            <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center">

                                                <h4 class="mb-3"><i class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i><span class="text-primary">Cheapest</span> service provider ever!</h4>

                                                <div dir="ltr">
                                                    <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">
                                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde quam voluptatibus ullam doloribus odit minima delectus quasi alias odio ab, nihil, maiores ut. Temporibus voluptatibus earum quaerat cum dolores ratione.
                                                                </p>
                                                            </div>

                                                        </div>

                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde quam voluptatibus ullam doloribus odit minima delectus quasi alias odio ab, nihil, maiores ut. Temporibus voluptatibus earum quaerat cum dolores ratione.</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5">
                                    <a href="index" class="d-block auth-logo">
                                        <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="18" class="auth-logo-dark">
                                        <img src="{{ URL::asset('assets/images/logo-light.png') }}" alt="" height="18" class="auth-logo-light">
                                    </a>
                                </div>
                                <div class="my-auto">

                                    <div>
                                        <h5 class="text-primary"> Confirm Password</h5>
                                    </div>

                                    <div class="mt-4">
                                        <form class="form-horizontal" method="POST" action="{{ route('password.confirm') }}">
                                            @csrf

                                            <div class="mb-3">
                                                <div class="float-end">
                                                    @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                                                    @endif
                                                </div>
                                                <label for="userpassword">Password</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="userpassword" placeholder="Enter password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Confirm Password</button>
                                            </div>

                                        </form>
                                        <div class="mt-5 text-center">
                                            <p>Remember It ? <a href="{{ url('login') }}" class="font-weight-medium text-primary"> Sign In here</a> </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">?? JG Express</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

    @endsection

    @section('script')
    <!-- owl.carousel js -->
    <script src="{{ URL::asset('assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <!-- auth-2-carousel init -->
    <script src="{{ URL::asset('assets/js/pages/auth-2-carousel.init.js') }}"></script>
    @endsection