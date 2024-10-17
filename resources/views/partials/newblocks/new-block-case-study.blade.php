@if (get_row_layout() == 'case_study')

    @php
        $header = get_sub_field('header');
        $image = get_sub_field('image');
        $description = get_sub_field('description');
        $swap_sides = get_sub_field('swap_sides');
        $background_color = get_sub_field('background_color');
    @endphp

    <section class="block-image-with-list in-page-section bg-lighter px-lg-4 px-4 px-md-0 py-5" id="list-{{ get_row_index() }}" data-section-name="">
        <div class="container">
            <div class="row g-5">
                <div
                    class="col-12 col-lg-6 py-5 text-center @if ($swap_sides) order-lg-2 ps-lg-5 @else order-lg-1 pe-lg-5 ps-lg-0 @endif">
                    @if ($image)
                        <img width="468" height="442" src="{{ esc_url($image['url']) }}" alt="{{ esc_attr($image['alt']) }}" loading="lazy" />
                    @endif
                </div>
                <div
                    class="col-12 col-lg-6 d-flex align-self-center flex-column mt-lg-5 mt-0 @if ($swap_sides) order-lg-1 @else order-lg-2 @endif">
                    <h2 class="hero-eyebrow text-start pb-3">{{ the_sub_field('eyebrow') }}</h2>
                    <h3 class="font-black fs-1 pb-4 pe-lg-5 me-lg-5">{{ the_sub_field('header') }}</h3>
                    <div
                        class="pb-3 @if ($count > 1) ps-5 border-dotted @if (get_row_index() === 1) border-blue @endif @endif">
                        <div class="fs-5 pe-lg-5 me-lg-5 mb-2">{{ $description }}</div>

                        <div class="mx-auto">
                            @php
                                $link = get_sub_field('link');
                            @endphp
                            @if ($link)
                                @php
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                @endphp
                                <a class="btn btn-white-blue mt-4 px-5" href="@php echo esc_url( $link_url ) @endphp"
                                    target="@php echo esc_attr( $link_target ) @endphp">
                                    @php echo esc_html( $link_title ) @endphp
                                </a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
