@if (get_row_layout() == 'manual_product_grid')
    @php
        $max_width_980 = '';
        $columns = get_sub_field('columns') ?: "col-md-4";
        if ($columns === 'col-md-6') $max_width_980 = 'max-width-980';
        $column_padding = $columns === 'col-md-4' ? 'pe-5' : '';
    @endphp

    <section class="block new block-products-grid in-page-section px-lg-4 px-4 px-md-0 pb-5 mb-5 {{ $max_width_980 }} py-5" id="product-grid-{{ get_row_index() }}" data-section-name="">
        <div class="container pb-5">
            <div class="col-12 mt-lg-5 text-center">
                <p class="hero-eyebrow">{{ the_sub_field('header_eyebrow') }}</p>
                <h2 class="mb-3 pt-0 mt-0 font-black text-center">{{ the_sub_field('header') }}</h2>
                <div class="text-center mb-5 py-3 max-width-600 mx-auto">{{ the_sub_field('subhead') }}</div>
            </div>

            <!-- FULL-WIDTH ROW LIST -->
            <div class="row gy-4">
                @if (have_rows('grid'))
                    @while (have_rows('grid'))
                        @php
                            the_row();
                            $image    = get_sub_field('image');
                            $subtitle = get_sub_field('subtitle');
                            $subtext  = get_sub_field('subtext');
                            $link     = get_sub_field('link');
                        @endphp

                        <!-- Each card takes the full width -->
                        <div class="col-12">
                            <div class="d-flex flex-column flex-md-row align-items-start gap-4 py-4 px-3 border-bottom">
                                <!-- Left: Image -->
                                @if ($image)
                                    <div class="flex-shrink-0 w-100 w-md-auto" style="width: 260px;">
                                        <div class="floorplan">

                                        <img
                                            src="{{ esc_url($image['url']) }}"
                                            alt="{{ esc_attr($image['alt']) }}"
                                            class="img-fluid d-block"
                                            loading="lazy"
                                        />
                                        </div>
                                    </div>
                                @endif>

                                <!-- Right: Text -->
                                <div class="flex-grow-1 text-start">
                                    @if ($subtitle)
                                        <h3 class="mb-2 fs-5 fw-bold">{!! $subtitle !!}</h3>
                                    @endif

                                    @if ($subtext)
                                        <p class="mb-0"><small>{!! $subtext !!}</small></p>
                                    @endif

                                    @if ($link)
                                        @php
                                            $link_url   = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                        @endphp
                                        <a class="btn btn-link mt-2 px-0"
                                           href="@php echo esc_url($link_url) @endphp"
                                           target="@php echo esc_attr($link_target) @endphp">
                                           @php echo esc_html($link_title) @endphp
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endwhile
                @endif
            </div>
        </div>
    </section>
@endif

<style>

    .floorplan img {
  max-width: 100%;
  max-height: 300px;
  height: auto;
  object-fit: contain;
}

</style>