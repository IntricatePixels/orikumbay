@if (get_row_layout() == 'banner_simple_stacked')
    @php
        $background_image = get_sub_field('background_image');
        $image = get_sub_field('image');
        $size = 'full';
        $link = get_sub_field('link');
        $rounded_corner = get_sub_field('rounded_corner');
    @endphp
    <section data-animate="slide-up"
        class="banner-simple-stacked px-4 py-5 @if ($rounded_corner) rounded-corner-bottom @endif"
        id="banner-simple-stacked-@php echo get_row_index() @endphp" style="
                            background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.01), white 100%), url(<?php    echo $background_image; ?>);
                            background-size: contain;
                            background-repeat: no-repeat;">
        <div class="container max-width-600">
            <div class="row pt-5">
                <div class="col-12">
                    @if ($image)
                        <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
                    @endif
                </div>
                <div class="col-12 text-center">
                    <h2 class="text-center text-brown pt-5 position-relative mx-auto">{{ the_sub_field('title') }}</h2>
                    <div class="text-center pb-5 position-relative mx-auto">{{ the_sub_field('text') }}</div>
                    @if ($link)
                        @php
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                          @endphp
                        <a class="btn btn-brown right-arrow mt-0 position-relative" href="@php echo esc_url($link_url) @endphp"
                            target="@php echo esc_attr($link_target) @endphp">
                            @php echo esc_html($link_title) @endphp
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endif