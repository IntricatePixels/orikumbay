@if (get_row_layout() == 'banner_simple')
    @php
        $background_image = get_sub_field('background_image');
        $size = 'full';
        $video_embed = get_sub_field('video_embed');
        $gallery_images = get_sub_field('gallery'); // ACF Gallery field
    @endphp
    <section class="banner-simple in-page-section position-relative vh-100 d-flex align-items-end pb-5 px-4" id="banner-simple-@php echo get_row_index() @endphp">
        @if ($background_image)
            <img src="{{ $background_image['url'] }}" alt="{{ $background_image['alt'] }}" class="position-absolute top-0 start-0 w-100 object-fit-cover" style="border-bottom-right-radius: 130px; top: -180px !important; height: calc(100vh + 180px) !important">
        @endif
        @if ($video_embed)
            <video style="width: 100vw; height: 100vh; object-fit: cover;" id="hero-video" class="video-bg" autoplay loop
                muted playsinline onplay="hideBackgroundImage()">
                <source src="{{ $video_embed }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        @endif
        <h2 class="text-white text-center pb-3 pb-lg-4 position-relative mx-auto">{{ the_sub_field('hero_title') }}</h2>
    </section>
    <script>
        function hideBackgroundImage() {
            var backgroundImage = document.getElementById('hero-background');
            if (backgroundImage) {
                backgroundImage.style.display = 'none';
            }
        }
    </script>
@endif