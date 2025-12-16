<div class="fixed-header-wrapper" style="position: fixed; top: 0; left: 0; right: 0; z-index: 1030; width: 100%; transition: transform 0.3s ease;">
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
                    <a href="tel:+355696015802" class="text-decoration-none" style="font-size: 0.875rem; color: white;">
                        +355696015802
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-download" style="font-size: 0.875rem; color: white;"></i>
                    <a href="/wp-content/uploads/2025/12/OOB-Booklet-EN.pdf" class="text-decoration-none" style="font-size: 0.875rem; color: white;" target="_blank">
                        Download Brochure
                    </a>
                </div>
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
            <button class="navbar-toggler ms-3 p-1 collapsed border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
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
                Download Brochure
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('Scroll animations initialized');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
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
    
    window.addEventListener('scroll', function() {
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