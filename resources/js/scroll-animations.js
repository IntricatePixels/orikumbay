document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all elements with animation classes
    document.querySelectorAll('[data-animate]').forEach(el => {
        observer.observe(el);
    });

    // Parallax effect
    window.addEventListener('scroll', function() {
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
