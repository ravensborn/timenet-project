@extends('layouts.master')


@section('content')

    <!-- Hero -->
    <div class="overflow-hidden">
        <div class="container content-space-t-2 content-space-b-1">
            <div class="row justify-content-lg-between align-items-md-center">
                <div class="col-md-6 col-lg-5 mb-7 mb-md-0">
                    <!-- Heading -->
                    <div class="mb-5">
                        <span class="text-cap">Who we are?</span>
                        {{--                        <h1 class="display-4 mb-3">TimeNet</h1>--}}
                        <img width="350px" style="margin-bottom: 30px;" src="{{ asset('images/logo-dark.png') }}"
                             alt="Logo Dark">
                        <p class="lead">A network expertise company works in the fields of providing internet
                            access.</p>
                    </div>
                    <!-- End Title & Description -->

                    <div class="d-grid d-sm-flex gap-3">
                        <a class="btn btn-dark btn-transition" href="{{ route('soon') }}">Case studies</a>
                        <a class="btn btn-link" href="{{ route('soon') }}">Learn more <i class="bi-chevron-right small ms-1"></i></a>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-md-6">
                    <div class="w-100 bg-soft-primary rounded-2">
                        <img class="img-fluid rounded-2"
                             src="{{ asset('images/wallpapers/12.jpg') }}"
                             alt="Image Description">
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- End Hero -->

    <!-- Services -->
    <div class="container content-space-2">
        <!-- Heading -->
        <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5">
            <h2>A network expertise company works in the fields of providing internet access.</h2>
        </div>
        <!-- End Heading -->

        <div class="text-center mb-5">
            We serve our customers, our colleagues and our communities by integrating sustainability into our work every
            day.
            Earlier 2007 I established Time Net for Network and Internet service since relies the demand on Internet in
            the region and absolutely networking requirements with challenges of limited Internet providers and devices
            suppliers comparing with potential of the market, we have our position.
            However, the main goals to providing high quality services and parallels with the latest global technology
            of today as much as possible.
        </div>

        <div class="text-center mb-5">
            <!-- List Checked -->
            <ul class="list-inline list-checked list-checked-primary">
                <li class="list-inline-item list-checked-item">Full Service ISP</li>
                <li class="list-inline-item list-checked-item">High Quality Support</li>
                <li class="list-inline-item list-checked-item">Security Appliances & Firewalls</li>
            </ul>
            <!-- End List Checked -->
        </div>
        <div class="row mb-5 mb-md-0">
            @foreach($services as $post)
                <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0 mt-3">
                    <!-- Card -->
                    <div class="card card-sm h-100">
                        <div class="p-2">
                            <img class="card-img"

                                 src="{{ $post->getFirstMediaUrl('cover') }}"
                                 alt="Image Description">
                        </div>

                        <div class="card-body">
                            <h4 class="card-title">{{ $post->title }}</h4>
                            <p class="card-text">
                                {{ $post->short_content }}
                            </p>

                        </div>

                        <a class="card-footer card-link border-top" href="{{ route('posts.show', $post->slug) }}">Learn
                            more <i class="bi-chevron-right small ms-1"></i></a>
                    </div>
                    <!-- End Card -->
                </div>
            @endforeach
        </div>

        <!-- End Row -->
    </div>
    <!-- End Services-->

    <!-- Who works with us -->
    <div class="container content-space-2">
        <!-- Heading -->
        <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-6">
            <h2>TimeNet is trusted by many enterprises, and more than 33,000 users.</h2>
        </div>
        <!-- End Heading -->

        <div class="row justify-content-center text-center">
            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered"
                     src="{{ asset('themes/front/assets/svg/brands/amazon-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered"
                     src="{{ asset('themes/front/assets/svg/brands/kaplan-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered"
                     src="{{ asset('themes/front/assets/svg/brands/google-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered"
                     src="{{ asset('themes/front/assets/svg/brands/airbnb-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered"
                     src="{{ asset('themes/front/assets/svg/brands/shopify-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered"
                     src="{{ asset('themes/front/assets/svg/brands/vidados-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered"
                     src="{{ asset('themes/front/assets/svg/brands/capsule-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered"
                     src="{{ asset('themes/front/assets/svg/brands/forbes-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered"
                     src="{{ asset('themes/front/assets/svg/brands/business-insider-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered"
                     src="{{ asset('themes/front/assets/svg/brands/hubspot-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered"
                     src="{{ asset('themes/front/assets/svg/brands/layar-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Who works with us -->

    <!-- Articles -->
    <div class="container content-space-2">
        <!-- Heading -->
        <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5">
            <h2>Articles from TimeNet</h2>
        </div>
        <!-- End Heading -->

        <div class="overflow-hidden">
            <div class="row gx-lg-7">

                @foreach($articles as $post)
                    <div class="col-sm-6 col-lg-4 mb-5">
                        <!-- Card -->
                        <a class="card card-flush h-100 aos-init aos-animate" href="{{ route('posts.show', $post->slug) }}" data-aos="fade-up">
                            <img class="card-img"
                                 src="{{ $post->getFirstMediaUrl('cover') }}"
                                 alt="Image Description">
                            <div class="card-body">
                                <span class="card-subtitle text-body">Read the article</span>
                                <h4 class="card-title text-inherit">{{ $post->title }}</h4>
                                <p class="card-text text-body">{{ $post->short_content }}</p>
                            </div>
                        </a>
                        <!-- End Card -->
                    </div>
                @endforeach

            </div>
            <!-- End Row -->
        </div>

        <!-- Card Info -->
        <div class="text-center">
            <div class="card card-info-link card-sm">
                <div class="card-body">
                    Want to read more? <a class="card-link ms-2" href="{{ route('posts.index', ['grid_type' => 'grid', 'slug' => 'articles']) }}">Go here <span
                                class="bi-chevron-right small ms-1"></span></a>
                </div>
            </div>
        </div>
        <!-- End Card Info -->
    </div>
    <!-- End Articles -->


@endsection
