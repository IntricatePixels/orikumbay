<footer class="pt-5 pb-4" style="background-color: #e8e3de;">
    <div class="container">
        <div class="row">
            <!-- Logo & Social Icons Column -->
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 text-start">
                <div class="mb-4 d-flex justify-content-start">
                    @if (has_custom_logo())
                        {!! get_custom_logo() !!}
                    @else
                        <img src="{{ get_theme_mod('kube_logo') }}" alt="{{ get_bloginfo('name') }}"
                            style="height: 50px; width: auto;">
                    @endif
                </div>
                <div class="social-icons">
                    <!-- <a href="#" class="text-dark" title="Instagram">
                        <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                    </a>
                    <a href="#" class="text-dark" title="Facebook">
                        <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                    </a> -->
                    <p class="mb-0 lh-sm">Developed & Constructed by <a href="https://brunes.al" target="_blank"
                            title="Brunes Construction">Brunes Construction</a></p>
                    <div class="mt-4"><a href="https://brunes.al" target="_blank" title="Brunes Construction">
                            <img src="@asset('images/brunes-construction-logo-black3.png')" alt="Brunes Construction"
                                style="height: 40px; width: auto;">
                        </a></div>
                </div>
            </div>

            <!-- Main Menu Column -->
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="mb-3 fw-normal" style="color: #6b645e;">Explore</h5>
                @if (has_nav_menu('primary_navigation'))
                                {!! wp_nav_menu([
                        'theme_location' => 'primary_navigation',
                        'menu_class' => 'list-unstyled',
                        'container' => false,
                        'echo' => false,
                        'depth' => 1,
                        'link_before' => '<li class="mb-0">',
                        'link_after' => '</li>',
                        'fallback_cb' => false,
                    ]) !!}
                @endif
                <style>
                    #footer-menu a {
                        color: #6b645e !important;
                        text-decoration: none !important;
                    }

                    #footer-menu a:hover {
                        text-decoration: underline !important;
                    }
                </style>
            </div>

            <!-- Location Column -->
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="mb-3 fw-normal" style="color: #6b645e;">One Oricum Bay</h5>
                <p style="color: #6b645e;">Rruga Pashaliman</p>
                <p style="color: #6b645e;">Orikum, Shqiperi</p>
            </div>

            <!-- Contact Column -->
            <div class="col-lg-3 col-md-6">
                <h5 class="mb-3 fw-normal" style="color: #6b645e;">Contact</h5>
                <p style="color: #6b645e;">+355696015802</p>
                <p style="color: #6b645e;">info@brunesconstruction.al</p>
            </div>
        </div>
    </div>
</footer>