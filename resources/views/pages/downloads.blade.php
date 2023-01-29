@extends('layouts.master')


@section('content')



    <div class="bg-img-start"
         style="background-image: url({{ asset('themes/front/assets/svg/components/card-11.svg') }});">
        <div class="container content-space-t-3 content-space-t-lg-5 content-space-b-2">
            <div class="w-md-75 w-lg-50 text-center mx-md-auto">
                <h1>Download Center</h1>
                <p>Software, Tools, Documentations, Manuals and Drivers.</p>
            </div>
        </div>
    </div>

    <!-- Card Grid -->
    <div class="container content-space-1 content-space-lg-1">

        <div class="d-grid gap-3">
            <!-- Search -->
            <div class="mb-4">
                <div class="mb-3">
                    <h4>24 Results <span class="text-body small">for "Network Monitoring tools"</span></h4>
                </div>

                <form action="{{ route('soon') }}" method="get">
                    <!-- Input Card -->
                    <div class="input-card border">
                        <div class="input-card-form">
                            <label for="searchAppsForm" class="form-label visually-hidden">Search for
                                files</label>
                            <div class="input-group input-group-merge">
          <span class="input-group-prepend input-group-text">
            <i class="bi-search"></i>
          </span>
                                <input type="text" class="form-control" id="searchAppsForm"
                                       placeholder="Search for files" aria-label="Search for apps">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi-arrow-right"></i>
                        </button>
                    </div>
                    <!-- End Input Card -->
                </form>
            </div>
            <!-- End Search -->
        </div>

        <div class="row mb-5">
            <div class="col-4 mb-3 mb-sm-4">
                <!-- Card -->
                <a class="card card-sm card-bordered card-transition h-100" href="{{ route('soon') }}">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title text-inherit">File.zip</h5>
                                <p class="card-text text-body small">Tool used for network monitoring.</p>
                                <p class="card-text text-body small">12MB</p>
                            </div>
                            <!-- End Col -->

                            <div class="col-auto">
              <span class="text-muted">
                <i class="bi-chevron-right small"></i>
              </span>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                </a>
                <!-- End Card -->
            </div>
            <div class="col-4 mb-3 mb-sm-4">
                <!-- Card -->
                <a class="card card-sm card-bordered card-transition h-100" href="{{ route('soon') }}">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title text-inherit">File.zip</h5>
                                <p class="card-text text-body small">Tool used for network monitoring.</p>
                                <p class="card-text text-body small">12MB</p>
                            </div>
                            <!-- End Col -->

                            <div class="col-auto">
              <span class="text-muted">
                <i class="bi-chevron-right small"></i>
              </span>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                </a>
                <!-- End Card -->
            </div>
            <div class="col-4 mb-3 mb-sm-4">
                <!-- Card -->
                <a class="card card-sm card-bordered card-transition h-100" href="{{ route('soon') }}">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title text-inherit">File.zip</h5>
                                <p class="card-text text-body small">Tool used for network monitoring.</p>
                                <p class="card-text text-body small">12MB</p>
                            </div>
                            <!-- End Col -->

                            <div class="col-auto">
              <span class="text-muted">
                <i class="bi-chevron-right small"></i>
              </span>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Row -->
                    </div>
                </a>
                <!-- End Card -->
            </div>
            <!-- End Col -->

        </div>
        <!-- End Row -->

    </div>
    <!-- End Card Grid -->




@endsection
