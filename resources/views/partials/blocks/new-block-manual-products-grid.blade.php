@if (get_row_layout() == 'manual_product_grid')
    @php
        $max_width_980 = '';
        $columns = get_sub_field('columns') ?: "col-md-4";
        if ($columns === 'col-md-6')
            $max_width_980 = 'max-width-980';
        $column_padding = $columns === 'col-md-4' ? 'pe-5' : '';
    @endphp

    <section data-animate="slide-up"
        class="block new block-products-grid in-page-section px-lg-4 px-4 px-md-0 pb-5 mb-0 {{ $max_width_980 }} py-5"
        id="product-grid-{{ get_row_index() }}" data-section-name="">
        <div class="container pb-5">
            <div class="col-12 mt-lg-5 text-center">
                <p class="hero-eyebrow">{{ the_sub_field('header_eyebrow') }}</p>
                <h2 class="mb-3 pt-0 mt-0 font-black text-center">{{ the_sub_field('header') }}</h2>
                <div class="text-center mb-5 py-3 max-width-600 mx-auto">{{ the_sub_field('subhead') }}</div>
            </div>

            <!-- HORIZONTAL GRID - 5 COLUMNS -->
            <div class="row gy-4 gx-4">
                @if (have_rows('grid'))
                    @while (have_rows('grid'))
                        @php
                            the_row();
                            $image = get_sub_field('image');
                            $subtitle = get_sub_field('subtitle');
                            $subtext = get_sub_field('subtext');
                            $link = get_sub_field('link');
                        @endphp

                        <!-- 1 col mobile, 2 col tablet, 5 col desktop -->
                        <div class="col-12 col-md-5 col-lg-4">
                            <div class="text-center">
                                <!-- Image -->
                                @if ($image)
                                    <div class="mb-3">
                                        <div class="floorplan">
                                            <img src="{{ esc_url($image['url']) }}" alt="{{ esc_attr($image['alt']) }}"
                                                class="img-fluid" loading="lazy" />
                                        </div>
                                    </div>
                                @endif

                                <!-- Text -->
                                @if ($subtitle)
                                    <h3 class="mb-2 fs-6 fw-bold">{!! $subtitle !!}</h3>
                                @endif

                                @if ($subtext)
                                    <p class="mb-2 small">{!! $subtext !!}</p>
                                @endif
                            </div>
                        </div>
                    @endwhile
                @endif
            </div>

            <!-- CTA BUTTON -->
            @php
                $cta_button = get_sub_field('link');
            @endphp
            @if ($cta_button)
                <div class="text-center mt-5 pt-3">
                    <a class="btn btn-brown right-arrow mt-0 position-relative" href="{{ esc_url($cta_button['url']) }}"
                        target="{{ esc_attr($cta_button['target'] ?: '_self') }}">
                        {{ esc_html($cta_button['title']) }}
                    </a>
                </div>
            @endif
        </div>
    </section>
@endif

<style>
    .col-lg-2-4 {
        flex: 0 0 calc(20% - 0.6rem);
    }

    .floorplan {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 250px;
        border-radius: 4px;
    }

    .floorplan img {
        max-width: 100%;
        max-height: 100%;
        height: auto;
        width: auto;
        object-fit: contain;
    }
</style>