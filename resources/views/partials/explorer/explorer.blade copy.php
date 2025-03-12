@if (get_row_layout() == 'explorer')

<section class="block bg-casa-light pt-5" id="explorer" style="background-color: #6B635E;
">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                @if (get_sub_field('header'))
                    <h2 class="pt-5 pb-3 text-center font-black text-white">
                        @php the_sub_field('header') @endphp
                    </h2>
                @endif
                @if (get_sub_field('sub_header'))
                    <p class="pb-5 text-center text-white">
                        @php the_sub_field('sub_header') @endphp
                    </p>
                @endif
                
                <div>
                    @if (shortcode_exists('drawattention'))
                        {!! do_shortcode("[drawattention ID=2577]") !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
