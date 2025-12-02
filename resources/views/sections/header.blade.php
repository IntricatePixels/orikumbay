<nav class="navbar sticky-top p-0 w-100">
    <div class="container-fluid my-2 d-flex align-items-center">
        <div class="header-logo">
            @include('sections/header-logos')
        </div>
        <div class="d-none d-lg-flex ms-auto" id="navbarSupportedContent">
            @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu([
                'theme_location' => 'primary_navigation',
                'menu_class' => 'navbar-nav mb-2 mb-lg-0 d-flex',
                'echo' => false,
                'walker' => new Mobile_Nav_Walker(),
            ]) !!}
            @endif
        </div>
        <div class="d-none d-lg-flex align-items-center ms-4 gap-3 contact-icons ps-3 border-start">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-envelope"></i>
                <a href="mailto:info@example.com" class="text-decoration-none d-none d-xl-block">
                    info@example.com
                </a>
            </div>
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-telephone"></i>
                <a href="tel:+35569601580" class="text-decoration-none d-none d-xl-block">
                    +35569 6015802
                </a>
            </div>
        </div>
        <div class="d-flex align-items-center d-lg-none">
            <button class="navbar-toggler ms-3 p-1 collapsed border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</nav>
