<div class="top-contact-bar py-2 d-none d-lg-block" style="background-color: #6b645e;">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-end gap-4 contact-icons">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-envelope" style="font-size: 0.875rem; color: white;"></i>
                <a href="mailto:info@brunesconstruction.al" class="text-decoration-none" style="font-size: 0.875rem; color: white;">
                    info@brunesconstruction.al
                </a>
            </div>
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-telephone" style="font-size: 0.875rem; color: white;"></i>
                <a href="tel:+35569601580" class="text-decoration-none" style="font-size: 0.875rem; color: white;">
                    +35569 6015802
                </a>
            </div>
        </div>
    </div>
</div>

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
        <div class="d-flex align-items-center d-lg-none">
            <button class="navbar-toggler ms-3 p-1 collapsed border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Navigation menu content here -->
    </div>
    <div class="offcanvas-footer border-top p-3">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-telephone"></i>
            <a href="tel:+35569601580" class="text-decoration-none">
                +35569 6015802
            </a>
        </div>
    </div>
</div>
