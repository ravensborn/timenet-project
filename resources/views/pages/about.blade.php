@extends('layouts.master')


@section('content')

    <!-- Breadcrumb -->
    <div class="bg-light">
        <div class="container py-4">
            <div class="row">
                <div class="col-sm">
                    <h4 class="mb-0">About TimeNet</h4>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">{{ config('env.APP_NAME') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                About Us
                            </li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Gallery -->
    <div class="container content-space-t-1 content-space-lg-1">
        <div class="w-lg-75 text-center mx-lg-auto">
            <!-- Heading -->
            <div class="mb-5 mb-md-10">
                <h1 class="display-4">About Us</h1>
                <p class="lead mt-5">
                    Welcome to TimeNet, your fast and reliable internet service provider. Our state-of-the-art network
                    infrastructure ensures the fastest speeds and most reliable connections. We also offer a range of
                    networking products and services, including tools and equipment. Trust us to provide hassle-free
                    service and exceptional customer support. Choose TimeNet as your internet service provider and stay
                    connected with ease.
                </p>
            </div>
            <!-- End Heading -->
        </div>

        <div class="row gx-3">
            <div class="col mb-3">
                <div class="bg-img-start"
                     style="background-image: url({{ asset('images/wallpapers/about/1.jpg') }}); height: 15rem;"></div>
            </div>
            <!-- End Col -->

            <div class="col-3 d-none d-md-block mb-3">
                <div class="bg-img-start"
                     style="background-image: url({{ asset('images/wallpapers/about/5.jpg') }}); height: 15rem;"></div>
            </div>
            <!-- End Col -->

            <div class="col mb-3">
                <div class="bg-img-start"
                     style="background-image: url({{ asset('images/wallpapers/about/3.jpg') }}); height: 15rem;"></div>
            </div>
            <!-- End Col -->

            <div class="w-100"></div>

            <div class="col mb-3 mb-md-0">
                <div class="bg-img-start"
                     style="background-image: url({{ asset('images/wallpapers/about/4.jpg') }}); height: 15rem;"></div>
            </div>
            <!-- End Col -->

            <div class="col-4 d-none d-md-block mb-3 mb-md-0">
                <div class="bg-img-start"
                     style="background-image: url({{ asset('images/wallpapers/about/2.jpg') }}); height: 15rem;"></div>
            </div>
            <!-- End Col -->

            <div class="col">
                <div class="bg-img-start"
                     style="background-image: url({{ asset('images/wallpapers/about/6.jpg') }}); height: 15rem;"></div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Gallery -->

    <div class="border-top mx-auto" style="max-width: 30rem;"></div>

    <!-- Info -->
    <div class="container content-space-1 content-space-lg-1">
        <div class="row text-center">

            <div class="col-lg-12">

                <h2 class="mb-4">Tools should adapt to the user, not the other way around.</h2>

                <p>Things can get really complex, really quickly, and a pragmatic, synthetic and clear vision is
                    essential to be able to create something that, after all, is meant to be used. Emotions also have a
                    big role to play and developing clear and beautiful aesthetics is of the utmost importance to create
                    a pleasant environment in which the user actually enjoys the time spent in it. In the end, we're all
                    suckers for beautiful things that just work</p>

                <p>Since 2007, we have helped 25 companies launch over 1k incredible products. We believe the best
                    digital solutions are built at the intersection of business strategy, available technology, and real
                    user's needs.</p>
            </div>
            <!-- End Col -->
        </div>
        <div class="row mt-5 justify-content-lg-center">
            <div class="col-sm-4 col-lg-3 mb-7 mb-sm-0">
                <div class="text-center">
                    <h2 class="display-4">17</h2>
                    <p class="fw-bold fs-4">Years in business</p>
                </div>
            </div>
            <!-- End Col -->

            <div class="col-sm-4 col-lg-3 mb-7 mb-sm-0">
                <div class="text-center">
                    <h2 class="display-4">1,200</h2>
                    <p class="fw-bold fs-4">Clients</p>
                </div>
            </div>
            <!-- End Col -->

            <div class="col-sm-4 col-lg-3">
                <div class="text-center">
                    <h2 class="display-4">100%</h2>
                    <p class="fw-bold fs-4">Happy customers</p>
                </div>
            </div>
            <!-- End Col -->
        </div>
    </div>
    <!-- End Info -->

    <div class="border-top mx-auto" style="max-width: 30rem;"></div>

    <!-- Team -->
    <div class="container content-space-1 content-space-lg-1">
        <!-- Heading -->
        <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">

            <h2>TimeNet's Team</h2>
            <p>
                TimeNet's team is made up of highly skilled professionals who are passionate about providing top-quality service to our customers. We pride ourselves on our friendly and knowledgeable support staff, who are always ready to assist with any issues or questions you may have. Our team is committed to ensuring that you have the best possible experience with our internet and networking services.
            </p>
        </div>
        <!-- End Heading -->

        <div class="row gx-3 mb-5 d-flex justify-content-center text-center">
            <div class="col-sm-6 col-lg-3 mb-3">
                <!-- Card -->
                <div class="card card-transition h-100">
                    <div class="card-body">
                        <div class="avatar avatar-lg avatar-circle mb-4">
                            <img class="avatar-img" src="{{ asset('images/wallpapers/team-members/1.png') }}"
                                 alt="Image">
                        </div>

                        <span class="card-subtitle">Founder / CEO</span>
                        <h4 class="card-title">Karzan Ali Awla</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, iste.</p>
                    </div>

                    <div class="card-footer pt-0">
                        <!-- Socials -->
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">
                                    <i class="bi-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">
                                    <i class="bi-google"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">
                                    <i class="bi-twitter"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Socials -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->

            <div class="col-sm-6 col-lg-3 mb-3">
                <!-- Card -->
                <div class="card card-transition h-100">
                    <div class="card-body">
                        <div class="avatar avatar-lg avatar-circle mb-4">
                            <img class="avatar-img" src="{{ asset('images/wallpapers/team-members/2.png') }}"
                                 alt="Image Description">
                        </div>

                        <span class="card-subtitle">Systems Admin</span>
                        <h4 class="card-title">Sameer Akram</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, iste.</p>
                    </div>

                    <div class="card-footer pt-0">
                        <!-- Socials -->
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">
                                    <i class="bi-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">
                                    <i class="bi-google"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">
                                    <i class="bi-twitter"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Socials -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->

{{--            <div class="col-sm-6 col-lg-3 mb-3">--}}
{{--                <!-- Card -->--}}
{{--                <div class="card card-transition h-100">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="avatar avatar-lg avatar-circle mb-4">--}}
{{--                            <img class="avatar-img" src="{{ asset('images/wallpapers/team-members/1.png') }}"--}}
{{--                                 alt="Image Description">--}}
{{--                        </div>--}}

{{--                        <span class="card-subtitle">Operations & Finance</span>--}}
{{--                        <h4 class="card-title"></h4>--}}
{{--                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, iste.</p>--}}
{{--                    </div>--}}

{{--                    <div class="card-footer pt-0">--}}
{{--                        <!-- Socials -->--}}
{{--                        <ul class="list-inline mb-0">--}}
{{--                            <li class="list-inline-item">--}}
{{--                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">--}}
{{--                                    <i class="bi-facebook"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="list-inline-item">--}}
{{--                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">--}}
{{--                                    <i class="bi-google"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="list-inline-item">--}}
{{--                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">--}}
{{--                                    <i class="bi-twitter"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <!-- End Socials -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- End Card -->--}}
{{--            </div>--}}
            <!-- End Col -->

            <div class="col-sm-6 col-lg-3 mb-3">
                <!-- Card -->
                <div class="card card-transition h-100">
                    <div class="card-body">
                        <div class="avatar avatar-lg avatar-circle mb-4">
                            <img class="avatar-img" src="{{ asset('images/wallpapers/team-members/4.png') }}"
                                 alt="Image Description">
                        </div>

                        <span class="card-subtitle">HR & Admin</span>
                        <h4 class="card-title">Van Nawzad</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, iste.</p>
                    </div>

                    <div class="card-footer pt-0">
                        <!-- Socials -->
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">
                                    <i class="bi-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">
                                    <i class="bi-google"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">
                                    <i class="bi-twitter"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Socials -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <div class="col-sm-6 col-lg-3 mb-3">
                <!-- Card -->
                <div class="card card-transition h-100">
                    <div class="card-body">
                        <div class="avatar avatar-lg avatar-circle mb-4">
                            <img class="avatar-img" src="{{ asset('images/wallpapers/team-members/5.png') }}"
                                 alt="Image Description">
                        </div>

                        <span class="card-subtitle">Executive Assistance</span>
                        <h4 class="card-title">Mohammed Hassan</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, iste.</p>
                    </div>

                    <div class="card-footer pt-0">
                        <!-- Socials -->
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">
                                    <i class="bi-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">
                                    <i class="bi-google"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">
                                    <i class="bi-twitter"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Socials -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <div class="col-sm-6 col-lg-3 mb-3">
                <!-- Card -->
                <div class="card card-transition h-100">
                    <div class="card-body">
                        <div class="avatar avatar-lg avatar-circle mb-4">
                            <img class="avatar-img" src="{{ asset('images/wallpapers/team-members/6.png') }}"
                                 alt="Image Description">
                        </div>

                        <span class="card-subtitle">Programmer</span>
                        <h4 class="card-title">Amina Khurshid</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, iste.</p>
                    </div>

                    <div class="card-footer pt-0">
                        <!-- Socials -->
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">
                                    <i class="bi-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">
                                    <i class="bi-google"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn btn-outline-primary btn-xs btn-icon rounded" href="#">
                                    <i class="bi-twitter"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Socials -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->


    </div>
    <!-- End Team -->

@endsection
