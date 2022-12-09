<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Hello, world!</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('themes/front/assets/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/front/assets/css/snippets.min.css') }}">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('themes/front/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/front/assets/vendor/bootstrap-icons/font/bootstrap-icons.css') }}">
</head>

<body>

@include('partial-components.header')

<!-- Hero -->
<div class="overflow-hidden">
    <div class="container content-space-t-2 content-space-b-3">
        <div class="row justify-content-lg-between align-items-md-center">
            <div class="col-md-6 col-lg-5 mb-7 mb-md-0">
                <!-- Heading -->
                <div class="mb-5">
                    <span class="text-cap">Who we are?</span>
                    <h1 class="display-4 mb-3">TimeNet</h1>
                    <p class="lead">A network expertise company works in the fields of providing internet access.</p>
                </div>
                <!-- End Title & Description -->

                <div class="d-grid d-sm-flex gap-3">
                    <a class="btn btn-primary btn-transition" href="#caseStudies">Case studies</a>
                    <a class="btn btn-link" href="#">Learn more <i class="bi-chevron-right small ms-1"></i></a>
                </div>
            </div>
            <!-- End Col -->

            <div class="col-md-6">
                <div class="w-100 bg-soft-primary rounded-2">
                    <img class="img-fluid rounded-2" src="{{ asset('images/network-devices.png') }}" alt="Image Description">
                </div>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
</div>
<!-- End Hero -->

<!-- JS Global Compulsory -->
<script src="{{ asset('themes/front/assets/vendor/bootstrap/dist/js/bootstrap.bundle.js') }}"></script>

<!-- JS Implementing Plugins -->
<script src="{{ asset('themes/front/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js') }}"></script>

<!-- JS Plugins Init. -->
<script>
    (function() {
        // INITIALIZATION OF MEGA MENU
        // =======================================================
        new HSMegaMenu('.js-mega-menu', {
            desktop: {
                position: 'left'
            }
        })
    })()
</script>
</body>
</html>
