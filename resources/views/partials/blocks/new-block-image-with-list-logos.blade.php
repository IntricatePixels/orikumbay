@if (get_row_layout() == 'image_with_list_logos')
    
    @php 
      $header = get_sub_field('header');
      $header_eyebrow = get_sub_field('header_eyebrow');
      $subhead = get_sub_field('subhead');
      $image = get_sub_field('image');
      $swap_sides = get_sub_field('swap_sides');
    @endphp
    
    <section class="block-image-with-list in-page-section px-lg-4 px-4 px-md-0 py-5 in-page-section mt-5 mb-3" id="list-{{ get_row_index() }}" data-section-name="">
        <div class="container">
          @if ($header)
          <div class="row justify-content-lg-center text-md-center mb-5 mb-lg-0 pb-5">
                @if ($header_eyebrow)
                  <h2 class="hero-eyebrow text-sm-start text-md-center mb-3">{!! $header_eyebrow !!}</h2>
                @endif
                <h3 class="fs-1 font-black mb-3 pt-0 mt-0">{!! $header !!}</h3>
                @if ($subhead)
                  <div>{!! $subhead !!}</div>
                @endif
                
          </div>
          @endif
          <div class="row g-5">
              <div class="col-12 col-lg-6 d-flex align-items-center @if ( $swap_sides ) order-lg-2 @else order-lg-1 ps-lg-0 @endif">
                @if ($image)
                  <img width="318" height="288" src="{{ esc_url($image['url']) }}" alt="{{ esc_attr($image['alt']) }}" loading="lazy" />
                @endif
              </div>
               <div class="col col-lg-6 flex-column ms-4 ms-md-0 ps-lg-5 @if ( $swap_sides ) order-lg-1 @else order-lg-2 @endif">
                @if (get_sub_field('panel_eyebrow'))
                  <h2 class="hero-eyebrow text-start">{{ the_sub_field('panel_eyebrow') }}</h2>
                @endif
                
                @if (get_sub_field('panel_header'))
                  <h3 class="fs-1 pb-5 pe-lg-5 me-lg-5">{!! the_sub_field('panel_header') !!}</h3>
                @endif

                @php 
                  $count = count(get_sub_field('grid'));
                  $fields_count = 1;
                @endphp 

              @if (have_rows('grid'))
                @php 
                @endphp
                  @while (have_rows('grid'))
                      @php the_row();
                        $title = get_sub_field('title');
                        $descr = get_sub_field('descr');
                        $link = get_sub_field('link');
                        $logo_icon_image = get_sub_field('logo_icon_image');
                      @endphp
                        <div class="pb-3 position-relative @if ($count > 1 ) @if ($fields_count != $count) border-dotted @endif @endif">
                            @if ($logo_icon_image)
                              <img width="45" height="45" class="logo-icon-image" src="{{ esc_url($logo_icon_image['url']) }}" alt="{{ esc_attr($logo_icon_image['alt']) }}" loading="lazy" style="width: 50px;" />
                            @endif
                            @if ($title)
                              <h4 class="p-0 mb-2 fs-5 font-bold @if ( get_row_index() != 1 ) @endif">{!! $title !!}</h4>
                            @endif
                          
                            <div class="mb-4">{{ $descr }}</div>
                            @if ($link)
                                @php
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                @endphp
                                <a class="btn btn-brown right-arrow mt-5" href="@php echo esc_url( $link_url ) @endphp"
                                target="@php echo esc_attr( $link_target ) @endphp">@php echo esc_html( $link_title ) @endphp @asset('images/arrow-right-long-regular.svg')</a>
                            @endif
                        </div>

                  @php $fields_count++; @endphp
                  
                  @endwhile
              @endif
          </div>   
        </div>
 
        @php $link = get_sub_field('button') @endphp
        @if ($link)
          <div class="d-flex justify-content-center">
              @php
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
              @endphp
              <a class="btn btn-brown text-white mt-5 px-5" href="{{ esc_url($link_url) }}"
                  target="{{ esc_attr($link_target) }}">{{ esc_html($link_title) }}</a>  
          </div>
        @endif

        </div>
    </section>
@endif
