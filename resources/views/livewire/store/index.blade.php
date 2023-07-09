<div>


    <div class="content-space-b-1 store-main-banner" style="background-image: {{ $bannerArray['backgroundOverlay'] }} url('{{ $bannerArray['image'] }}'); background-position: {{ $bannerArray['backgroundPosition'] }};">
        <div
            class="container d-md-flex align-items-md-center vh-md-70 content-space-t-4 content-space-b-3 content-space-md-0">
            <div class="mt-5">
                <h1 class="text-white">TimeNet Store</h1>
                <p class="text-white-70 w-75" style="font-size: 16.5px;">
                    A network expertise company works in the fields of providing internet access.
                </p>
                <a class="btn btn-dark text-white btn-transition" href="{{ route('store.products.index') }}"
                   style="font-size: 16.5px;">Browse Available Products</a>
            </div>
        </div>
    </div>

    <div class="container content-space-b-1" wire:ignore>
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
                                        <h1 class="display-6 mb-4">RUTXR1</h1>
                                        <p>
                                            The first rack-mountable LTE Cat 6 router in the Teltonika Networks
                                            portfolio comes with redundant power supplies, WAN failover, dual-SIM, SFP,
                                            USB, and dedicated console ports. This feature-rich device with highly
                                            customizable and powerful RutOS is perfect where a fast and ultra-reliable
                                            connection is needed.
                                        </p>
                                    </div>

                                    <div class="d-flex gap-2">

                                    </div>
                                </div>
                                <!-- End Col -->

                                <div class="col-lg-6 order-lg-1">
                                    <div class="w-75 mx-auto">
                                        <img class="img-fluid"
                                             src="{{ asset('images/store-slider/RUTXR1.png') }}"
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
                                        <h1 class="display-6 mb-4">TRB140</h1>
                                        <p>
                                            TRB140 is an ultra-small, lightweight, and energy-efficient IoT device with
                                            mission-critical LTE Cat 4 and Gigabit Ethernet connectivity options. Linux
                                            environment offers a high degree of customization. This gateway is perfect
                                            for projects and applications where a single device must be upgraded with
                                            reliable and secure internet connectivity.
                                        </p>
                                    </div>

                                    <div class="d-flex gap-2">

                                    </div>
                                </div>
                                <!-- End Col -->

                                <div class="col-lg-6 order-lg-1">
                                    <div class="w-75 mx-auto">
                                        <img class="img-fluid"
                                             src="{{ asset('images/store-slider/TRB140.png') }}"
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
                                        <h1 class="display-6 mb-4">RUT901</h1>
                                        <p>
                                            The RUT901 cellular router delivers the top-rated features of its
                                            predecessors, the RUT950 and RUT951, to the market. The device ensures
                                            high-performance, providing automatic WAN failover to an available backup
                                            connection, guaranteeing network continuity and eliminating downtime.
                                        </p>
                                    </div>

                                    <div class="d-flex gap-2">

                                    </div>
                                </div>
                                <!-- End Col -->

                                <div class="col-lg-6 order-lg-1">
                                    <div class="w-75 mx-auto">
                                        <img class="img-fluid"
                                             src="{{ asset('images/store-slider/RUT901.png') }}"
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
                                     src="{{ asset('images/store-slider/RUTXR1.png') }}"
                                     alt="Image Description">
                            </a>
                        </div>
                        <!-- End Slide -->

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <a class="js-swiper-thumb-progress swiper-thumb-progress-avatar" href="javascript:;"
                               tabindex="0">
                                <img class="swiper-thumb-progress-avatar-img"
                                     src="{{ asset('images/store-slider/TRB140.png') }}"
                                     alt="Image Description">
                            </a>
                        </div>
                        <!-- End Slide -->


                        <!-- Slide -->
                        <div class="swiper-slide">
                            <a class="js-swiper-thumb-progress swiper-thumb-progress-avatar" href="javascript:;"
                               tabindex="0">
                                <img class="swiper-thumb-progress-avatar-img"
                                     src="{{ asset('images/store-slider/RUT901.png') }}"
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

                    @livewire('global-components.subscribe-box', ['type' => 2])

                    <p class="small">You can unsubscribe at any time. Read our <a class="text-dark"
                                                                                  href="{{ route('privacy-and-policy') }}">privacy
                            policy</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="container content-space-2">
        <div class="row">
            @foreach($partners as $partner)
                <div class="col-4 col-sm-3 col-md-2 py-3">
                    <img class="avatar avatar-lg avatar-4x3 avatar-centered"
                         src="{{ $partner->getFirstMediaUrl('image') }}" alt="Logo">
                </div>
            @endforeach
        </div>
        <!-- End Row -->
    </div>

</div>
