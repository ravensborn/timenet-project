<header id="header" class="py-3 navbar navbar-expand-lg navbar-end navbar-dark navbar-absolute-top navbar-shadow">

    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">

            <a class="navbar-brand" href="{{ route('home') }}" aria-label="Front">
                <h3 class="text-white">TimeNet ISP</h3>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-default">
          <i class="bi-list"></i>
        </span>
                <span class="navbar-toggler-toggled">
          <i class="bi-x"></i>
        </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    @php $menu = \App\Models\Menu::where('code', 'homepage_menu')->first(); @endphp
                    @include('partial-components.menu', ['items' => $menu['items']])

                </ul>
            </div>

        </nav>
    </div>
</header>
