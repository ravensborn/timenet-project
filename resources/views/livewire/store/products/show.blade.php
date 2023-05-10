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
                            <li class="breadcrumb-item">
                                <a href="{{ route('store.products.index') }}">Products</a>
                            </li>
                            <li class="breadcrumb-item active">
                                @if(strlen($product->name) > 15)
                                    {{ substr($product->name, 0, 15) . '...' }}
                                @else
                                    {{$product->name }}
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

    <!-- Hero -->
    <div class="container content-space-t-2 content-space-b-4">
        <div class="row">
            <div class="col-md-7 mb-7 mb-md-0">
                <div class="pe-md-4">
                    <div class="card-pinned" wire:ignore>
                        <!-- Swiper Main Slider -->
                        <div class="js-swiper-shop-product swiper">
                            <div class="swiper-wrapper">
                                @foreach($product->getMedia('images') as $image)
                                    <!-- Slide -->
                                    <div class="swiper-slide">
                                        <div class="card card-bordered shadow-none">
                                            <img class="card-img" src="{{ $image->getFullUrl() }}"
                                                 alt="Image Description">
                                        </div>
                                    </div>
                                    <!-- End Slide -->

                                @endforeach
                            </div>

                            <!-- Arrows -->
                            <div class="js-swiper-shop-product-button-next swiper-button-next"></div>
                            <div class="js-swiper-shop-product-button-prev swiper-button-prev"></div>
                        </div>
                        <!-- End Swiper Main Slider -->

                        <!-- Swiper Thumb Slider -->
                        <div class="position-absolute bottom-0 end-0 start-0 zi-1 p-4">
                            <div class="js-swiper-shop-product-thumb swiper" style="max-width: 15rem;">
                                <div class="swiper-wrapper">

                                    @foreach($product->getMedia('images') as $image)
                                        <!-- Slide -->
                                        <div class="swiper-slide">
                                            <a class="avatar avatar-circle" href="javascript:;">
                                                <img class="avatar-img" src="{{ $image->getFullUrl() }}"
                                                     alt="Image Description">
                                            </a>
                                        </div>
                                        <!-- End Slide -->

                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <!-- End Swiper Thumb Slider -->
                    </div>
                </div>
            </div>
            <!-- End Col -->

            <div class="col-md-5">
                <!-- Rating -->
                <span class="text-dark d-flex gap-1 mb-4">
                    <img src="{{ asset('themes/front/assets/svg/illustrations/star.svg') }}" alt="Review rating"
                         width="16">
                    <img src="{{ asset('themes/front/assets/svg/illustrations/star.svg') }}" alt="Review rating"
                         width="16">
                    <img src="{{ asset('themes/front/assets/svg/illustrations/star.svg') }}" alt="Review rating"
                         width="16">
                    <img src="{{ asset('themes/front/assets/svg/illustrations/star.svg') }}" alt="Review rating"
                         width="16">
                    <img src="{{ asset('themes/front/assets/svg/illustrations/star.svg') }}" alt="Review rating"
                         width="16">
                    <span class="ms-1">{{ $product->visitLogs()->distinct('ip')->count('ip') }} views</span>
                </span>
                <!-- End Rating -->

                <!-- Heading -->
                <div class="mb-3">
                    <h1 class="h2">{{ $product->name }}</h1>
                    <p>
                        {!! $product->description !!}
                    </p>
                </div>
                <!-- End Heading -->

                <div class="mb-3">
                    @if(auth()->check())
                        <a class="link-sm link-secondary small"
                           style="cursor:pointer;"
                           wire:click="toWishlist()">
                            @if($productWishlisted)
                                <i class="bi-heart-fill text-danger me-1"></i>
                                <span class="text-danger">Save for later</span>
                            @else
                                <i class="bi-heart me-1"></i>
                                Save for later
                            @endif
                        </a>
                    @endif
                </div>

                <!-- Price -->
                <div class="mb-5">
                    <span class="d-block mb-2">Total price:</span>
                    <div class="d-flex align-items-center">
                        @if($product->previous_price)
                            <h3 class="mb-0">${{ number_format($product->price, 2) }}</h3>
                            <span class="ms-2"><del>{{ number_format($product->previous_price, 2) }}</del></span>
                        @else
                            <h3 class="mb-0">${{ number_format($product->price, 2) }}</h3>
                        @endif
                    </div>
                </div>
                <!-- End Price -->

                <!-- Quantity -->
                <div class="quantity-counter mb-3">
                    <div class="js-quantity-counter row align-items-center">
                        <div class="col">
                            <span class="d-block small">Select quantity</span>
                            <input class="js-result form-control form-control-quantity-counter" type="text"
                                   wire:model="quantity">
                        </div>
                        <!-- End Col -->

                        <div class="col-auto">
                            <a class="js-minus btn btn-outline-secondary btn-xs btn-icon rounded-circle"
                               wire:click="adjustQuantity('decrement')">
                                <svg width="8" height="2" viewBox="0 0 8 2" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 1C0 0.723858 0.223858 0.5 0.5 0.5H7.5C7.77614 0.5 8 0.723858 8 1C8 1.27614 7.77614 1.5 7.5 1.5H0.5C0.223858 1.5 0 1.27614 0 1Z"
                                        fill="currentColor"/>
                                </svg>
                            </a>
                            <a class="js-plus btn btn-outline-secondary btn-xs btn-icon rounded-circle"
                               wire:click="adjustQuantity('increment')">
                                <svg width="8" height="8" viewBox="0 0 8 8" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4 0C4.27614 0 4.5 0.223858 4.5 0.5V3.5H7.5C7.77614 3.5 8 3.72386 8 4C8 4.27614 7.77614 4.5 7.5 4.5H4.5V7.5C4.5 7.77614 4.27614 8 4 8C3.72386 8 3.5 7.77614 3.5 7.5V4.5H0.5C0.223858 4.5 0 4.27614 0 4C0 3.72386 0.223858 3.5 0.5 3.5H3.5V0.5C3.5 0.223858 3.72386 0 4 0Z"
                                        fill="currentColor"/>
                                </svg>
                            </a>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Quantity -->

                @if($product->getFeatures())

                    <!-- Accordion -->
                    <div class="accordion mb-5" id="shopCartAccordion">
                        @foreach($product->getFeatures() as $key => $feature)

                            <div class="p-2">
                               <span class="text-dark fw-bold">
                                   <div class="d-flex align-items-center">
                                       <div>
                                           <i class="bi bi-check-lg text-dark" style="font-size: 20px;"></i>
                                       </div>
                                       <div class="ms-2">
                                           {{ $feature['name'] }}
                                       </div>
                                   </div>
                               </span>
                            </div>

                            <!-- Collapse -->
                            {{--                            <div class="accordion-item">--}}
                            {{--                                <a class="accordion-button collapsed" href="#" role="button" data-bs-toggle="collapse"--}}
                            {{--                                   data-bs-target="#shopCartAccordionCollapse-{{ $key }}" aria-expanded="false"--}}
                            {{--                                   aria-controls="shopCartAccordionCollapse-{{ $key }}">--}}
                            {{--                                    <div class="d-flex align-items-center">--}}
                            {{--                                        <div>--}}
                            {{--                                            <i class="bi  bi-check-lg text-dark" style="font-size: 16px;"></i>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="ms-2">--}}
                            {{--                                            {{ $feature['name'] }}--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </a>--}}

                            {{--                                <div id="shopCartAccordionCollapse-{{ $key }}" class="accordion-collapse collapse"--}}
                            {{--                                     data-bs-parent="#shopCartAccordion">--}}
                            {{--                                    <div class="accordion-body">--}}
                            {{--                                        <p class="mb-0">{{ $feature['description'] }}</p>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <!-- End Collapse -->
                        @endforeach
                    </div>
                    <!-- End Accordion -->

                @endif

                <div class="d-grid mb-2">
                    @if(auth()->check())
                        @if($product->checkIfPurchasable())
                            <button type="button" class="btn btn-dark btn-transition rounded-pill"
                                    wire:click="addToCart()">
                                <i class="bi bi-cart me-1"></i>
                                Add to cart
                                @if($userCart)
                                    ({{ $userCart }})
                                @endif
                            </button>
                        @else
                            <button type="button" class="btn btn-dark btn-transition rounded-pill"
                                    wire:click="addToCart()">
                                <i class="bi bi-box me-1"></i>
                                Available soon
                            </button>
                        @endif

                    @else
                        <a href="{{ route('login') }}" class="btn btn-dark btn-transition rounded-pill"
                           wire:click="addToCart(0, 'add')">Login or register to add item to cart</a>

                    @endif
                </div>

                @if(auth()->check() && $userCart > 0)
                    <div class="d-grid mb-4">
                        <a href="{{ route('store.cartItems.index') }}"
                           class="btn btn-outline-dark btn-transition rounded-pill" wire:click="addToCart(0, 'add')">View
                            shopping cart</a>

                    </div>
                @endif

                <!-- Media -->
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="svg-icon svg-icon-sm text-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M22.1671 18.1421C22.4827 18.4577 23.0222 18.2331 23.0206 17.7868L23.0039 13.1053V5.52632C23.0039 4.13107 21.8729 3 20.4776 3H8.68815C7.2929 3 6.16183 4.13107 6.16183 5.52632V9H13C14.6568 9 16 10.3431 16 12V15.6316H19.6565L22.1671 18.1421Z"
                                      fill="#035A4B"/>
                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                      d="M1.98508 18V13C1.98508 11.8954 2.88051 11 3.98508 11H11.9851C13.0896 11 13.9851 11.8954 13.9851 13V18C13.9851 19.1046 13.0896 20 11.9851 20H4.10081L2.85695 21.1905C2.53895 21.4949 2.01123 21.2695 2.01123 20.8293V18.3243C1.99402 18.2187 1.98508 18.1104 1.98508 18ZM5.99999 14.5C5.99999 14.2239 6.22385 14 6.49999 14H11.5C11.7761 14 12 14.2239 12 14.5C12 14.7761 11.7761 15 11.5 15H6.49999C6.22385 15 5.99999 14.7761 5.99999 14.5ZM9.49999 16C9.22385 16 8.99999 16.2239 8.99999 16.5C8.99999 16.7761 9.22385 17 9.49999 17H11.5C11.7761 17 12 16.7761 12 16.5C12 16.2239 11.7761 16 11.5 16H9.49999Z"
                                      fill="#035A4B"/>
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
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Hero -->
</div>
