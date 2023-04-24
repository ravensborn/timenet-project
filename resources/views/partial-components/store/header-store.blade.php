<header id="header" class="py-3 navbar navbar-expand-lg navbar-end navbar-dark navbar-absolute-top navbar-shadow">
    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Default Logo -->
            <a class="navbar-brand" href="{{ route('store.index') }}" aria-label="Front">
                <img class="navbar-brand-logo" src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>
            <!-- End Default Logo -->

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-default">
          <i class="bi-list"></i>
        </span>
                <span class="navbar-toggler-toggled">
          <i class="bi-x"></i>
        </span>
            </button>
            <!-- End Toggler -->

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">


                    <!-- TimeNet -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <!-- End TimeNet -->

                    <!-- Store -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('store.index') }}">Store</a>
                    </li>
                    <!-- End Store -->

                    <!-- Products -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('store.products.index') }}">Products</a>
                    </li>
                    <!-- End Products -->


                    <!-- Button -->
                    @if(!auth()->check())

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-light btn-transition btn-sm" href="{{ route('register') }}">
                                Register
                            </a>
                        </li>

                @else

                    <!-- Support -->
                        <li class="hs-has-sub-menu nav-item">
                            <a id="pagesMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" href="#"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">My Account</a>
                            <!-- Mega Menu -->
                            <div class="hs-sub-menu dropdown-menu" aria-labelledby="pagesMegaMenu"
                                 style="min-width: 14rem;">
                                <a class="dropdown-item" href="{{ route('users.account.overview') }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('users.store.orders.index') }}">Orders</a>
                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            </div>
                            <!-- End Mega Menu -->
                        </li>
                        <!-- End Support -->
                @endif

                <!-- End Button -->
                </ul>
            </div>
            <!-- End Collapse -->
        </nav>
    </div>
</header>
<!-- ========== END HEADER ========== -->
