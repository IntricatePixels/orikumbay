@if (get_row_layout() == 'banner_simple')
    @php
        $background_image = get_sub_field('background_image');
        $size = 'full';
        $video_embed = get_sub_field('video_embed');
        $gallery_images = get_sub_field('gallery');
        $button = get_sub_field('button');
    @endphp
    <section class="banner-simple in-page-section position-relative d-flex align-items-end justify-content-center pb-5 px-4"
        id="banner-simple-@php echo get_row_index() @endphp" style="height: 100vh; min-height: 100svh;">
        @if ($background_image)
            <img src="{{ $background_image['url'] }}" alt="{{ $background_image['alt'] }}"
                class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover banner-simple-img"
                style="border-bottom-right-radius: 130px;">
        @endif
        @if ($video_embed)
            <video style="width: 100vw; height: 100vh; object-fit: cover; position: absolute; top: 0; left: 0;" id="hero-video"
                class="video-bg" autoplay loop muted playsinline onplay="hideBackgroundImage()">
                <source src="{{ $video_embed }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        @endif
        <div class="position-absolute bottom-0 start-0 w-100"
            style="height: 50%; background: linear-gradient(to bottom, rgba(107,100,94,0), rgba(107,100,94,1)); z-index: 5;">
        </div>
        <div class="w-100 d-flex flex-column align-items-center position-relative" style="z-index: 10;">
            <h2 class="text-white text-center pb-5 m-0">{{ the_sub_field('hero_title') }}</h2>
            @if ($button)
                @php
                    $link_url = $button['url'];
                    $link_title = $button['title'];
                    $link_target = $button['target'] ? $button['target'] : '_self';
                @endphp
                <a class="btn btn-brown right-arrow mt-0 mb-2" href="@php echo esc_url($link_url) @endphp"
                    target="@php echo esc_attr($link_target) @endphp">
                    @php echo esc_html($link_title) @endphp
                </a>
            @endif
        </div>
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