@if (get_row_layout() == 'cta_full_width_bg_image')

    @if (get_sub_field('wistia_video_link'))
        @php $wistia_video_link = get_sub_field('wistia_video_link')@endphp
    @endif

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

    @if (get_sub_field('wistia_video_url'))
        @php $wistia_video_url = get_sub_field('wistia_video_url', false, false) @endphp
    @endif

    <section class="block new cta-banner-full-bg pb-lg-5 py-lg-5 in-page-section" id="ctaBanner-@php echo get_row_index() @endphp" data-section-name="">
       
        @php
$image = get_sub_field('background_image');
$size = 'full';
@endphp

@if ($image)
    @php
    // Get the image URL without srcset attributes
    $image_url = wp_get_attachment_image_src($image, $size)[0];
    @endphp

    <div class="full-width-banner-cta"> <img src="{{ $image_url }}" class="object-fit" loading="lazy" alt=""></div>
@endif
        
        @if (get_sub_field('header'))
        <div class="container position-relative">
            <div class="row">
                <div
                    class="col-lg-5 col-sm-12 hero-text px-5 py-5 @if (get_sub_field('swap_sides')) order-1 @else order-2 @endif">
                    @if (get_sub_field('eyebrow'))
                      <div class="hero-eyebrow text-start">{{ the_sub_field('eyebrow') }}</div>
                    @endif  

                    @if (get_sub_field('header'))
                        <h2 class="text-start font-black">
                            @php the_sub_field('header') @endphp
                        </h2>
                    @endif
                    @if (get_sub_field('cta_text'))
                        <div class="align-middle mb-3">
                            <div class="block-subheader py-3">@php the_sub_field('cta_text') @endphp</div>
                            @if (get_sub_field('wistia_video_link'))
                                @include('partials/blocks/wistia')
                            @else
                                <a class="btn btn-brown-gradient mt-3" href="@php echo esc_url($link_url) @endphp"
                                    target="@php echo esc_attr($link_target) @endphp">@php echo esc_html($link_title) @endphp</a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </section>
@endif
