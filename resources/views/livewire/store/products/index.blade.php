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
                            <li class="breadcrumb-item">
                                <a href="{{ route('store.index') }}">Store</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Products
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

    <div class="container content-space-t-1">

        <div class="row">
            <div class="col">
                <div class="alert alert-soft-dark" role="alert">
                    <h3 class="alert-heading">Welcome to TimeNet Store!</h3>

                    <p>
                        Welcome to TimeNet, your one-stop-shop for all your networking needs. We are a team of
                        networking experts dedicated to providing you with the best possible service and support. Our
                        mission is to help you stay connected and secure, no matter what your networking needs may be.
                        We offer a wide range of network devices, tools and services, including routers, switches,
                        firewalls, VPNs, and more. Our products are designed to meet the highest standards of quality
                        and reliability, and we are committed to providing you with the best possible value for your
                        money. Whether you’re a small business owner, a home user, or an IT professional, we’ve got you
                        covered. So why wait? Start browsing our selection today and see what TimeNet can do for you.
                    </p>
                    <hr/>
                    <p class="mb-0">Whenever you need to, you can always contact us at <a
                            href="mailto:karzan@time-net.net" class="text-dark">info@time-net.net</a>.</p>
                </div>
            </div>
        </div>

        @if(auth()->check())

            <div class="row">
                <div class="col text-center">

                    <div class="alert alert-soft-dark" role="alert">


                        @if($cartItems->count())

                            <div>
                                <i class="bi-cart fs-3 fw-bold"></i>
                                <div>
                                   <span class="fw-bold">
                                       Items in cart:
                                    {{ $cartItems->count() }}
                                   </span>
                                    -
                                    <span class="fw-bold">(${{ number_format($cartTotal) }})</span>
                                </div>
                                <div>
                                    <a class="btn btn-outline-dark btn-transition btn-sm rounded-pill mt-3"
                                       href="{{ route('store.cartItems.index') }}">
                                        View your shopping cart
                                    </a>
                                </div>
                            </div>

                        @else

                            <div>
                                <i class="bi-cart"></i>
                                Your shopping cart is empty.
                            </div>

                        @endif


                    </div>

                </div>
            </div>

        @endif
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
                                            <input class="form-check-input" type="checkbox" value="all"
                                                   id="categoryCheckbox-0"
                                                   wire:model="selectedCategories"
                                                   wire:change="_updateSelectedCategories">
                                            <label class="form-check-label d-flex" for="categoryCheckbox-0">
                                                All
                                            </label>
                                        </div>
                                        <!-- End Checkboxes -->
                                        @foreach($categories as $category)

                                            <!-- Checkboxes -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                       value="{{ $category->id }}"
                                                       id="categoryCheckbox-{{ $category->id }}"
                                                       wire:model="selectedCategories"
                                                       wire:change="_updateSelectedCategories">
                                                <label class="form-check-label d-flex"
                                                       for="categoryCheckbox-{{ $category->id }}">
                                                    {{ $category->name }}
                                                    <span class="ms-auto">({{ $category->products->count() }})</span>
                                                </label>
                                            </div>
                                            <!-- End Checkboxes -->

                                        @endforeach
                                    </div>
                                </div>

                                <div class="border-bottom pb-4 mb-4">
                                    <h5>Brands</h5>

                                    <div class="d-grid gap-2">

                                        <!-- Checkboxes -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="all"
                                                   id="BrandCheckbox-0"
                                                   wire:model="selectedBrands"
                                                   wire:change="_updateSelectedBrands">
                                            <label class="form-check-label d-flex" for="BrandCheckbox-0">
                                                All
                                            </label>
                                        </div>
                                        <!-- End Checkboxes -->
                                        @foreach($brands as $brand)

                                            <!-- Checkboxes -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                       value="{{ $brand->id }}"
                                                       id="brandCheckbox-{{ $brand->id }}"
                                                       wire:model="selectedBrands"
                                                       wire:change="_updateSelectedBrands">
                                                <label class="form-check-label d-flex"
                                                       for="brandCheckbox-{{ $brand->id }}">
                                                    {{ $brand->name }}
                                                    <span class="ms-auto">({{ $brand->products->count() }})</span>
                                                </label>
                                            </div>
                                            <!-- End Checkboxes -->

                                        @endforeach
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
                                    <button type="button" class="btn btn-white" wire:click="resetFilters">Clear all
                                    </button>
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

                                <input type="text" wire:model="search"
                                       wire:keydown.a="_updateSearch($event.target.value)"
                                       class="form-control form-control-sm"
                                       placeholder="Search...">

                            </div>
                            <!-- End Select -->

                            <!-- Select -->
                            <div class="mb-2 mb-sm-0 me-sm-2">
                                <select class="form-select form-select-sm" wire:model="sorting_method"
                                        wire:change="_updateSortingMethod">
                                    <option value="newest_top">Newest</option>
                                    <option value="price_high_to_low">Price, high to low</option>
                                    <option value="price_low_to_high">Price, low to high</option>
                                </select>
                            </div>
                            <!-- End Select -->

                            <!-- Nav -->
                            <ul class="nav nav-segment">
                                <li class="nav-item">
                                    <a @class([ 'nav-link', 'active' => ($displayProductsType == 'grid') ]) wire:click="updateProductDisplayType('grid')"
                                       style="cursor: pointer;">
                                        <i class="bi-grid-fill"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a @class([ 'nav-link', 'active' => ($displayProductsType == 'list') ]) wire:click="updateProductDisplayType('list')"
                                       style="cursor: pointer;">
                                        <i class="bi-list"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Nav -->
                        </div>
                    </div>
                </div>


                <div class="d-flex justify-content-center">
                    <div wire:loading
                         wire:target="_updateSelectedCategories, _updateSearch, _updateSelectedBrands, _updateSortingMethod">
                        <div class="spinner-border m-5" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>


                <div wire:loading.remove
                     wire:target="_updateSelectedCategories, _updateSelectedBrands, _updateSearch, _updateSortingMethod">
                    <div class="row mb-10">
                        @forelse($products as $product)
                            @if($displayProductsType == 'grid')
                                <div class="col-sm-2 col-md-3 col-lg-4 mb-4">

                                    <!-- Card -->
                                    <div class="card card-bordered shadow-none text-center h-100">
                                        <div class="card-pinned">

                                            <img style="height: 200px; object-fit: cover;" class="card-img-top"
                                                 src="{{ $product->getCover() }}"
                                                 alt="Image Description">

                                            @if($product->created_at->isToday())
                                                <div class="card-pinned-top-start">
                                                    <span class="badge bg-success rounded-pill">New arrival</span>
                                                </div>
                                            @endif

                                            <div class="card-pinned-top-end">

                                                @if($user && $user->wishlist()->where('product_id', $product->id)->first())
                                                    <button type="button"
                                                            class="btn btn-icon rounded-circle"
                                                            style="font-size: 20px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Save for later"
                                                            wire:click="toWishlist({{ $product->id }}, 'remove')">
                                                        <i class="bi-heart-fill text-danger"></i>
                                                    </button>
                                                @else
                                                    <button type="button"
                                                            class="btn btn-icon rounded-circle"
                                                            style="font-size: 20px;"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Save for later"
                                                            wire:click="toWishlist({{ $product->id }}, 'add')">
                                                        <i class="bi-heart"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="mb-2">
                                                <a class="link-sm link-secondary"
                                                   href="{{ route('store.products.show', $product->slug) }}">{{ $product->category->name }}</a>
                                            </div>

                                            <h4 class="card-title">
                                                <a class="text-dark"
                                                   href="{{ route('store.products.show', $product->slug) }}">
                                                    {{ $product->name }}
                                                </a>
                                            </h4>
                                            @if($product->previous_price)
                                                <p class="card-text">
                                                <span class="text-decoration-line-through text-muted me-1">
                                                    ${{ number_format($product->previous_price, 2) }}
                                                </span>
                                                <span class="fw-bold text-dark">
                                                    ${{ number_format($product->price, 2) }}
                                                </span>
                                                </p>
                                            @else
                                                <p class="card-text text-dark fw-bold">

                                                    ${{ number_format($product->price, 2) }}
                                                </p>
                                            @endif
                                        </div>

                                        <div class="card-footer pt-0">

                                            @if(auth()->check())
                                                <button type="button" class="btn btn-outline-dark btn-sm"
                                                        wire:key="{{ $product->id }}"
                                                        wire:click="addToCart({{ $product->id }},1)">
                                                    <i class="bi bi-cart"></i>
                                                    &nbsp;
                                                    Add to cart
                                                </button>
                                            @else
                                                <div>
                                                    You must be <a href="{{ route('login') }}">logged in</a> to add item
                                                    to your
                                                    cart.
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                </div>
                            @else
                                <div class="col-12 mb-2">
                                    <div class="card card-flush">
                                        <div class="row align-items-md-center">
                                            <div class="col-md-3">
                                                <img class="card-img rounded-2"
                                                     src="{{ $product->getFirstMediaUrl('cover') }}"
                                                     alt="Image Cover">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="card-body">


                                                    <div class="row">
                                                        <div class="col-8">
                                                            <span
                                                                class="card-subtitle">{{ $product->category->name }}</span>
                                                            @if($product->created_at->isToday())
                                                                <div class="card-pinned-top-start">
                                                                    <span class="badge bg-success rounded-pill">New arrival</span>
                                                                </div>
                                                            @endif
                                                            <h4 class="card-title">
                                                                <a class="text-dark">
                                                                    {{ $product->name }}
                                                                </a>
                                                            </h4>

                                                            <div>
                                                                @if(auth()->check())
                                                                    <button type="button"
                                                                            class="btn btn-outline-dark btn-sm"
                                                                            wire:key="{{ $product->id }}"
                                                                            wire:click="addToCart({{ $product->id }},1)">
                                                                        <i class="bi bi-cart"></i>
                                                                        &nbsp;
                                                                        Add to cart
                                                                    </button>
                                                                @else
                                                                    <div>
                                                                        You must be <a href="{{ route('login') }}">logged
                                                                            in</a> to add item to your
                                                                        cart.
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div>
                                                                <p class="card-text text-dark fw-bold">
                                                                    ${{ number_format($product->price, 2) }}</p>
                                                            </div>
                                                            @if($user && $user->wishlist()->where('product_id', $product->id)->first())
                                                                <a class="link-sm link-secondary small text-danger"
                                                                   style="cursor:pointer;"
                                                                   wire:click="toWishlist({{ $product->id }}, 'remove')">
                                                                    <i class="bi-heart-fill text-danger me-1"></i>
                                                                    Save for later
                                                                </a>
                                                            @else
                                                                <a class="link-sm link-secondary small"
                                                                   style="cursor:pointer;"
                                                                   wire:click="toWishlist({{ $product->id }}, 'add')">
                                                                    <i class="bi-heart me-1"></i> Save for later
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="row">
                                <div class="col text-center">
                                    <div class="alert alert-soft-dark">
                                        No products found with your current settings.
                                    </div>
                                </div>
                            </div>
                        @endforelse

                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
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

                    <p class="small">You can unsubscribe at any time. Read our <a class="text-dark"
                                                                                  href="{{ route('soon') }}">privacy
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
