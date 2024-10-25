
@if (get_row_layout() == 'manual_product_grid')
    @php
        $max_width_980 = '';

        if (get_sub_field('columns')) {
            $columns = get_sub_field('columns');
        } else {
            $columns = "col-md-4";
        }

        if ($columns === 'col-md-6') {
            $max_width_980 = 'max-width-980';
        }

        $column_padding = '';
        if ($columns === 'col-md-4') {
            $column_padding = 'pe-5';
        }
    @endphp

    <section class="block new block-products-grid in-page-section px-lg-4 px-4 px-md-0 pb-5 mb-5 {{ $max_width_980 }} py-5" id="product-grid-{{ get_row_index() }}" data-section-name="">
        <div class="container pb-5">
            <div class="col-12 mt-lg-5">
                <p class="hero-eyebrow">{{ the_sub_field('header_eyebrow') }}</p>
                <h2 class="mb-3 pt-0 mt-0 font-black text-center">{{ the_sub_field('header') }}</h2>
                <div class="text-center mb-5 py-3 max-width-600 mx-auto">{{ the_sub_field('subhead') }}</div>
            </div>
            <div class="row gx-5 gy-4">
                @if (have_rows('grid'))
                    @while (have_rows('grid'))
                        @php
                            the_row();
                            $image = get_sub_field('image');
                            $subtitle = get_sub_field('subtitle');
                            $subtext = get_sub_field('subtext');
                            $link = get_sub_field('link');
                        @endphp
                        <div class="col-12 col-md-6 col-lg-3 border-end-custom">
                            <div class="text-center py-lg-5 py-3 px-lg-3">
                                @if ($image)
                                    <img src="{{ esc_url($image['url']) }}" alt="{{ esc_attr($image['alt']) }}" class="product-block mb-0 size-product-block" loading="lazy" />
                                @endif
                                @if ($subtitle)
                                    <h2 class="prod-grid-title font-bold mt-4 mb-3 fs-5">{!! $subtitle !!}</h2>
                                @endif
                                @if ($subtext)
                                    <p class="p-0"><small>{!! $subtext !!}</small></p>
                                @endif
                                @if ($link)
                                    @php
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                    @endphp
                                    <a class="btn btn-link position-relative mt-2" href="@php echo esc_url( $link_url ) @endphp" target="@php echo esc_attr( $link_target ) @endphp">
                                        @php echo esc_html( $link_title ) @endphp
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endwhile
                @endif
            </div>
        </div>
    </section>
@endif
