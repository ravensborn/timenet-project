@extends('layouts.master', ['title' => $post->title])


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
                            @if(in_array($post->category->id, [\App\Models\Category::CATEGORY_ARTICLE]))
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
                            @endif
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

                    @if($post->is_commentable)

                        @if(auth()->check())

                            <div class="border-top pt-5">
                                @if($comments->count() == 1)
                                    <h5>1 comment</h5>
                                @elseif($comments->count() > 1)
                                    <h5>{{ $comments->count() }} comments</h5>
                                @else
                                    <h5>Be first to share your thoughts.</h5>
                                @endif
                            </div>

                            @if($comments->count())
                                <ul class="list-comment">

                                    @foreach($comments as $comment)
                                        <li class="list-comment-item">
                                            <!-- Media -->
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="flex-shrink-0">
                                                    <img class="avatar avatar-circle"
                                                         src="{{ asset('images/user.png') }}"
                                                         alt="Image Description">
                                                </div>

                                                <div class="flex-grow-1 ms-3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <h6>{{ $comment->user->name }}</h6>
                                                        <span
                                                            class="d-block small text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Media -->

                                            <p>
                                                {{ $comment->content }}
                                            </p>
                                        </li>
                                    @endforeach

                                </ul>
                            @endif

                            <hr id="comments_form">


                            @if(session()->has('comment_created'))
                                <div class="alert alert-soft-success">
                                    Your comment has been sent for review, once approved it will appear publicly.
                                </div>
                            @endif


                            <form method="POST" action="{{ route('posts.comments.store', ['slug' => $post->slug]) }}">

                                @csrf

                                <div class="mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" id="name" value="{{ auth()->user()->name }}" class="form-control"
                                           disabled>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" value="{{ auth()->user()->email }}"
                                           class="form-control"
                                           disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="content">Comment</label>
                                    <textarea id="content" class="form-control" name="content"
                                              placeholder="Write your thoughts." rows="4"
                                              maxlength="2500"></textarea>
                                    @error('content')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-dark btn-sm">
                                        Post Comment
                                    </button>
                                </div>
                            </form>

                        @else

                            <hr class="pb-5">


                            <h5>You need to <a href="{{ route('login') }}">login</a> or <a
                                    href="{{ route('register') }}">register</a> to comment on this post.</h5>

                        @endif
                    @endif

                </div>
            </div>
            <div class="col-12 order-0 col-md-3 order-md-1">
                <div class="mb-7">
                    <div class="mb-3">
                        <h3>Newsletter</h3>
                    </div>

                    @livewire('global-components.subscribe-box')

                    <p class="form-text">Get special offers on the latest developments from TimeNet.</p>
                </div>

                <div class="mb-7">
                    <div class="mb-3">
                        <h3>Categories</h3>
                    </div>

                    @foreach($categories as $category)
                        @if($category->model == \App\Models\Post::class)
                            <a class="btn btn-soft-secondary btn-xs mb-1"
                               href="{{ route('posts.index', ['grid_type' => 'grid', 'slug' => $category->slug]) }}">
                                {{ $category->name }}
                            </a>
                        @else
                            <a class="btn btn-soft-secondary btn-xs mb-1"
                               href="{{ route('store.products.index')  }}">
                                {{ $category->name }}
                            </a>
                        @endif

                    @endforeach

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
                                        <p>
                                            @if(strlen($post->short_content) > 40)
                                                {!!  substr($post->short_content, 0, 40) . '...'  !!}
                                            @else
                                                {!! $post->short_content !!}
                                            @endif

                                        </p>
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
