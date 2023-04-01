<!-- Sticky Footer -->

<div style="position: fixed; bottom: 0;right: 0;width: 300px; z-index: 10000;">
    <div style="padding: 5px;">
        <div style="margin: 0 auto; background-color: #ffa726; color: black; border: 3px solid black; padding: 20px; border-radius: 10px;">
            This website is undergoing to a major renovation please visit us later.
        </div>
    </div>
</div>

<!-- ========== FOOTER ========== -->
<footer class="bg-dark">
    <div class="container pb-1 pb-lg-5">
        <div class="row content-space-t-2">
            <div class="col-12 col-lg-3 mb-7 mb-lg-0">
                <!-- Logo -->
                <div class="mb-5">
                    <a class="navbar-brand" href="{{ route('home') }}" aria-label="Space">
                        <img class="navbar-brand-logo" src="{{ asset('images/logo.png') }}" alt="Image Description">
                    </a>
                </div>
                <!-- End Logo -->

                <!-- List -->
                <ul class="list-unstyled list-py-1">
                    <li><a class="link-sm link-light" href="#"><i class="bi-geo-alt-fill me-1"></i> Erbil, Kurdistan Region of Iraq</a></li>
                    <li><a class="link-sm link-light" href="tel:+9647503807676"><i class="bi-telephone-inbound-fill me-1"></i> +964 (750) 380-7676</a></li>
                </ul>
                <!-- End List -->

            </div>
            <!-- End Col -->

            <div class="col-6 col-sm mb-7 mb-sm-0">
                <h5 class="text-white mb-3">Company</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-0">
                    <li><a class="link-sm link-light" href="{{ route('about') }}">About</a></li>
                    <li><a class="link-sm link-light" href="{{ route('posts.index', ['grid_type' => 'grid', 'slug' => 'services']) }}">Services</a></li>
                    <li><a class="link-sm link-light" href="{{ route('posts.index', ['grid_type' => 'grid', 'slug' => 'solutions']) }}">Solutions</a></li>
                    <li><a class="link-sm link-light" href="{{ route('posts.index', ['grid_type' => 'grid', 'slug' => 'product-catalog']) }}">Catalog</a></li>
                    <li><a class="link-sm link-light" href="tel:9647503807676">Contact us</a></li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->

            <div class="col-6 col-sm mb-7 mb-sm-0">
                <h5 class="text-white mb-3">Features</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-0">
                    <li><a class="link-sm link-light" href="{{ route('store.index') }}">Store</a></li>
                    <li><a class="link-sm link-light" href="{{ route('store.products.index') }}">Available Products</a></li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->

            <div class="col-6 col-sm mb-7 mb-sm-0">
                <h5 class="text-white mb-3">Documentation</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-0">
                    <li><a class="link-sm link-light" href="{{ route('downloads') }}">Downloads</a></li>
                    <li><a class="link-sm link-light" href="{{ route('faq') }}">FAQ</a></li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->

            <div class="col-6 col-sm">
                <h5 class="text-white mb-3">Resources</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-5">
                    <li><a class="link-sm link-light" href="{{ route('soon') }}"><i class="bi-question-circle-fill me-1"></i> Help</a></li>
                    <li><a class="link-sm link-light" href="{{ route('soon') }}"><i class="bi-person-circle me-1"></i> Your Account</a></li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->

        <div class="border-top border-white-10 my-7"></div>

        <div class="row mb-7">
            <div class="col-sm mb-3 mb-sm-0">
                <!-- Socials -->
                <ul class="list-inline list-separator list-separator-light mb-0">
                    <li class="list-inline-item">
                        <a class="link-sm link-light" href="{{ route('soon') }}">Privacy & Policy</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="link-sm link-light" href="{{ route('soon') }}">Terms</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="link-sm link-light" href="{{ route('soon') }}">Site Map</a>
                    </li>
                </ul>
                <!-- End Socials -->
            </div>

            <div class="col-sm-auto">
                <!-- Socials -->
                <ul class="list-inline mb-0">

                    <li class="list-inline-item">
                        <a class="btn btn-soft-light btn-xs btn-icon" href="https://www.linkedin.com/company/timenet/">
                            <i class="bi-linkedin"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-soft-light btn-xs btn-icon" href="https://www.facebook.com/Teknykar">
                            <i class="bi-facebook"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a class="btn btn-soft-light btn-xs btn-icon" href="https://www.instagram.com/time.nett/">
                            <i class="bi-instagram"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a class="btn btn-soft-light btn-xs btn-icon" href="mailto:info@time-net.net">
                            <i class="bi-envelope"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <!-- Button Group -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-soft-light btn-xs dropdown-toggle" id="footerDarkSelectLanguage" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                <span class="d-flex align-items-center">
                  <img class="avatar avatar-xss avatar-circle me-2" src="{{ asset('themes/front/assets/vendor/flag-icon-css/flags/1x1/us.svg') }}" alt="Image description" width="16"/>
                  <span>English (US)</span>
                </span>
                            </button>

                            <div class="dropdown-menu" aria-labelledby="footerDarkSelectLanguage">
                                <a class="dropdown-item d-flex align-items-center active" href="{{ route('home') }}">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="{{ asset('themes/front/assets/vendor/flag-icon-css/flags/1x1/us.svg') }}" alt="Image description" width="16"/>
                                    <span>English (US)</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center active" href="{{ route('soon') }}">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="{{ asset('images/kurdistan-flag.svg') }}" alt="Image description" width="16"/>
                                    <span>Central Kurdish (کوردیی ناوەندی)</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center active" href="{{ route('soon') }}">
                                    <img class="avatar avatar-xss avatar-circle me-2" src="{{ asset('themes/front/assets/vendor/flag-icon-css/flags/1x1/iq.svg') }}" alt="Image description" width="16"/>
                                    <span>Arabic (العربیة)</span>
                                </a>
                            </div>
                        </div>
                        <!-- End Button Group -->
                    </li>
                </ul>
                <!-- End Socials -->
            </div>
        </div>

        <!-- Copyright -->
        <div class="w-md-85 text-lg-center mx-lg-auto">
            <p class="text-white-50 small">&copy; {{ date('Y') }} TimeNet. All rights reserved.</p>
            <p class="text-white-50 small">When you visit or interact with our sites, services or tools, we or our authorised service providers may use cookies for storing information to help provide you with a better, faster and safer experience and for marketing purposes.</p>
        </div>
        <!-- End Copyright -->
    </div>
</footer>
<!-- ========== END FOOTER ========== -->
