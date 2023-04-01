<div>


    <div class="bg-img-start"
         style="background-image: url({{ asset('images/wallpapers/6.jpg') }}); background-position: 60% 60%;">
        <div class="container content-space-2 content-space-lg-3 me-4">
            <div class="w-md-65 w-lg-35">
                <div class="mb-3">
                    <h1 class="text-white">TimeNet Store</h1>
                    <p class="text-white-70" style="font-size: 16.5px;">
                        A network expertise company works in the fields<br>of providing internet access.
                    </p>
                </div>
                <a class="btn btn-dark text-white btn-transition" href="{{ route('store.products.index') }}"
                   style="font-size: 16.5px;">Browse Available Products</a>
            </div>
        </div>
    </div>

    <div class="container content-space-b-1">
        <div class="position-relative">
            <!-- Swiper Main Slider -->
            <div class="js-swiper-shop-classic-hero swiper">
                <div class="swiper-wrapper">

                    <!-- Slide -->
                    <div class="swiper-slide">
                        <!-- Container -->
                        <div class="container content-space-t-2 content-space-b-3">
                            <div class="row align-items-lg-center">
                                <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                                    <div class="mb-6">
                                        <h1 class="display-6 mb-4">Wireless Networking</h1>
                                        <p>
                                            Enjoy the freedom of wireless networking with our selection of wireless
                                            routers and access points. Our wireless networking products offer fast,
                                            reliable connections that let you work and play without being tethered to a
                                            cable. Shop with us and experience the convenience of wireless networking.
                                        </p>
                                    </div>

                                    <div class="d-flex gap-2">

                                    </div>
                                </div>
                                <!-- End Col -->

                                <div class="col-lg-6 order-lg-1">
                                    <div class="w-75 mx-auto">
                                        <img class="img-fluid"
                                             src="{{ asset('images/store-slider/router.png') }}"
                                             alt="Image Description">
                                    </div>
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>
                        <!-- End Container -->
                    </div>
                    <!-- End Slide -->

                    <!-- Slide -->
                    <div class="swiper-slide">
                        <!-- Container -->
                        <div class="container content-space-t-2 content-space-b-3">
                            <div class="row align-items-lg-center">
                                <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                                    <div class="mb-6">
                                        <h1 class="display-6 mb-4">Security Solutions</h1>
                                        <p>
                                            Protect your network with our comprehensive security solutions. We offer a
                                            range of products and services designed to keep your network safe from cyber
                                            threats and attacks. From firewalls and antivirus software to network
                                            monitoring and management, we've got you covered.
                                        </p>
                                    </div>

                                    <div class="d-flex gap-2">

                                    </div>
                                </div>
                                <!-- End Col -->

                                <div class="col-lg-6 order-lg-1">
                                    <div class="w-75 mx-auto">
                                        <img class="img-fluid"
                                             src="{{ asset('images/store-slider/RCS5516FW-front-right.png') }}"
                                             alt="Image Description">
                                    </div>
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>
                        <!-- End Container -->
                    </div>
                    <!-- End Slide -->



                    <!-- Slide -->
                    <div class="swiper-slide">
                        <!-- Container -->
                        <div class="container content-space-t-2 content-space-b-3">
                            <div class="row align-items-lg-center">
                                <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
                                    <div class="mb-6">
                                        <h1 class="display-6 mb-4">Networking Essentials</h1>
                                        <p>
                                            Our store has everything you need to set up and maintain your home or
                                            business network. From routers and switches to cables and connectors, we
                                            carry a wide range of networking essentials from top brands. Shop with us
                                            and get the tools you need to stay connected.
                                        </p>
                                    </div>

                                    <div class="d-flex gap-2">

                                    </div>
                                </div>
                                <!-- End Col -->

                                <div class="col-lg-6 order-lg-1">
                                    <div class="w-75 mx-auto">
                                        <img class="img-fluid"
                                             src="{{ asset('images/store-slider/fiber.png') }}"
                                             alt="Image Description">
                                    </div>
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>
                        <!-- End Container -->
                    </div>
                    <!-- End Slide -->
                </div>

                <!-- Arrows -->
                {{--                <div class="js-swiper-shop-classic-hero-button-next swiper-button-next"></div>--}}
                {{--                <div class="js-swiper-shop-classic-hero-button-prev swiper-button-prev"></div>--}}
            </div>
            <!-- End Swiper Main Slider -->

            <!-- Swiper Thumbs Slider -->
            <div class="position-absolute bottom-0 start-0 end-0 mb-3">
                <div class="js-swiper-shop-hero-thumbs swiper" style="max-width: 13rem;">
                    <div class="swiper-wrapper">

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <a class="js-swiper-thumb-progress swiper-thumb-progress-avatar" href="javascript:;"
                               tabindex="0">
                                <img class="swiper-thumb-progress-avatar-img"
                                     src="{{ asset('images/store-slider/router.png') }}"
                                     alt="Image Description">
                            </a>
                        </div>
                        <!-- End Slide -->

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <a class="js-swiper-thumb-progress swiper-thumb-progress-avatar" href="javascript:;"
                               tabindex="0">
                                <img class="swiper-thumb-progress-avatar-img"
                                     src="{{ asset('images/store-slider/RCS5516FW-front-right.png') }}"
                                     alt="Image Description">
                            </a>
                        </div>
                        <!-- End Slide -->


                        <!-- Slide -->
                        <div class="swiper-slide">
                            <a class="js-swiper-thumb-progress swiper-thumb-progress-avatar" href="javascript:;"
                               tabindex="0">
                                <img class="swiper-thumb-progress-avatar-img"
                                     src="{{ asset('images/store-slider/fiber.png') }}"
                                     alt="Image Description">
                            </a>
                        </div>
                        <!-- End Slide -->
                    </div>
                </div>
            </div>
            <!-- End Swiper Thumbs Slider -->
        </div>
    </div>

    <div class="border-bottom"></div>

    <div class="content-space-b-1"></div>

    <div class="container content-space-b-1">
        <div class="row">
            <div class="col-md-4 mb-7 mb-md-0">
                <!-- Icon Block -->
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img class="avatar avatar-4x3"
                             src="{{ asset('themes/front/assets/svg/illustrations/oc-protected-card.svg') }}"
                             alt="Image Description">
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h4 class="mb-1">Secure checkout</h4>
                        <p class="small mb-0">Guaranteed safe checkout.</p>
                    </div>
                </div>
                <!-- End Icon Block -->
            </div>
            <!-- End Col -->

            <div class="col-md-4 mb-7 mb-md-0">
                <!-- Icon Block -->
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img class="avatar avatar-4x3"
                             src="{{ asset('themes/front/assets/svg/illustrations/oc-return.svg') }}"
                             alt="Image Description">
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h4 class="mb-1">30 Days return</h4>
                        <p class="small mb-0">We offer you a full refund within 30 days of purchase.</p>
                    </div>
                </div>
                <!-- End Icon Block -->
            </div>
            <!-- End Col -->

            <div class="col-md-4">
                <!-- Icon Block -->
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img class="avatar avatar-4x3"
                             src="{{ asset('themes/front/assets/svg/illustrations/oc-truck.svg') }}"
                             alt="Image Description">
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <h4 class="mb-1">Fast shipping</h4>
                        <p class="small mb-0">Automatically receive express shipping on every order.</p>
                    </div>
                </div>
                <!-- End Icon Block -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>

    <div class="bg-light">
        <div class="container content-space-2">
            <div class="w-md-75 w-lg-50 text-center mx-md-auto">
                <div class="row justify-content-lg-between">
                    <!-- Heading -->
                    <div class="mb-5">
                        {{--                        <span class="text-cap">Subscribe</span>--}}
                        <h2>Get the latest from TimeNet</h2>
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

</div>
