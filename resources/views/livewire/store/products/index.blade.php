<div>

    <!-- Breadcrumb -->
    <div class="bg-light">
        <div class="container py-4">
            <div class="row">
                <div class="col-sm">
                    <h4 class="mb-0">TimeNet Store</h4>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">TimeNet</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Store</li>
                            {{--                            <li class="breadcrumb-item active" aria-current="page">Listing</li>--}}
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

    <div class="container content-space-t-1">

        <div class="row">
            <div class="col">
                <div class="alert alert-soft-dark" role="alert">
                    <h3 class="alert-heading">Welcome to TimeNet Store!</h3>

                    <p>
                        To keep your networking equipment updated, you must upgrade your components approximately every
                        five years. With an equipment upgrade, you can take advantage of modern features that offer the
                        ability to dramatically improve your business operations by taking advantage of new features and
                        capabilities. With all new technologies, your budget may push you towards a particular feature
                        set and network equipment manufacturer so we want to ensure you get the very best solution
                        possible by offsetting your capital expenses by selling your old used networking equipment, and
                        other office IT equipment, to TeleTraders. Let’s get started now so you can save more!
                    </p>
                    <hr/>
                    <p class="mb-0">Whenever you need to, you can always contact us at <a
                                href="mailto:karzan@time-net.net" class="text-dark">karzan@time-net.net</a>.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container content-space-t-1">


        <div class="row">

            <div class="col-lg-3">
                <!-- Navbar -->
                <div class="navbar-expand-lg mb-5">
                    <!-- Navbar Toggle -->
                    <div class="d-grid">
                        <button type="button" class="navbar-toggler btn btn-white mb-3" data-bs-toggle="collapse"
                                data-bs-target="#navbarVerticalNavMenu" aria-label="Toggle navigation"
                                aria-expanded="false" aria-controls="navbarVerticalNavMenu">
                <span class="d-flex justify-content-between align-items-center">
                  <span class="text-dark">Filter</span>

                  <span class="navbar-toggler-default">
                    <i class="bi-list"></i>
                  </span>

                  <span class="navbar-toggler-toggled">
                    <i class="bi-x"></i>
                  </span>
                </span>
                        </button>
                    </div>
                    <!-- End Navbar Toggle -->

                    <!-- Navbar Collapse -->
                    <div id="navbarVerticalNavMenu" class="collapse navbar-collapse">
                        <div class="w-100">
                            <!-- Form -->
                            <form>
                                <div class="border-bottom pb-4 mb-4">
                                    <h5>Categories</h5>

                                    <div class="d-grid gap-2">
                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="menCheckbox"
                                                   checked>
                                            <label class="form-check-label d-flex" for="menCheckbox">Category 1 <span
                                                        class="ms-auto">(45)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->
                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="menCheckbox"
                                                   checked>
                                            <label class="form-check-label d-flex" for="menCheckbox">Category 2 <span
                                                        class="ms-auto">(73)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->
                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="menCheckbox"
                                                   checked>
                                            <label class="form-check-label d-flex" for="menCheckbox">Category 3 <span
                                                        class="ms-auto">(73)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->
                                    </div>
                                </div>

                                <div class="border-bottom pb-4 mb-4">
                                    <h5>Brands</h5>

                                    <div class="d-grid gap-2">
                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                   id="adidasCheckbox">
                                            <label class="form-check-label d-flex" for="adidasCheckbox">Cisco <span
                                                        class="ms-auto">(16)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                   id="newBalanceCheckbox">
                                            <label class="form-check-label d-flex" for="newBalanceCheckbox">Microtik
                                                <span class="ms-auto">(8)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                   id="newBalanceCheckbox">
                                            <label class="form-check-label d-flex" for="newBalanceCheckbox">Huawei <span
                                                        class="ms-auto">(8)</span></label>
                                        </div>
                                        <!-- End Checkboxes -->

                                    </div>

                                    <!-- View More - Collapse -->
                                    {{--                                    <div class="collapse" id="collapseBrand">--}}
                                    {{--                                        <div class="d-grid gap-2">--}}
                                    {{--                                            <!-- Checkboxes -->--}}
                                    {{--                                            <div class="form-check">--}}
                                    {{--                                                <input class="form-check-input" type="checkbox" value="" id="gucciCheckbox">--}}
                                    {{--                                                <label class="form-check-label d-flex" for="gucciCheckbox">Gucci <span class="ms-auto">(5)</span></label>--}}
                                    {{--                                            </div>--}}
                                    {{--                                            <!-- End Checkboxes -->--}}

                                    {{--                                            <!-- Checkboxes -->--}}
                                    {{--                                            <div class="form-check">--}}
                                    {{--                                                <input class="form-check-input" type="checkbox" value="" id="mangoCheckbox">--}}
                                    {{--                                                <label class="form-check-label d-flex" for="mangoCheckbox">Mango <span class="ms-auto">(1)</span></label>--}}
                                    {{--                                            </div>--}}
                                    {{--                                            <!-- End Checkboxes -->--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <!-- End View More - Collapse -->--}}

                                    {{--                                    <!-- Link -->--}}
                                    {{--                                    <a class="link-sm link-collapse" href="#collapseBrand" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseBrand">--}}
                                    {{--                                        <span class="link-collapse-default">View more</span>--}}
                                    {{--                                        <span class="link-collapse-active">View less</span>--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <!-- End Link -->--}}
                                </div>


                                <div class="d-grid">
                                    <button type="button" class="btn btn-white btn-transition">Clear all</button>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                    <!-- End Navbar Collapse -->
                </div>
                <!-- End Navbar -->
            </div>

            <div class="col-lg-9">

                <div class="row align-items-center mb-5">
                    <div class="col-sm mb-3 mb-sm-0">
{{--                        <div class="fw-bold text-dark mb-0">{{ $products->count() }} products</div>--}}
                    </div>

                    <div class="col-sm-auto">
                        <div class="d-sm-flex justify-content-sm-end align-items-center">
                            <!-- Select -->
                            <div class="mb-2 mb-sm-0 me-sm-2">

                                <input type="text" class="form-control form-control-sm" placeholder="Search...">

                            </div>
                            <!-- End Select -->

                            <!-- Select -->
                            <div class="mb-2 mb-sm-0 me-sm-2">
                                <select class="form-select form-select-sm" wire:model="sorting_method">
                                    <option value="newest_top">Newest</option>
                                    <option value="price_high_to_low">Price, high to low</option>
                                    <option value="price_low_to_high">Price, low to high</option>
                                </select>
                            </div>
                            <!-- End Select -->

                            <!-- Nav -->
                            <ul class="nav nav-segment">
                                <li class="nav-item">
                                    <a class="nav-link active" href="../demo-shop/products-grid.html">
                                        <i class="bi-grid-fill"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../demo-shop/products-list.html">
                                        <i class="bi-list"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Nav -->
                        </div>
                    </div>
                </div>

                <div class="row row-cols-sm-2 row-cols-md-3 mb-10">
                    @foreach($products as $product)
                        <div class="col mb-4">
                            <!-- Card -->
                            <div class="card card-bordered shadow-none text-center h-100">
                                <div class="card-pinned">
                                    <img class="card-img-top" src="{{ $product->getFirstMediaUrl('cover') }}"
                                         alt="Image Description">

                                    @if($product->created_at->isToday())
                                        <div class="card-pinned-top-start">
                                            <span class="badge bg-success rounded-pill">New arrival</span>
                                        </div>
                                    @endif

                                    <div class="card-pinned-top-end">
                                        <button type="button"
                                                class="btn btn-xs btn-icon rounded-circle"
                                                style="font-size: 20px;"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Save for later">
                                            <i class="bi-heart"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="mb-2">
                                        <a class="link-sm link-secondary" href="#">{{ $product->category->name }}</a>
                                    </div>

                                    <h4 class="card-title">
                                        <a class="text-dark" href="../demo-shop/product-overview.html">
                                            {{ $product->name }}
                                        </a>
                                    </h4>
                                    <p class="card-text text-dark fw-bold">${{ number_format($product->price, 2) }}</p>
                                </div>

                                <div class="card-footer pt-0">

                                    <button type="button" class="btn btn-outline-dark btn-sm">
                                        <i class="bi bi-cart"></i>
                                        &nbsp;
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>

            </div>

        </div>

    </div>


    <!-- Subscribe -->
    <div class="bg-light">
        <div class="container content-space-2">
            <div class="w-md-75 w-lg-50 text-center mx-md-auto">
                <div class="row justify-content-lg-between">
                    <!-- Heading -->
                    <div class="mb-5">
{{--                        <span class="text-cap">Subscribe</span>--}}
                        <h2>Get the latest from Front</h2>
                    </div>
                    <!-- End Heading -->

                    <form method="get" action="{{ route('soon') }}">
                        <!-- Input Card -->
                        <div class="input-card input-card-pill input-card-sm border mb-3">
                            <div class="input-card-form">
                                <label for="subscribeForm" class="form-label visually-hidden">Enter email</label>
                                <input type="text" class="form-control form-control-lg" id="subscribeForm"
                                       placeholder="Enter email" aria-label="Enter email">
                            </div>
                            <button type="submit" class="btn btn-dark btn-lg">Subscribe</button>
                        </div>
                        <!-- End Input Card -->
                    </form>

                    <p class="small">You can unsubscribe at any time. Read our <a class="text-dark" href="{{ route('soon') }}">privacy
                            policy</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Subscribe -->

    <!-- Clients -->
    <div class="container content-space-2">
        <div class="row">
            <div class="col text-center py-3">
                <img class="avatar avatar-lg avatar-4x3"
                     src="{{ asset('themes/front/assets/svg/brands/google-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col text-center py-3">
                <img class="avatar avatar-lg avatar-4x3"
                     src="{{ asset('themes/front/assets/svg/brands/amazon-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col text-center py-3">
                <img class="avatar avatar-lg avatar-4x3"
                     src="{{ asset('themes/front/assets/svg/brands/new-balance-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col text-center py-3">
                <img class="avatar avatar-lg avatar-4x3"
                     src="{{ asset('themes/front/assets/svg/brands/forbes-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col text-center py-3">
                <img class="avatar avatar-lg avatar-4x3"
                     src="{{ asset('themes/front/assets/svg/brands/layar-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col text-center py-3">
                <img class="avatar avatar-lg avatar-4x3"
                     src="{{ asset('themes/front/assets/svg/brands/tnf-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Clients -->

</div>
