@extends('layouts.master')


@section('content')



    <div class="container content-space-1 content-space-lg-2">
        <div class="row">
            <div class="col text-center">

                <div class="w-50 mx-md-auto">

                    <i class="bi bi-check2-circle display-1 text-dark"></i>

                    <div class="mb-5">
                        <h1 class="h2">E-Mail Verification Completed!</h1>
                        <p>
                            Congratulations! Your email address has been successfully verified. Thank you for taking
                            this important step to ensure the security and privacy of your account. You can now access
                            all the features and services available on our website. If you have any questions or
                            concerns, please do not hesitate to contact our customer support team.
                        </p>
                    </div>
                    <a class="btn btn-dark btn-transition rounded-pill px-6"
                       href="{{ route('home') }}">Continue
                        to TimeNet</a>


                    <div class="mt-4"></div>

                    <a class="link text-muted d-block" href="{{ route('users.account.overview') }}">
                        <i class="bi-chevron-left small ms-1"></i>
                        User Account
                    </a>
                    <a class="link text-muted d-block" href="{{ route('store.index') }}">
                        <i class="bi-chevron-left small ms-1"></i>
                        TimeNet Store
                    </a>

                </div>


            </div>
        </div>
    </div>

@endsection
