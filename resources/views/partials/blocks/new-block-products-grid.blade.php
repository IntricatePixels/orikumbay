@if (get_row_layout() == 'product_grid')
    @if (get_sub_field('button'))
        @php $link = get_sub_field('button') @endphp
        @if ($link)
            @php
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            @endphp
        @endif
    @endif
    <section class="block new gradient in-page-section block-products-grid px-4 px-md-0 py-5" id="product-grid-{{ get_row_index() }}" data-section-name="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-3 pt-3" data-title="{{ the_sub_field('behind_header_text') }}">
                        {{ the_sub_field('heading') }}</h2>
                    <div class="block-subheader mb-5">{{ the_sub_field('subtext') }}</div>
                </div>
                @php $featured_posts = get_sub_field('product_grid_grid') @endphp
                @if ($featured_posts)
                    @foreach ($featured_posts as $featured_post)
                        @php
                            $fpid = $featured_post->ID;
                            $permalink = get_permalink($fpid);
                            $title = get_the_title($fpid);
                            $excerpt = get_the_excerpt($fpid);
                        @endphp
                        <div class="col-lg-4 mb-4">
                            <div style="cursor: pointer;"
                                onclick="window.location.href='{{ esc_url($permalink) }}'">
                                @php echo get_the_post_thumbnail($fpid, 'product-block', ['loading' => 'lazy']) @endphp
                                <div class="text-center py-2">
                                    <p class="prod-grid-title font-bold my-2">{{ esc_html($title) }}</p>
                                    <p>{{ esc_html($excerpt) }}</p>
                                    <div class="btn btn-brown">{{ esc_html($title) }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="learn-more-btn d-flex align-items-center">
                <a class="mt-5 mx-auto btn btn-brown-gradient" href="{{ esc_url($link_url) }}"
                    target="{{ esc_attr($link_target) }}">{{ esc_html($link_title) }}</a>
            </div>
        </div>
    </section>
@endif
