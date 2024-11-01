@if (get_row_layout() == 'big_cta')

@php 

  $choose_layout = get_sub_field('choose_layout');

@endphp

    <section class="block block-big-cta p-5 px-4 mb-0" id="blockBigCTA-@php echo get_row_index() @endphp">
        <div class="container">
            
            @if ($choose_layout)

             {{-- Columns  --}}
            <div class="row">
                <div class="col-12 col-lg-8 col-xl-7">
                    <h2 class="mb-2 p-0 text-center text-lg-start font-black fs-2">
                        {{ the_sub_field('header') }}
                    </h2>
                    <p class="text-white mb-3">
                        {{ the_sub_field('sub_header') }}
                    </p>
                    <p class="text-center text-lg-start pe-lg-5">
                        {{ the_sub_field('subtext') }}
                    </p>
                </div>
                <div class="col d-lg-flex justify-content-center align-items-center">
                    <div class="d-grid d-xl-flex justify-content-xl-start pe-lg-5 pb-lg-3">
                        @php
                          $link = get_sub_field('button');
                        @endphp
                        @if ($link)
                            @php
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                            @endphp
                            <a class="btn btn-brown right-arrow mt-0 position-relative" href="@php echo esc_url( $link_url ) @endphp"
                                target="@php echo esc_attr( $link_target ) @endphp">
                                @php echo esc_html( $link_title ) @endphp
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            
            @else 
            {{-- Horizontal --}}
            <div class="row">
                <h2 class="fs-2 fw-bold mb-2 p-0">
                    {{ the_sub_field('header') }}
                </h2>
                <p class="mb-1 font-black text-white">
                    {{ the_sub_field('sub_header') }}
                </p>
                <p class="main-text">
                    {{ the_sub_field('subtext') }}
                </p>
                <div class="mx-auto">
                  @php
                      $link = get_sub_field('button');
                  @endphp
                  @if ($link)
                      @php
                          $link_url = $link['url'];
                          $link_title = $link['title'];
                          $link_target = $link['target'] ? $link['target'] : '_self';
                      @endphp
                      <a class="btn btn-brown right-arrow mt-0 position-relative" href="@php echo esc_url( $link_url ) @endphp"
                          target="@php echo esc_attr( $link_target ) @endphp">
                          @php echo esc_html( $link_title ) @endphp
                      </a>
                  @endif
                </div>
            </div>
            
           
            @endif
        </div>
    </section>
@endif
