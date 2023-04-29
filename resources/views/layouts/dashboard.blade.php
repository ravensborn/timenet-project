<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}"/>


    <title>{{ config('env.APP_NAME') }}</title>

    <link href="{{ asset('dashboard-assets/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        .pagination {
            --bs-pagination-padding-x: 0.75rem;
            --bs-pagination-padding-y: 0.375rem;
            --bs-pagination-font-size: 1rem;
            --bs-pagination-color: var(--bs-link-color);
            --bs-pagination-bg: var(--bs-body-bg);
            --bs-pagination-border-width: var(--bs-border-width);
            --bs-pagination-border-color: var(--bs-border-color);
            --bs-pagination-border-radius: var(--bs-border-radius);
            --bs-pagination-hover-color: var(--bs-link-hover-color);
            --bs-pagination-hover-bg: var(--bs-tertiary-bg);
            --bs-pagination-hover-border-color: var(--bs-border-color);
            --bs-pagination-focus-color: var(--bs-link-hover-color);
            --bs-pagination-focus-bg: var(--bs-secondary-bg);
            --bs-pagination-focus-box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            --bs-pagination-active-color: #fff;
            --bs-pagination-active-bg: #0d6efd;
            --bs-pagination-active-border-color: #0d6efd;
            --bs-pagination-disabled-color: var(--bs-secondary-color);
            --bs-pagination-disabled-bg: var(--bs-secondary-bg);
            --bs-pagination-disabled-border-color: var(--bs-border-color);
            display: flex;
            padding-left: 0;
            list-style: none;
        }

        .page-link {
            position: relative;
            display: block;
            padding: var(--bs-pagination-padding-y) var(--bs-pagination-padding-x);
            font-size: var(--bs-pagination-font-size);
            color: var(--bs-pagination-color);
            text-decoration: none;
            background-color: var(--bs-pagination-bg);
            border: var(--bs-pagination-border-width) solid var(--bs-pagination-border-color);
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        @media (prefers-reduced-motion: reduce) {
            .page-link {
                transition: none;
            }
        }
        .page-link:hover {
            z-index: 2;
            color: var(--bs-pagination-hover-color);
            background-color: var(--bs-pagination-hover-bg);
            border-color: var(--bs-pagination-hover-border-color);
        }
        .page-link:focus {
            z-index: 3;
            color: var(--bs-pagination-focus-color);
            background-color: var(--bs-pagination-focus-bg);
            outline: 0;
            box-shadow: var(--bs-pagination-focus-box-shadow);
        }
        .page-link.active, .active > .page-link {
            z-index: 3;
            color: var(--bs-pagination-active-color);
            background-color: var(--bs-pagination-active-bg);
            border-color: var(--bs-pagination-active-border-color);
        }
        .page-link.disabled, .disabled > .page-link {
            color: var(--bs-pagination-disabled-color);
            pointer-events: none;
            background-color: var(--bs-pagination-disabled-bg);
            border-color: var(--bs-pagination-disabled-border-color);
        }

        .page-item:not(:first-child) .page-link {
            margin-left: calc(var(--bs-border-width) * -1);
        }
        .page-item:first-child .page-link {
            border-top-left-radius: var(--bs-pagination-border-radius);
            border-bottom-left-radius: var(--bs-pagination-border-radius);
        }
        .page-item:last-child .page-link {
            border-top-right-radius: var(--bs-pagination-border-radius);
            border-bottom-right-radius: var(--bs-pagination-border-radius);
        }

        .pagination-lg {
            --bs-pagination-padding-x: 1.5rem;
            --bs-pagination-padding-y: 0.75rem;
            --bs-pagination-font-size: 1.25rem;
            --bs-pagination-border-radius: var(--bs-border-radius-lg);
        }

        .pagination-sm {
            --bs-pagination-padding-x: 0.5rem;
            --bs-pagination-padding-y: 0.25rem;
            --bs-pagination-font-size: 0.875rem;
            --bs-pagination-border-radius: var(--bs-border-radius-sm);
        }

        td, th {
            white-space: nowrap;
            text-align: center;
        }
    </style>

    @livewireStyles
</head>

<body>
<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="{{ route('dashboard.overview') }}">
                <span class="align-middle">TimeNet</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Modules
                </li>

                <li class="sidebar-item @if(request()->is('dashboard')) active @endif">
                    <a class="sidebar-link" href="{{ route('dashboard.overview') }}">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">
                            Overview
                        </span>
                    </a>
                </li>

                <li class="sidebar-item @if(request()->is('dashboard/users')) active @endif">
                    <a class="sidebar-link" href="{{ route('dashboard.users') }}">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
                    </a>
                </li>

                <li class="sidebar-item @if(request()->is('dashboard/orders')) active @endif">
                    <a class="sidebar-link" href="{{ route('dashboard.orders') }}">
                        <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">
                            Orders
                        </span>
                    </a>
                </li>

                <li class="sidebar-item @if(request()->is('dashboard/products')) active @endif">
                    <a class="sidebar-link" href="{{ route('dashboard.products') }}">
                        <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">
                            Products
                        </span>
                    </a>
                </li>

                <li class="sidebar-item @if(request()->is('dashboard/posts')) active @endif">
                    <a class="sidebar-link" href="{{ route('dashboard.posts') }}">
                        <i class="align-middle" data-feather="package"></i> <span class="align-middle">
                            Posts
                        </span>
                    </a>
                </li>


                <li class="sidebar-header">
                    Settings
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="align-middle" data-feather="list"></i> <span class="align-middle">
                           Categories
                        </span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="align-middle" data-feather="list"></i> <span class="align-middle">
                           Brands
                        </span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="align-middle" data-feather="list"></i> <span class="align-middle">
                            Download Center
                        </span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="align-middle" data-feather="list"></i> <span class="align-middle">
                            Subscriber List
                        </span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="align-middle" data-feather="list"></i> <span class="align-middle">
                            FAQ
                        </span>
                    </a>
                </li>

            </ul>

        </div>
    </nav>

    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle js-sidebar-toggle">
                <i class="hamburger align-self-center"></i>
            </a>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">

                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                            <i class="align-middle" data-feather="settings"></i>
                        </a>

                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                            <img src="{{ asset('images/user.png') }}" class="avatar img-fluid rounded me-1"
                                 alt="Charles Hall"/>
                            <span class="text-dark">{{ ucwords(auth()->user()->name) }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('users.account.overview') }}">
                                <i class="align-middle me-1" data-feather="user"></i> Account</a>
                            <a class="dropdown-item" href="{{ route('home') }}">
                                <i class="align-middle me-1" data-feather="log-in"></i> View Website</a>
                            <a class="dropdown-item" href="{{ route('store.index') }}">
                                <i class="align-middle me-1" data-feather="log-in"></i> View Store</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">Log out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="content">
            <div class="container-fluid p-0">

               @yield('content')

            </div>
        </main>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <span class="text-muted"><strong>{{ config('env.APP_NAME') }}</strong></span>
                            - <strong>Dashboard</strong> &copy;
                        </p>
                    </div>
                    <div class="col-6 text-end">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-muted" href="{{ route('soon') }}" target="_blank">Dev Team</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="{{ asset('dashboard-assets/js/app.js') }}"></script>
@livewireScripts
</body>

</html>
