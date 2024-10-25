@if (get_row_layout() == 'banner_simple_right_side_label')
@php
    $icon_image = get_sub_field('icon_image');
    $title = get_sub_field('title');
    $description = get_sub_field('description');
    $background_image = get_sub_field('background_image');
    $link = get_sub_field('link');
@endphp
<section id="hero-section" class="banner-pillar in-page-section position-relative vh-100 d-flex align-items-end justify-content-end">
    @if ($background_image)
        <img src="{{ $background_image['url'] }}" alt="{{ $background_image['alt'] }}" class="position-absolute top-0 start-0 w-100 vh-100 object-fit-cover">
    @endif
    <div class="z-1 max-width-600 d-flex align-items-center justify-content-end p-5" style="background-color: rgba(242, 237, 233, 0.9); border-top-left-radius: 130px; height: auto;">
        <div class="text-center ">
            @if ($icon_image)
                <img src="{{ $icon_image['url'] }}" alt="{{ $icon_image['alt'] }}" class="pb-3" style="width: 80px;">
            @endif
            <h2 class="mb-3 mb-lg-4 position-relative w-100 mx-auto d-flex flex-column">{!! $title !!}</h2>
            <p class="mb-5">
                {!! $description !!}
            </p>
            @if ($link)
                @php
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                @endphp
                <a class="btn btn-gray right-arrow mt-0 position-relative" href="@php echo esc_url( $link_url ) @endphp"
                    target="@php echo esc_attr( $link_target ) @endphp">
                    @php echo esc_html( $link_title ) @endphp
                </a>
            @endif
        </div>
    </div>    
</section>
@endif