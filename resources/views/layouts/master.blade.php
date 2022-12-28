<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>TimeNet Company</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

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

@yield('content')

@include('partial-components.footer')

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
        });
        HSBsDropdown.init();
    })()
</script>
</body>
</html>
