@extends('layouts.master')


@section('content')

    <div class="container content-space-1 content-space-lg-2">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 text-center">

                <div>

                    <i class="bi bi-person-lock display-1 text-dark"></i>

                    <div class="mb-5">
                        <h1 class="h2">Your account is suspended!</h1>
                        <p>
                            Your account has been suspended due to multiple violations of our website guidelines.
                            We take these violations seriously in order to maintain a safe and respectful environment for
                            all users. We encourage you to review our guidelines to better understand which rule(s) were
                            broken.
                        </p>
                        <p>
                             If you have any questions or would like to discuss the suspension further, please
                            contact our customer support team for assistance.
                        </p>
                    </div>
                    <a class="btn btn-dark btn-transition rounded-pill px-6"
                       href="{{ route('home') }}">Return Home</a>


                    <div class="mt-4"></div>

                    <a class="link text-muted d-block" href="{{ route('logout') }}">
                        <i class="bi-chevron-left small ms-1"></i>
                        Logout
                    </a>

                </div>


            </div>
        </div>
    </div>

@endsection
