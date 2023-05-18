@foreach($items as $item)

    @if(in_array($item['type'], [\App\Models\Menu::ITEM_TYPE_ROUTE, \App\Models\Menu::ITEM_TYPE_LINK, \App\Models\Menu::ITEM_TYPE_POST]))
        <li class="nav-item">
            <a class="nav-link"
               href="{{ $item['url'] }}">{!! $item['name']  !!}</a>
        </li>
    @endif

    @if(in_array($item['type'], [\App\Models\Menu::ITEM_TYPE_ROUTE_DROPDOWN, \App\Models\Menu::ITEM_TYPE_LINK_DROPDOWN, \App\Models\Menu::ITEM_TYPE_POST_DROPDOWN]))
        <li class="hs-has-sub-menu nav-item">
            <a id="pagesMegaMenu"
               class="hs-mega-menu-invoker nav-link dropdown-toggle text-white-80"
               href="#"
               role="button" data-bs-toggle="dropdown"
               aria-expanded="false">{!! $item['name'] !!}</a>
            <!-- Mega Menu -->
            <div class="hs-sub-menu dropdown-menu" aria-labelledby="pagesMegaMenu"
                 style="min-width: 14rem;">
                @foreach($item['array'] as $subItem)
                    <a class="dropdown-item"
                       href="{{ $subItem['url'] }}">
                        {!! $subItem['name'] !!}
                    </a>
                @endforeach
            </div>
            <!-- End Mega Menu -->
        </li>
    @endif

    @if($item['type'] == \App\Models\Menu::ITEM_TYPE_LANG_SWITCHER)
        <li class="hs-has-sub-menu nav-item">
            <a id="pagesMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle" href="#"
               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {!! $item['name'] !!}
            </a>
            <!-- Mega Menu -->
            <div class="hs-sub-menu dropdown-menu" aria-labelledby="pagesMegaMenu"
                 style="min-width: 14rem;">
                <a class="dropdown-item" href="#">
                    <div class="d-flex align-items-center">
                        <img style="width: 16px; height: auto;"
                             src="{{ asset('themes/front/assets/vendor/flag-icon-css/flags/4x3/us.svg')  }}"
                             alt="flag icon">
                        &nbsp;
                        English (United States)
                    </div>
                </a>
                <a class="dropdown-item" href="{{ route('soon') }}">
                    <div class="d-flex align-items-center">
                        <img style="width: 16px; height: auto;"
                             src="{{ asset('images/kurdistan-flag.svg')  }}" alt="flag icon">
                        &nbsp;
                        Kurdish (کوردی)
                    </div>
                </a>
                <a class="dropdown-item" href="{{ route('soon') }}">
                    <div class="d-flex align-items-center">
                        <img style="width: 16px; height: auto;"
                             src="{{ asset('themes/front/assets/vendor/flag-icon-css/flags/4x3/iq.svg')  }}"
                             alt="flag icon">
                        &nbsp;
                        Arabic (العربیة)
                    </div>
                </a>

            </div>
            <!-- End Mega Menu -->
        </li>
    @endif
    @if($item['type'] == \App\Models\Menu::ITEM_TYPE_CALL_US_BTN)
        <li class="nav-item">
            <a class="btn btn-light btn-transition btn-sm" href="tel:{{ $item['tel'] }}" target="_blank">
                <i class="bi bi-telephone"></i>
                &nbsp;
                Contact Us
            </a>
        </li>
    @endif

    @if($item['type'] == \App\Models\Menu::ITEM_TYPE_LIVEWIRE_CART)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('store.cartItems.index') }}">
                @livewire('store.cart-items.header-cart-component')
            </a>
        </li>
    @endif

    @if($item['type'] == \App\Models\Menu::ITEM_TYPE_USER_ACCOUNT)
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
    @endif

@endforeach
