<div class="offcanvas offcanvas-end offcanvas-menu" tabindex="-1" id="offcanvasmenu">
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
