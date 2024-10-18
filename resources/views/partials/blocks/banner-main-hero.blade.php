@if (get_row_layout() == 'banner_main_hero')
@php
$background_image = get_sub_field('background_image');
$size = 'full';
$video_embed = get_sub_field('video_embed');
$gallery_images = get_sub_field('gallery'); // ACF Gallery field
@endphp

<section id="hero-section" class="banner-pillar in-page-section position-relative vh-100 d-flex align-items-center">
    @if ($background_image)
    <img src="{{ $background_image['url'] }}" alt="{{ $background_image['alt'] }}" class="position-absolute top-0 start-0 w-100 vh-100 object-fit-cover" id="hero-background" style="border-top-left-radius: 130px;">
    @endif
    @if ($gallery_images)
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-pause="false">
        <div class="carousel-inner">
            @foreach ($gallery_images as $index => $image)
            @php
            $image_url = $image['url'];
            $active_class = $index == 0 ? 'active' : '';
            @endphp
            <div class="carousel-item {{ $active_class }}" data-bs-interval="2000">
                <img src="{{ $image_url }}" class="d-block w-100 vh-100 object-fit-cover" alt="Slide Image">
            </div>
            @endforeach
        </div>
    </div>
    @elseif ($video_embed)
    <video style="width: 100vw; height: 100vh; object-fit: cover;" id="hero-video" class="video-bg" autoplay loop muted playsinline onplay="hideBackgroundImage()">
        <source src="{{ $video_embed }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    @endif
    <h1 class="text-white text-center mb-3 mb-lg-4 m-md-0 position-relative w-100">{{ the_sub_field('hero_title') }}
    </h1>
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
