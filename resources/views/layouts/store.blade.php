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
    <link rel="stylesheet" href="{{ asset('themes/front/assets/vendor/swiper/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/front/assets/vendor/bootstrap-icons/font/bootstrap-icons.css') }}">

    <style>
        .swiper-thumb-progress .swiper-thumb-progress-path {
            stroke: #21325b !important;
        }

        .input-card-pill {
            border-radius: unset;
        }

        input[type="checkbox"] {
            filter: sepia(100%) brightness(80%) hue-rotate(170deg) saturate(70%) contrast(300%);
        }

        .pagination .active span {
            background-color: #21325b;
        }

    </style>


    @livewireStyles
</head>

<body>

@include('partial-components.header-store')

@yield('content')

@include('partial-components.footer')

<!-- JS Global Compulsory -->
<script src="{{ asset('themes/front/assets/vendor/bootstrap/dist/js/bootstrap.bundle.js') }}"></script>

<!-- JS Implementing Plugins -->
<script src="{{ asset('themes/front/assets/vendor/hs-mega-menu/dist/hs-mega-menu.min.js') }}"></script>
<script src="{{ asset('themes/front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- JS Plugins Init. -->
<script>
    (function () {
        var sliderThumbs = new Swiper('.js-swiper-shop-hero-thumbs', {
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            history: false,
            slidesPerView: 3,
            spaceBetween: 15,
            on: {
                beforeInit: (swiper) => {
                    const css = `.swiper-slide-thumb-active .swiper-thumb-progress .swiper-thumb-progress-path {
                opacity: 1;
                -webkit-animation: ${swiper.originalParams.autoplay.delay}ms linear 0ms forwards swiperThumbProgressDash;
                animation: ${swiper.originalParams.autoplay.delay}ms linear 0ms forwards swiperThumbProgressDash;
            }`
                    style = document.createElement('style')
                    document.head.appendChild(style)
                    style.type = 'text/css'
                    style.appendChild(document.createTextNode(css));

                    swiper.el.querySelectorAll('.js-swiper-thumb-progress')
                        .forEach(slide => {
                            slide.insertAdjacentHTML('beforeend', '<span class="swiper-thumb-progress"><svg version="1.1" viewBox="0 0 160 160"><path class="swiper-thumb-progress-path" d="M 79.98452083651917 4.000001576345426 A 76 76 0 1 1 79.89443752470656 4.0000733121155605 Z"></path></svg></span>')
                        })
                },
            },
        });
        var swiper = new Swiper('.js-swiper-shop-classic-hero', {
            autoplay: true,
            loop: true,
            navigation: {
                nextEl: '.js-swiper-shop-classic-hero-button-next',
                prevEl: '.js-swiper-shop-classic-hero-button-prev',
            },
            thumbs: {
                swiper: sliderThumbs,
                color: 'red'
            }
        });

    })()
</script>

@livewireScripts

</body>
</html>
