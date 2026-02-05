@if (get_row_layout() == 'icons_list')
    
    @php 
      $header = get_sub_field('header');
      $header_eyebrow = get_sub_field('header_eyebrow');
      $subhead = get_sub_field('subhead');
      $image = get_sub_field('image');
    @endphp
    
    <section class="block-image-with-list px-lg-4 px-4 px-md-0 py-5 in-page-section" id="list-{{ get_row_index() }}" data-section-name="" style="background-color: #6B635E;">
        <div class="container">
          @if ($header)
          <div class="row justify-content-lg-center text-md-center">
            <div class="mt-5">
                @if ($header_eyebrow)
                  <h2 class="hero-eyebrow text-sm-start text-white text-md-center">{!! $header_eyebrow !!}</h2>
                @endif
                @if ($header)
                <h3 class="fs-1 font-black mb-3 text-white  pt-0 mt-0">{!! $header !!}</h3>
                @endif
                @if ($subhead)
                <div class="text-white">{!! $subhead !!}</div>
                @endif
            </div>
          </div>
          @endif
          
          <div class="row g-5 py-5">
              @if (have_rows('grid'))
                  @while (have_rows('grid'))
                      @php the_row();
                        $title = get_sub_field('title');
                        $icon_image = get_sub_field('icon_image');
                        $link = get_sub_field('link');
                      @endphp

                      <div class="col-6 col-md-4 col-lg-3 flex-column text-center">
                          @if ($icon_image)
                            <img width="180" height="20" src="{{ esc_url($icon_image['url']) }}" alt="{{ esc_attr($icon_image['alt']) }}" loading="lazy" style="width: 100px; height: 100px;" />
                          @endif
                          @if ($title)
                            <h2 class="pt-2 mb-2 fs-5 font-bold mb-2 text-white">{!! $title !!}</h4>
                          @endif
                          @if ($link)
                              @php
                                  $link_url = $link['url'];
                                  $link_title = $link['title'];
                                  $link_target = $link['target'] ? $link['target'] : '_self';
                              @endphp
                              <a class="d-block color-blue fs-6 text-decoration-underline text-white" href="@php echo esc_url( $link_url ) @endphp"
                              target="@php echo esc_attr( $link_target ) @endphp">@php echo esc_html( $link_title ) @endphp</a>
                          @endif
                      </div>
                  @endwhile
              @endif
        </div>
    </section>
@endif
