@extends('layouts.master')


@section('content')

    <div class="content-space-b-1 homepage-main-banner" style="background-image: {{ $banner['backgroundOverlay'] }} url('{{ $banner['image'] }}'); background-position: {{ $banner['backgroundPosition'] }};">

        <div
            class="container d-md-flex align-items-md-center vh-md-70 content-space-t-4 content-space-b-3 content-space-md-0">
            <div class="mt-5">
                <img width="350px" src="{{ asset('images/logo.png') }}"
                     alt="Logo Dark">
                <p class="lead text-white">A network expertise company works in the fields of <br> providing internet
                    access.</p>
            </div>
        </div>
    </div>


    <!-- Services -->
    <div class="container content-space-1">
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
            @foreach($features as $post)
                <div class="col-6 col-lg-4 mb-4 mb-lg-0 mt-3">
                    <!-- Card -->
                    <div class=" card-sm h-100">
                        <div class="p-2 text-center">
                            <img class="card-img"
                                 style="width: 64px;"
                                 src="{{ $post->getFirstMediaUrl('cover') }}"
                                 alt="Image Description">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-center">
                                {{ $post->title }}
                            </h4>
                        </div>
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
            @foreach($partners as $partner)
                <div class="col-4 col-sm-3 col-md-2 py-3">
                    <img class="avatar avatar-lg avatar-4x3 avatar-centered"
                         src="{{ $partner->getFirstMediaUrl('image') }}" alt="Logo">
                </div>
            @endforeach
        </div>
        <!-- End Row -->
    </div>
    <!-- End Who works with us -->

    <div class="container">
        <div class="bg-img-start rounded-2 p-5 mb-5"
             style="background-image: url({{ asset('images/wallpapers/7.jpg') }});">
            <div class="row align-items-md-center">
                <div class="col-sm mb-3 mb-md-0">
                    <h1 class="h4 mb-0">Access the latest networking products at unbeatable prices.</h1>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <a class="btn btn-dark btn-sm btn-transition rounded-pill" href="{{ route('store.index') }}">Shop
                        now</a>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>

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
                        <a class="card card-flush h-100 aos-init aos-animate"
                           href="{{ route('posts.show', $post->slug) }}" data-aos="fade-up">
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
                    Want to read more? <a class="card-link ms-2"
                                          href="{{ route('posts.index', ['grid_type' => 'grid', 'slug' => 'articles']) }}">Go
                        here <span
                            class="bi-chevron-right small ms-1"></span></a>
                </div>
            </div>
        </div>
        <!-- End Card Info -->
    </div>
    <!-- End Articles -->

    <div class="container content-space-b-2">
        <div class="bg-img-start rounded-2 p-5 mb-5"
             style="background-image: url({{ asset('images/wallpapers/10.jpg') }});">
            <div class="row align-items-md-center">
                <div class="col-sm mb-3 mb-md-0">
                    <h1 class="h4 mb-0">Cutting-edge networking technology at competitive prices.</h1>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <a class="btn btn-dark btn-sm btn-transition rounded-pill" href="{{ route('store.index') }}">Shop
                        now</a>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>
@endsection
