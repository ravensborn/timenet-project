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
                            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
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

    @if(auth()->check())
        @if($cartItems->count() > 0)
            <div class="container content-space-1 content-space-lg-2">
                <div class="row">
                    <div class="col-lg-8 mb-7 mb-lg-0">
                        <!-- Heading -->
                        <div class="d-flex justify-content-between align-items-end border-bottom pb-3 mb-7">
                            <h1 class="h3 mb-0">Shopping cart</h1>
                            <span>{{ $cartItems->count() }} items</span>
                        </div>
                        <!-- End Heading -->

                        <!-- Form -->
                        <form>
                            <!-- List Group -->
                            <ul class="list-group list-group-flush list-group-no-gutters mb-5">
                                @foreach($cartItems as $item)
                                    <!-- Item -->
                                    <li class="list-group-item">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <img class="avatar avatar-xl avatar-4x3"
                                                     src="{{ $item->product->getFirstMediaUrl('cover') }}"
                                                     alt="Image Description">
                                            </div>

                                            <div class="flex-grow-1 ms-3">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 mb-3 mb-sm-0">
                                                        <h5>
                                                            <a class="text-dark" href="#">{{ $item->product->name }}</a>
                                                        </h5>
                                                        @if($item->checkStockAvailability())
                                                            <h6 class="text-success">Available in stock</h6>
                                                        @else
                                                            <h6 class="text-danger">Item out of stock</h6>
                                                        @endif

                                                        <div class="d-block d-sm-none">
                                                            <h5 class="mb-1">{{ $item->quantity }} X
                                                                ${{ number_format($item->product->price, 2) }}</h5>
                                                        </div>
                                                    </div>
                                                    <!-- End Col -->

                                                    <div class="col-6 col-md-3">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <button type="button"
                                                                        class="btn fs-3 m-0 p-0 border-none"
                                                                        wire:click="updateQuantity({{ $item->product->id }}, 'increment')">
                                                                    <i class="bi-plus-square"></i>
                                                                </button>
                                                                {{ $item->quantity }}
                                                                <button type="button"
                                                                        class="btn fs-3 m-0 p-0 border-none"
                                                                        wire:click="updateQuantity({{ $item->product->id }}, 'decrement')">
                                                                    <i class="bi-dash-square"></i>
                                                                </button>

                                                                <div>
                                                                    <a class="link-sm link-secondary small"
                                                                       wire:click="updateQuantity({{ $item->product->id }}, 'delete')"
                                                                       style="cursor:pointer;">
                                                                        <i class="bi-trash me-1"></i> Remove
                                                                    </a>
                                                                </div>

                                                                <div>
                                                                    @if($user && $user->wishlist()->where('product_id', $item->product_id)->first())
                                                                        <a class="link-sm link-secondary small text-danger"
                                                                           style="cursor:pointer;"
                                                                           wire:click="toWishlist({{ $item->product_id }}, 'remove')">
                                                                            <i class="bi-heart-fill text-danger me-1"></i>
                                                                            Save for later
                                                                        </a>
                                                                    @else
                                                                        <a class="link-sm link-secondary small"
                                                                           style="cursor:pointer;"
                                                                           wire:click="toWishlist({{ $item->product_id }}, 'add')">
                                                                            <i class="bi-heart me-1"></i> Save for later
                                                                        </a>
                                                                    @endif
                                                                </div>

                                                            </div>


                                                            <!-- End Col -->
                                                        </div>
                                                        <!-- End Row -->
                                                    </div>
                                                    <!-- End Col -->

                                                    <div class="col-6 col-md-3 d-none d-sm-inline-block text-right">
                                                        <span class="h5 d-block mb-1 text-muted">{{ $item->quantity }} X ${{ number_format($item->product->price, 2) }}</span>
                                                        <span
                                                            class="h5 d-block mb-1">${{ number_format($item->quantity * $item->product->price, 2) }}</span>
                                                    </div>
                                                    <!-- End Col -->
                                                </div>
                                                <!-- End Row -->
                                            </div>
                                        </div>
                                    </li>
                                    <!-- End Item -->
                                @endforeach


                            </ul>
                            <!-- End List Group -->

                            <div class="d-sm-flex justify-content-end">
                                <a class="link text-dark" href="{{ route('store.products.index') }}">
                                    <i class="bi-chevron-left small ms-1"></i> Continue shopping
                                </a>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                    <!-- End Col -->

                    <div class="col-lg-4">
                        <div class="ps-lg-4">
                            <!-- Card -->
                            <div class="card card-sm shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="border-bottom pb-4 mb-4">
                                        <h3 class="card-header-title">Order summary</h3>
                                    </div>

                                    <form>
                                        <div class="border-bottom pb-4 mb-3">
                                            <input type="text"
                                                   class="form-control @if($promoCodeStatus == 'invalid') is-invalid @endif  @if($promoCodeStatus == 'invalid') is-valid @endif"
                                                   name="name"
                                                   wire:model="promoCode"
                                                   placeholder="Enter promo code" aria-label="Enter promo code">
                                            @if($promoCodeStatus == 'invalid')
                                                <small class="text-danger">Invalid code.</small>
                                            @endif
                                            @if($promoCodeStatus == 'valid')
                                                <small class="text-success">Promo Code Applied!</small>
                                            @endif
                                        </div>

                                        <div class="border-bottom pb-4 mb-4">
                                            <div class="d-grid gap-3">
                                                <dl class="row">
                                                    <dt class="col-sm-6">Item subtotal ({{ $cartItems->count() }})</dt>
                                                    <dd class="col-sm-6 text-sm-end mb-0">
                                                        ${{ number_format($cartTotal, 2) }}</dd>
                                                </dl>
                                                <!-- End Row -->

                                                @if($promoCodeData)
                                                    <dl class="row">
                                                        <dt class="col-sm-6">Promo Code
                                                        </dt>
                                                        <dd class="col-sm-6 text-sm-end mb-0 text-danger">
                                                            @if($promoCodeData->discount_type == \App\Models\PromoCode::DISCOUNT_TYPE_FIXED)
                                                               - ${{ number_format($promoCodeData->discount_amount, 2) }}
                                                            @endif
                                                            @if($promoCodeData->discount_type == \App\Models\PromoCode::DISCOUNT_TYPE_PERCENTAGE)
                                                                    - %{{ $promoCodeData->discount_amount }} (${{ ($promoCodeData->discount_amount / 100) * $cartTotal }})
                                                            @endif
                                                        </dd>
                                                    </dl>
                                                    <!-- End Row -->
                                                @endif

                                                <dl class="row">
                                                    <dt class="col-sm-6">Delivery</dt>
                                                    <dd class="col-sm-6 text-sm-end mb-0">---</dd>
                                                </dl>
                                                <!-- End Row -->
                                            </div>
                                        </div>

                                        <div class="d-grid gap-3 mb-4">
                                            <!-- End Row -->

                                            <dl class="row">
                                                <dt class="col-sm-6">Total</dt>
                                                <dd class="col-sm-6 text-sm-end mb-0">
                                                    ${{  number_format($totalPay, 2) }}</dd>
                                            </dl>
                                            <!-- End Row -->
                                        </div>

                                        <div class="d-grid">
                                            <a class="btn btn-dark btn-lg" wire:click.prevent="checkout()">Checkout</a>
                                        </div>
                                    </form>
                                </div>
                                <!-- End Card -->
                            </div>

                            <!-- Media -->
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="svg-icon svg-icon-sm text-primary">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M22.1671 18.1421C22.4827 18.4577 23.0222 18.2331 23.0206 17.7868L23.0039 13.1053V5.52632C23.0039 4.13107 21.8729 3 20.4776 3H8.68815C7.2929 3 6.16183 4.13107 6.16183 5.52632V9H13C14.6568 9 16 10.3431 16 12V15.6316H19.6565L22.1671 18.1421Z"
                                                  fill="#035A4B"></path>
                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M1.98508 18V13C1.98508 11.8954 2.88051 11 3.98508 11H11.9851C13.0896 11 13.9851 11.8954 13.9851 13V18C13.9851 19.1046 13.0896 20 11.9851 20H4.10081L2.85695 21.1905C2.53895 21.4949 2.01123 21.2695 2.01123 20.8293V18.3243C1.99402 18.2187 1.98508 18.1104 1.98508 18ZM5.99999 14.5C5.99999 14.2239 6.22385 14 6.49999 14H11.5C11.7761 14 12 14.2239 12 14.5C12 14.7761 11.7761 15 11.5 15H6.49999C6.22385 15 5.99999 14.7761 5.99999 14.5ZM9.49999 16C9.22385 16 8.99999 16.2239 8.99999 16.5C8.99999 16.7761 9.22385 17 9.49999 17H11.5C11.7761 17 12 16.7761 12 16.5C12 16.2239 11.7761 16 11.5 16H9.49999Z"
                                                  fill="#035A4B"></path>
                                        </svg>

                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    <span class="small me-1">Need Help?</span>
                                    <a class="link small" href="{{ route('soon') }}">Chat now</a>
                                </div>
                            </div>
                            <!-- End Media -->
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        @else
            <div class="container content-space-1 content-space-lg-2">
                <div class="w-md-75 w-lg-50 text-center mx-md-auto">
                    <div class="mb-2">
                        {{--                        <img class="img-fluid" src="{{ asset('themes/front/assets/svg/illustrations/oc-empty-cart.svg') }}" alt="Empty cart" style="width: 15rem;">--}}
                        <i class="bi bi-cart-dash text-dark fw-bold display-1"></i>
                    </div>

                    <div class="mb-5">
                        <h1 class="h2">Your cart is currently empty</h1>
                        <p>Before proceed to checkout you must add some products to your shopping cart. You will find a
                            lot of interesting products on our "Store" page.</p>
                    </div>

                    <a class="btn btn-dark btn-transition rounded-pill px-6" href="{{ route('store.products.index') }}">Start
                        shopping</a>
                </div>
            </div>
        @endif
    @else

        <div class="container content-space-1 content-space-lg-2">
            <div class="row">
                <div class="col text-center">

                    <div class="w-50 mx-md-auto">

                        <i class="bi bi-shield-lock display-1 text-dark"></i>

                        <div class="mb-5">
                            <h1 class="h2">Login required!</h1>
                            <p>
                                To access this page, please log in with your account credentials. If you don't have an
                                account yet, please register to gain access to our exclusive content and services. Thank
                                you for choosing us as your internet service provider and networking partner.
                            </p>
                        </div>
                        <a class="btn btn-dark btn-transition rounded-pill px-6" href="{{ route('login') }}">Login /
                            Register</a>


                        <div class="mt-4"></div>


                        <a class="link text-muted d-block" href="{{ route('home') }}">
                            <i class="bi-chevron-left small ms-1"></i>
                            Back to home
                        </a>

                    </div>


                </div>
            </div>
        </div>

    @endif


</div>
