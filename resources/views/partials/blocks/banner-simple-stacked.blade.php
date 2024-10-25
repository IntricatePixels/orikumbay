@if (get_row_layout() == 'banner_simple_stacked')
@php
    $background_image = get_sub_field('background_image');
    $image = get_sub_field('image');
    $size = 'full';
    $link = get_sub_field('link');
@endphp
<section class="banner-simple-stacked in-page-section vh-100 d-flex align-items-end position-relative bg-white px-4" id="banner-simple-@php echo get_row_index() @endphp">
    <div class="position-absolute top-0 start-0 w-100 object-fit-cover" style="
        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.01), white 100%), url(<?php echo $background_image; ?>);
        background-size: cover;
        background-position: top center;
        height: 300px; /* Adjust the height as needed */
        position: relative;">
    </div>

    <div class="container p-5">
        <div class="row z-1 max-width-600 mx-auto">
            <div class="col-12 text-center" style="z-index: inherit;">
                @if ($image)
                    <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
                @endif
            </div>
            <div class="col-12 text-center">
                <h2 class="text-center text-brown pt-5 pb-3 position-relative mx-auto">{{ the_sub_field('title') }}</h2>
                <div class="text-center pb-3 pb-lg-4 position-relative mx-auto">{{ the_sub_field('text') }}</div>
                 @if ($link)
                      @php
                          $link_url = $link['url'];
                          $link_title = $link['title'];
                          $link_target = $link['target'] ? $link['target'] : '_self';
                      @endphp
                      <a class="btn btn-gray right-arrow mt-0 position-relative mb-5" href="@php echo esc_url( $link_url ) @endphp"
                          target="@php echo esc_attr( $link_target ) @endphp">
                          @php echo esc_html( $link_title ) @endphp
                      </a>
                  @endif
            </div>
        </div>
    </div>
</section>

@endif
