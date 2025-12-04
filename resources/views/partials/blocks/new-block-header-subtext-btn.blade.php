@if (get_row_layout() == 'header_subtext')
    <section data-animate="slide-up" id="header-{{ get_row_index() }}" class="block block-header-subtext py-5 @php the_sub_field('bgcolor') @endphp">
        <div class="container">
            <div class="row">
                <div class="col px-5 px-lg-0">
                    @if (get_sub_field('header'))
                        <h2 class="text-center py-5 font-black fs-1">@php the_sub_field('header') @endphp</h2>
                    @endif
                    @if (get_sub_field('subtext'))
                        <div class="mx-auto text-center mb-5 fs-5">@php the_sub_field('subtext') @endphp</div>
                    @endif
                        @php $link = get_sub_field('button') @endphp
                        @if ($link)
                            @php $link_url = $link['url'] @endphp
                            @php $link_title = $link['title'] @endphp
                            @php $link_target = $link['target'] ? $link['target'] : '_self' @endphp
                            <div class="text-center py-5">
                                <a class="btn btn-brown position-relative" href="@php echo esc_attr( $link_url ) @endphp"
                                    target="@php echo esc_attr( $link_target ) @endphp">@php echo esc_html( $link_title ) @endphp</a>
                            </div>
                            
                        @endif
                </div>
            </div>
        </div>
    </section>
@endif
