<div class="fixed-header-wrapper"
    style="position: fixed; top: 0; left: 0; right: 0; z-index: 1030; width: 100%; transition: transform 0.3s ease;">
    <div class="top-contact-bar py-2 d-none d-lg-block" style="background-color: #6b645e;">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-end gap-4 contact-icons">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-envelope" style="font-size: 0.875rem; color: white;"></i>
                    <a href="mailto:info@brunesconstruction.al" class="text-decoration-none"
                        style="font-size: 0.875rem; color: white;">
                        info@brunesconstruction.al
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-telephone" style="font-size: 0.875rem; color: white;"></i>
                    <a href="tel:+355696015802" class="text-decoration-none" style="font-size: 0.875rem; color: white;">
                        +355696015802
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-download" style="font-size: 0.875rem; color: white;"></i>
                    <a href="/wp-content/uploads/2025/12/OOB-Booklet-EN.pdf" class="text-decoration-none"
                        style="font-size: 0.875rem; color: white;" target="_blank">
                        {{ get_current_blog_id() == 2 ? 'Shkarko Broshurën' : 'Download Brochure' }}
                    </a>
                </div>
                @php
                    $currentPath = $_SERVER['REQUEST_URI'] ?? '/';
                    $isAlbanian = str_starts_with($currentPath, '/al');
                @endphp
                <div class="language-dropdown">
                    <button class="lang-dropdown-toggle" type="button">
                        <span class="lang-flag">{{ $isAlbanian ? '🇦🇱' : '🇬🇧' }}</span>
                        <span>{{ $isAlbanian ? 'AL' : 'EN' }}</span>
                        <i class="bi bi-chevron-down lang-chevron"></i>
                    </button>
                    <div class="lang-dropdown-menu">
                        <a href="/" class="lang-option {{ !$isAlbanian ? 'active' : '' }}">
                            <span class="lang-flag">🇬🇧</span>
                            <span class="lang-name">English</span>
                            @if(!$isAlbanian)<i class="bi bi-check2"></i>@endif
                        </a>
                        <a href="/al/" class="lang-option {{ $isAlbanian ? 'active' : '' }}">
                            <span class="lang-flag">🇦🇱</span>
                            <span class="lang-name">Shqip</span>
                            @if($isAlbanian)<i class="bi bi-check2"></i>@endif
                        </a>
                    </div>
                </div>
                <style>
                    .language-dropdown {
                        position: relative;
                    }

                    .lang-dropdown-toggle {
                        display: flex;
                        align-items: center;
                        gap: 0.375rem;
                        background: transparent;
                        border: 1px solid rgba(255, 255, 255, 0.3);
                        border-radius: 4px;
                        padding: 0.35rem 0.625rem;
                        color: white;
                        font-size: 0.8125rem;
                        cursor: pointer;
                        transition: all 0.2s ease;
                    }

                    .lang-dropdown-toggle:hover {
                        background: rgba(255, 255, 255, 0.1);
                        border-color: rgba(255, 255, 255, 0.5);
                    }

                    .lang-chevron {
                        font-size: 0.625rem;
                        transition: transform 0.2s ease;
                    }

                    .language-dropdown:hover .lang-chevron {
                        transform: rotate(180deg);
                    }

                    .lang-dropdown-menu {
                        position: absolute;
                        top: calc(100% + 0.5rem);
                        right: 0;
                        min-width: 140px;
                        background: white;
                        border-radius: 6px;
                        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
                        opacity: 0;
                        visibility: hidden;
                        transform: translateY(-8px);
                        transition: all 0.2s ease;
                        overflow: hidden;
                        z-index: 9999;
                    }

                    .language-dropdown:hover .lang-dropdown-menu {
                        opacity: 1;
                        visibility: visible;
                        transform: translateY(0);
                    }

                    .lang-option {
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                        padding: 0.625rem 0.875rem;
                        color: #333;
                        text-decoration: none;
                        font-size: 0.8125rem;
                        transition: background 0.15s ease;
                    }

                    .lang-option:hover {
                        background: #f5f5f5;
                        color: #333;
                    }

                    .lang-option.active {
                        background: #f9f9f9;
                    }

                    .lang-option .lang-code {
                        font-weight: 600;
                        min-width: 1.5rem;
                    }

                    .lang-option .lang-name {
                        flex: 1;
                        color: #666;
                    }

                    .lang-option .bi-check2 {
                        color: #6b645e;
                        font-size: 0.875rem;
                    }

                    .top-contact-bar {
                        overflow: visible !important;
                    }

                    .top-contact-bar .container-fluid {
                        overflow: visible !important;
                    }

                    .contact-icons {
                        overflow: visible !important;
                    }
                </style>
            </div>
        </div>
    </div>

    <nav class="navbar sticky-top p-0 w-100" style="background-color: #f2edea;">
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
                <button class="navbar-toggler ms-3 p-1 collapsed border-0" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu([
                'theme_location' => 'primary_navigation',
                'menu_class' => 'navbar-nav d-flex flex-column',
                'echo' => false,
                'walker' => new Mobile_Nav_Walker(),
                'container_class' => 'offcanvas-nav-menu',
                'link_before' => '<span style="font-size: 1rem;">',
                'link_after' => '</span>',
            ]) !!}
        @endif
    </div>
    <div class="offcanvas-footer border-top p-3">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-envelope"></i>
            <a href="mailto:info@brunesconstruction.al" class="text-decoration-none">
                info@brunesconstruction.al
            </a>
        </div>
        <div class="d-flex align-items-center gap-2 mt-2">
            <i class="bi bi-telephone"></i>
            <a href="tel:+355696015802" class="text-decoration-none">
                +355696015802
            </a>
        </div>
        <div class="d-flex align-items-center gap-2 mt-2">
            <i class="bi bi-download"></i>
            <a href="/wp-content/uploads/2025/12/OOB-Booklet-EN.pdf" class="text-decoration-none" target="_blank">
                {{ get_current_blog_id() == 2 ? 'Shkarko Broshurën' : 'Download Brochure' }}
            </a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log('Scroll animations initialized');

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    console.log('Animating in:', entry.target);
                    entry.target.classList.add('animate-in');
                } else {
                    console.log('Animating out:', entry.target);
                    entry.target.classList.remove('animate-in');
                }
            });
        }, observerOptions);

        document.querySelectorAll('[data-animate]').forEach(el => {
            observer.observe(el);
        });

        // Hide/show header on scroll
        let lastScrollTop = 0;
        const header = document.querySelector('.fixed-header-wrapper');

        window.addEventListener('scroll', function () {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop && scrollTop > 100) {
                // Scrolling down & past 100px
                header.style.transform = 'translateY(-100%)';
            } else {
                // Scrolling up
                header.style.transform = 'translateY(0)';
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;

            // Parallax
            document.querySelectorAll('[data-parallax]').forEach(el => {
                const scrollPosition = window.scrollY;
                const elementOffset = el.offsetTop;
                const distance = scrollPosition - elementOffset;
                const parallaxSpeed = el.getAttribute('data-parallax') || 0.5;

                if (distance > -window.innerHeight && distance < window.innerHeight) {
                    el.style.transform = `translateY(${distance * parallaxSpeed}px)`;
                }
            });
        });
    });
</script>