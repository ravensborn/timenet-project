@extends('layouts.master')


@section('content')

    <!-- Breadcrumb -->
    <div class="bg-light">
        <div class="container py-4">
            <div class="row">
                <div class="col-sm">
                    <h4 class="mb-0">{{   ucfirst(request()->segment(3)) }}</h4>
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
                                {{  ucfirst(request()->segment(3)) }}
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


    <!-- Card Grid -->
    <div class="container content-space-2 content-space-lg-1">
        <!-- Heading -->
        <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5">
            <h2>{{ ucfirst($post_type_name) }}</h2>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur esse expedita modi nam officia
                porro
                soluta, vel! Aperiam, architecto error facere molestias non provident quae quos.
            </p>

            <hr>
        </div>

        @if($grid_type == 'list')

            <div class="d-grid gap-2">

                @foreach($posts as $post)


                    <div class="card card-flush">
                        <div class="row align-items-md-center">
                            <div class="col-md-3">
                                <img class="card-img rounded-2" src="{{ $post->getFirstMediaUrl('cover') }}"
                                     alt="Image Cover">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <span class="card-subtitle">{{ $post->category->name }}</span>
                                    <h4 class="card-title"><a class="text-dark"
                                                              href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h4>
                                    <p class="card-text small">{{ $post->short_content }}</p>
                                    <a class="card-link small" href="{{ route('posts.show', $post->slug) }}">Read more
                                        <i class="bi-chevron-right small ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                @endforeach
                {{ $posts->links() }}


            </div>

        @endif

        @if($grid_type == 'grid')

            <div class="overflow-hidden">
                <div class="row gx-lg-7">
                    @foreach($posts as $post)

                        <div class="col-sm-6 col-lg-4 mb-5">
                            <!-- Card -->
                            <a class="card card-flush h-100" href="{{ route('posts.show', $post->slug) }}"
                               data-aos="fade-up">
                                <img class="card-img" src="{{ $post->getFirstMediaUrl('cover') }}"
                                     alt="Image Description">
                                <div class="card-body pt-3">
                                    <span class="text-body">
                                        {{ $post->created_at->format('d-m-Y') }}
                                        by
                                        {{ $post->author->name }}
                                    </span>
                                    <h4 class="card-title text-inherit mt-2">{{ $post->title }}</h4>
                                    <p class="card-text text-body">{{ $post->short_content }}</p>
                                </div>
                            </a>
                            <!-- End Card -->
                        </div>
                        <!-- End Col -->

                    @endforeach
                    {{ $posts->links() }}
                </div>

            </div>

        @endif


    </div>
    <!-- End Card Grid -->

@endsection
