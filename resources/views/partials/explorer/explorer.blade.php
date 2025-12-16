@if (get_row_layout() == 'explorer')
<section class="block bg-casa-light" id="explorer" style="min-height: auto; padding: 0.5rem 0;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                @if (get_sub_field('header'))
                    <h2 class="m-0 text-center font-black">
                        @php the_sub_field('header') @endphp
                    </h2>
                @endif
                @if (get_sub_field('sub_header'))
                    <p class="m-0 text-center" style="font-size: 0.875rem; padding: 0.25rem 0;">
                        @php the_sub_field('sub_header') @endphp
                    </p>
                @endif
                <div class="map-container position-relative">
                    <img src="@asset('images/explorer/orikum_bay_explorer_main_image.jpg')" usemap="#image-map" class="map" id="mainExplorerImage" style="cursor: pointer; transition: opacity 0.3s ease; width: 100%; height: auto;" data-bs-toggle="modal" data-bs-target="#leftModalWindow">
                    
                    <div class="position-absolute top-50 start-50 translate-middle text-center explorer-overlay" style="pointer-events: none;">
                        <button class="btn btn-brown" style="pointer-events: auto;" data-bs-toggle="modal" data-bs-target="#leftModalWindow">Explore Apartments</button>
                    </div>

                    <map name="image-map">
                    </map>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fullscreen Modals -->
    @php
        $id = 2414;
        $idExists = does_drawattention_id_exist($id);
    @endphp
    <div class="modal fade" id="leftModalWindow" tabindex="-1" aria-labelledby="leftModalWindowLabel" aria-hidden="true" style="background-color: #004a98;">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background:#4e81d6">
                <button type="button" class="btn-close btn-close-white m-5 fs-1 position-absolute z-3" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    @if ($idExists && shortcode_exists('drawattention'))
                        {!! do_shortcode("[drawattention ID=$id]") !!}
                    @else
                        <p class="text-center">Content not available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

<script>
    jQuery(document).ready(function($) {
        // Initialize Maphilight plugin
        $('#mainExplorerImage').maphilight({
            fillColor: '6f96d1',
            strokeColor: '000000',
        });

        // Initialize ImageMapResizer plugin
        $('map').imageMapResize();
        
        // Add hover effect to indicate clickability
        $('#mainExplorerImage').on('mouseenter', function() {
            $(this).css('opacity', '0.85');
        }).on('mouseleave', function() {
            $(this).css('opacity', '1');
        });
    });
</script>

@endif
