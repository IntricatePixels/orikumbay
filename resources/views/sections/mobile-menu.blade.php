<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
<div class="offcanvas-header pt-5">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Main Menu</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
    <div class="offcanvas-body d-flex flex-column p-3">
        <div class="flex-fill">
            @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
                    'echo' => false,
                    'walker' => new Mobile_Nav_Walker(),
                ]) !!}
            @endif
        </div>
    </div>
</div>
