@if (get_row_layout() == 'explorer')
<section class="block bg-casa-light pt-5" id="explorer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                @if (get_sub_field('header'))
                    <h2 class="m-0 text-center font-black">
                        @php the_sub_field('header') @endphp
                    </h2>
                @endif
                @if (get_sub_field('sub_header'))
                    <p class="m-0 text-center pb-5">
                        @php the_sub_field('sub_header') @endphp
                    </p>
                @endif
                <div class="map-container position-relative">
                    @php
                        $id = 2414;
                        $idExists = does_drawattention_id_exist($id);
                    @endphp

                    @if ($idExists && shortcode_exists('drawattention'))
                        {!! do_shortcode("[drawattention ID=$id]") !!}
                    @else
                        <p class="text-center">Content not available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
