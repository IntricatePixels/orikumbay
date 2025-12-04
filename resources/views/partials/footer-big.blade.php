<footer class="pt-5 pb-4" style="background-color: #e8e3de;">
    <div class="container">
        <div class="row">
            <!-- Logo & Social Icons Column -->
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="footer-logo mb-4 text-start">
                    @if (has_custom_logo())
                        <div style="max-width: 150px; margin: 0;">
                            {!! get_custom_logo() !!}
                        </div>
                    @else
                        <img src="{{ get_theme_mod('kube_logo') }}" alt="{{ get_bloginfo('name') }}" style="max-height: 60px; display: block;">
                    @endif
                </div>
                <div class="social-icons d-flex gap-3">
                    <a href="#" class="text-dark" title="Instagram">
                        <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                    </a>
                    <a href="#" class="text-dark" title="Facebook">
                        <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                    </a>
                </div>
            </div>

            <!-- Explore Column -->
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <h5 class="mb-3 fw-normal" style="color: #6b645e;">Explore</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/about-us" class="text-decoration-none" style="color: #6b645e;">About Us</a></li>
                    <li class="mb-2"><a href="/contact" class="text-decoration-none" style="color: #6b645e;">Contact</a></li>
                    <li class="mb-2"><a href="/news" class="text-decoration-none" style="color: #6b645e;">News</a></li>
                    <li class="mb-2"><a href="/faq" class="text-decoration-none" style="color: #6b645e;">FAQ</a></li>
                    <li class="mb-2"><a href="/services" class="text-decoration-none" style="color: #6b645e;">Our Services</a></li>
                </ul>
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
                <p style="color: #6b645e;">+35569601580</p>
                <p style="color: #6b645e;">info@brunesconstruction.al</p>
            </div>
        </div>
    </div>
</footer>
