@extends('layouts.master')


@section('content')

    <!-- Breadcrumb -->
    <div class="bg-light">
        <div class="container py-4">
            <div class="row">
                <div class="col-sm">
                    @if(strlen($post->title) > 15)
                        <h4 class="mb-0">{{ substr($post->title, 0, 15) . '...' }}</h4>
                    @else
                        <h4 class="mb-0">{{$post->title }}</h4>
                    @endif
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">{{ config('env.APP_NAME') }}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="">{{ $post->category->name }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                @if(strlen($post->title) > 15)
                                    {{ substr($post->title, 0, 15) . '...' }}
                                @else
                                    {{$post->title }}
                                @endif
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

    <!-- Article Description -->
    <div class="container content-space-2 content-space-lg-1">

        <div class="row">
            <div class="col-12 order-1 col-md-9 order-md-0">
                <div class="pe-3">
                    <div class="mb-5">
                        <h1 class="h2">{{ $post->title }}</h1>
                        {{ $post->category->name }}
                    </div>

                    <div class="row align-items-sm-center mb-5">
                        <div class="col-sm-7 mb-4 mb-sm-0">
                            <!-- Media -->
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-circle" src="{{ asset('images/user.png') }}"
                                         alt="Image Description">
                                </div>

                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0">
                                        <a class="text-dark"
                                           href="{{ route('posts.show', $post->slug) }}">{{ ucfirst($post->author->name) }}</a>
                                    </h5>
                                    <span class="d-block small">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <!-- End Media -->
                        </div>
                        <!-- End Col -->

                        <div class="col-sm-5">
                            <div class="d-flex justify-content-sm-end align-items-center">
                                <span class="text-cap mb-0 me-2">Share:</span>

                                <div class="d-flex gap-2">
                                    <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                                        <i class="bi-facebook"></i>
                                    </a>
                                    <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                                        <i class="bi-twitter"></i>
                                    </a>
                                    <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                                        <i class="bi-instagram"></i>
                                    </a>
                                    <a class="btn btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
                                        <i class="bi-telegram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>

                    <div class="pb-5">
                        {!! $post->content !!}
                    </div>

                    <div class="border-top pt-5">
                        <h3>2 comments</h3>
                    </div>
                    <ul class="list-comment">

                        <li class="list-comment-item">
                            <!-- Media -->
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-circle" src="{{ asset('images/user.png') }}"
                                         alt="Image Description">
                                </div>

                                <div class="flex-grow-1 ms-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6>Hasty Yassin</h6>
                                        <span class="d-block small text-muted">2 days ago</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Media -->

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum expedita facere ipsam
                                officiis tenetur! At debitis dignissimos impedit ipsa, minima officia porro praesentium
                                provident vero voluptatem! Accusantium fugit inventore unde!
                            </p>
                        </li>
                        <li class="list-comment-item">
                            <!-- Media -->
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0">
                                    <img class="avatar avatar-circle" src="{{ asset('images/user.png') }}"
                                         alt="Image Description">
                                </div>

                                <div class="flex-grow-1 ms-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6>Hanna Wolfe</h6>
                                        <span class="d-block small text-muted">4 days ago</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Media -->

                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum expedita facere ipsam
                                officiis tenetur! At debitis dignissimos impedit ipsa.
                            </p>
                        </li>

                    </ul>

                </div>
            </div>
            <div class="col-12 order-0 col-md-3 order-md-1">
                <div class="mb-7">
                    <div class="mb-3">
                        <h3>Newsletter</h3>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('soon') }}" method="get">
                        <div class="mb-2">
                            <input type="text" class="form-control" placeholder="Enter email" aria-label="Enter email">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Subscribe</button>
                        </div>
                    </form>
                    <!-- End Form -->

                    <p class="form-text">Get special offers on the latest developments from Front.</p>
                </div>

                <div class="mb-7">
                    <div class="mb-3">
                        <h3>Tags</h3>
                    </div>

                    <a class="btn btn-soft-secondary btn-xs mb-1" href="{{ route('soon') }}">Business</a>
                    <a class="btn btn-soft-secondary btn-xs mb-1" href="{{ route('soon') }}">Adventure</a>
                    <a class="btn btn-soft-secondary btn-xs mb-1" href="{{ route('soon') }}">Community</a>
                    <a class="btn btn-soft-secondary btn-xs mb-1" href="{{ route('soon') }}">Announcements</a>
                    <a class="btn btn-soft-secondary btn-xs mb-1" href="{{ route('soon') }}">Tutorials</a>
                    <a class="btn btn-soft-secondary btn-xs mb-1" href="{{ route('soon') }}">Resources</a>
                    <a class="btn btn-soft-secondary btn-xs mb-1" href="{{ route('soon') }}">Classic</a>
                    <a class="btn btn-soft-secondary btn-xs mb-1" href="{{ route('soon') }}">Photography</a>
                    <a class="btn btn-soft-secondary btn-xs mb-1" href="{{ route('soon') }}">Interview</a>
                </div>
            </div>
        </div>
    </div>


    </div>
    <!-- End Article Description -->

    @if($related_posts)

        <div class="container">
            <div class="border-top pt-5">
                <!-- Heading -->
                <div class="mb-3 mb-sm-5">
                    <h3>Related articles</h3>
                </div>
                <!-- End Heading -->

                <div class="row">
                    @foreach($related_posts as $post)

                        <div class="col-md-6">
                            <!-- Card -->
                            <div class="border-bottom h-100 py-5">
                                <div class="row">
                                    <div class="col-6">
                                        <span class="text-cap">{{ ucfirst($post->category->name) }}</span>
                                        <h4 class="mb-0">
                                            <a class="text-dark" href="{{ route('posts.show', $post->slug) }}">
                                                @if(strlen($post->title) > 35)
                                                    {{ substr($post->title, 0, 35) . '...' }}
                                                @else
                                                    {{ $post->title }}
                                                @endif
                                            </a>
                                        </h4>
                                    </div>
                                    <!-- End Col -->

                                    <div class="col-5">
                                        <img class="img-fluid rounded" src="{{ $post->getFirstMediaUrl('cover') }}"
                                             alt="Post Cover">
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Col -->
                    @endforeach

                </div>
                <!-- End Row -->
            </div>
        </div>

    @endif

    <div class=" content-space-b-3">

    </div>

@endsection
