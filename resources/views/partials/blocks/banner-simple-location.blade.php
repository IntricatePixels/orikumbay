@if (get_row_layout() == 'banner_simple_location')
@php
$background_image = get_sub_field('background_image');
$icon_image = get_sub_field('icon_image');
$right_side_image_1 = get_sub_field('right_side_image_1');
$right_side_image_2 = get_sub_field('right_side_image_2');
$size = 'full';
$video_embed = get_sub_field('video_embed');
$link = get_sub_field('link');

@endphp
<section class="banner-simple-location px-4 py-5 bg-white" id="banner-location-@php echo get_row_index() @endphp" style="
        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.01), white 100%), url(<?php echo $background_image; ?>);
        background-size: contain;
        background-repeat: no-repeat;">
    <div class="container">
        <div class="row {{ !empty($background_image) ? 'location-text' : '' }} py-5">
            <div class="col-12 col-lg-6 text-center pe-lg-5">
                @if ($icon_image)
                <img src="{{ $icon_image['url'] }}" alt="{{ $icon_image['alt'] }}" class="pb-3" style="width: 80px;">
                @endif
                <h2 class="text-center text-brown py-3 pb-lg-4 position-relative mx-auto">{{ the_sub_field('title') }}</h2>
                <div class="text-center pb-3 pb-lg-4 position-relative mx-auto">{{ the_sub_field('text') }}</div>
                 @if ($link)
                      @php
                          $link_url = $link['url'];
                          $link_title = $link['title'];
                          $link_target = $link['target'] ? $link['target'] : '_self';
                      @endphp
                      <a class="btn btn-brown right-arrow mt-0 position-relative" href="@php echo esc_url( $link_url ) @endphp"
                          target="@php echo esc_attr( $link_target ) @endphp">
                          @php echo esc_html( $link_title ) @endphp
                      </a>
                  @endif
            </div>
            <div class="col-12 col-lg-6 d-grid gap-2" style="grid-template-columns: repeat(2, 1fr);">
                @if ($right_side_image_1)
                <img src="{{ $right_side_image_1['url'] }}" alt="{{ $right_side_image_1['alt'] }}" class="img-fluid">
                @endif
                @if ($right_side_image_2)
                <img src="{{ $right_side_image_2['url'] }}" alt="{{ $right_side_image_2['alt'] }}" class="img-fluid">
                @endif
            </div>
        </div>
        </div>
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
