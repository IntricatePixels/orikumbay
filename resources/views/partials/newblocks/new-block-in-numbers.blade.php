@if (get_row_layout() == 'in_numbers')
    @php $gradientfield = get_sub_field_object('gradient') @endphp
    @php $gradientvalue = $gradientfield['value'] @endphp
    @php $colcount = get_sub_field_object('cols_grid') @endphp
    @php $colvalue = $colcount['value'] @endphp
    <section id="block-in-numbers" class="block in-page-section new py-5 gradient-@php echo esc_attr($gradientvalue) @endphp block-in-numbers" data-section-name="">
        <div class="container py-5">
            @if (get_sub_field('header'))
                <h2 class="white max-width-8 mb-45 mx-auto text-center pb-3">@php the_sub_field('header')@endphp</h2>
            @endif
            @if (get_sub_field('subtext'))
                <p class="max-width-7 mx-auto text-center mb-45 pb-3">@php the_sub_field('subtext') @endphp</p>
            @endif
            <div class="row">
                @if (have_rows('numbers'))
                    @while (have_rows('numbers'))
                        @php the_row() @endphp
                        @php $number = get_sub_field('number')@endphp
                        @php $title = get_sub_field('title')@endphp

                        <div
                            class="col-6 col-md-@php echo esc_attr($colvalue) @endphp text-center side-border bottom-border">
                            <div class="py-5">
                                <h3>@php echo $number @endphp</h3>
                                <p class="mb-0">@php echo $title @endphp </p>
                            </div>
                        </div>
                    @endwhile
                @endif
            </div>
        </div>
    </section>
@endif
