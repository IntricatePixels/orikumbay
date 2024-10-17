@if (get_row_layout() == 'full_width_cta')
    <section class="full-width-cta-block mb-0" style="background-color:@php the_sub_field('background_colour') @endphp" id="full-width-cta-@php echo get_row_index() @endphp">
        <div class="container-fluid p-0">
            <div class="row align-items-center">
                <div
                    @if (get_sub_field('swap_sides')) class="col-lg-6 order-2 py-5" @else class="col-lg-6 order-2 order-lg-1 py-5" @endif>
                    <div class="quarter-text px-5">
                        @if (get_sub_field('header'))
                            <h2 class="mb-0">
                                @php the_sub_field('header') @endphp
                            </h2>
                        @endif
                        @if (get_sub_field('sub_header'))
                            <div class="subhead">@php the_sub_field('sub_header')@endphp</div>
                        @endif
                        @if (get_sub_field('subtext'))
                            <div class="my-4"> @php the_sub_field('subtext') @endphp</div>
                        @endif
                        @php $link = get_sub_field('button') @endphp
                        @if ($link)
                            @php
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            @endphp
                            <a class="btn btn-brown-gradient" href="@php echo esc_url($link_url) @endphp"
                                target="@php echo esc_attr($link_target) @endphp">@php echo esc_html($link_title) @endphp</a>
                        @endif
                        @php $link2 = get_sub_field('button_2') @endphp
                        @if ($link2)
                            @php
                                $link_url = $link2['url'];
                                $link_title = $link2['title'];
                                $link_target = $link2['target'] ? $link2['target'] : '_self';
                            @endphp
                            <a class="ms-2 btn btn-brown-gradient" href="@php echo esc_url($link_url) @endphp"
                                target="@php echo esc_attr($link_target) @endphp">@php echo esc_html($link_title) @endphp</a>
                        @endif
                        @php $link3 = get_sub_field('button_3') @endphp
                        @if ($link3)
                            @php
                                $link_url = $link3['url'];
                                $link_title = $link3['title'];
                                $link_target = $link3['target'] ? $link3['target'] : '_self';
                            @endphp
                            <br>
                            <a class="ms-0 mt-2 btn btn-brown-gradient" href="@php echo esc_url($link_url) @endphp"
                                target="@php echo esc_attr($link_target) @endphp">@php echo esc_html($link_title) @endphp</a>
                        @endif
                        @php $link4 = get_sub_field('button_4') @endphp
                        @if ($link4)
                            @php
                                $link_url = $link4['url'];
                                $link_title = $link4['title'];
                                $link_target = $link4['target'] ? $link4['target'] : '_self';
                            @endphp
                            <a class="ms-2 mt-2 btn btn-brown-gradient" href="@php echo esc_url($link_url) @endphp"
                                target="@php echo esc_attr($link_target) @endphp">@php echo esc_html($link_title) @endphp</a>
                        @endif
                    </div>
                </div>
                <div
                    @if (get_sub_field('swap_sides')) class="col-lg-6 order-1 p-0" @else class="col-lg-6 order-1 order-lg-2 p-0" @endif>
                    @php
                        $image = get_sub_field('image');
                        $size = 'full';
                    @endphp
                    @if ($image)
                        @php echo wp_get_attachment_image( $image, $size, "", ["class" => "object-fit", "loading" => "lazy"]) @endphp
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif
