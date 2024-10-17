@if (get_row_layout() == 'related_content_industries')
    
    @php 
      $header = get_sub_field('header');
      $image = get_sub_field('image');
    @endphp
    
    <section class="block-image-with-list in-page-section bg-lighter px-lg-4 px-4 px-md-0 py-5" id="list-{{ get_row_index() }}" data-section-name="">
        <div class="container">
          @if ($header)
          <div class="row justify-content-lg-center text-md-center mb-5 mb-lg-0 pb-5">
            <div class="pb-lg-5">
                <h2 class="hero-eyebrow text-sm-start text-md-center mb-3">{{ the_sub_field('header_eyebrow') }}</h2>
                <h3 class="fs-1 font-black mb-3 pt-0 mt-0">{{ $header }}</h3>
                <div>{{ the_sub_field('subhead') }}</div>
            </div>
          </div>
          @endif
          <div class="row g-5 d-none d-sm-flex">
              @if (have_rows('grid'))
                  @while (have_rows('grid'))
                      @php the_row();
                        $title = get_sub_field('title');
                        $subtitle = get_sub_field('subtitle');
                        $image = get_sub_field('image');
                        $link = get_sub_field('link');
                      @endphp

                      {{-- Desktop --}}
                      <div class="col col-md-6 col-lg-6 col-xl-3 flex-column text-center px-5 mb-5">
                          @if ($image)
                            <img src="{{ esc_url($image['url']) }}" alt="{{ esc_attr($image['alt']) }}" class="mb-5" loading="lazy" />
                          @endif
                          @if ($title)
                            <h2 class="p-0 mb-3 fs-5 font-bold">{{ $title }}</h2>
                          @endif
                           @if ($subtitle)
                            <h3 class="p-0 mb-3 fs-6 mb-2">{{ $subtitle }}</h3>
                          @endif
                          @if ($link)
                              @php
                                  $link_url = $link['url'];
                                  $link_title = $link['title'];
                                  $link_target = $link['target'] ? $link['target'] : '_self';
                              @endphp
                              <a class="btn btn-white-blue mt-3 px-lg-5" href="@php echo esc_url( $link_url ) @endphp"
                              target="@php echo esc_attr( $link_target ) @endphp">@php echo esc_html( $link_title ) @endphp</a>
                          @endif
                      </div>
                     
                  @endwhile


              @endif
        </div>

        <div class="row g-5 d-flex d-sm-none industry-slider">
              @if (have_rows('grid'))
                  @while (have_rows('grid'))
                      @php the_row();
                        $title = get_sub_field('title');
                        $subtitle = get_sub_field('subtitle');
                        $image = get_sub_field('image');
                        $link = get_sub_field('link');
                      @endphp

                      {{-- mobile --}}
                      <div class="col-12 mw-100 flex-column text-center mb-5 mx-5">
                          @if ($image)
                            <img src="{{ esc_url($image['url']) }}" alt="{{ esc_attr($image['alt']) }}" class="mb-5" loading="lazy" />
                          @endif
                          @if ($title)
                            <h2 class="p-0 mb-3 fs-5 font-bold">{{ $title }}</h2>
                          @endif
                           @if ($subtitle)
                            <h3 class="p-0 mb-3 fs-6 mb-2">{{ $subtitle }}</h3>
                          @endif
                          @if ($link)
                              @php
                                  $link_url = $link['url'];
                                  $link_title = $link['title'];
                                  $link_target = $link['target'] ? $link['target'] : '_self';
                              @endphp
                              <a class="btn btn-white-blue mt-3 px-lg-5" href="@php echo esc_url( $link_url ) @endphp"
                              target="@php echo esc_attr( $link_target ) @endphp">@php echo esc_html( $link_title ) @endphp</a>
                          @endif
                      </div>
                     
                  @endwhile


              @endif
        </div>

    </section>
@endif
