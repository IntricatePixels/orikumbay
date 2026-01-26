@if (get_row_layout() == 'two_columns_block_form')
    @php
        $background_image = get_sub_field('background_image');
        $logo_image = get_sub_field('logo_image');
        $gravity_forms_shortcode_us = get_sub_field('gravity_forms_shortcode');
        $h1_title = get_sub_field('h1_title');
        $left_description = get_sub_field('left_description');
        $form_description = get_sub_field('form_description');
    @endphp
    <section class="block block-form py-5 sm-pt-0 in-page-section pb-5 d-flex justify-content-center align-items-center z-1 position-relative" id="form" style="background-image: url(<?php echo $background_image; ?>);">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center md-pt-5">
                <!-- Left Column -->
                <div class="col-12 text-center">
                    <div>
                    @if ($logo_image)
                        @php
                            $logo_url = $logo_image['url'];
                            $logo_alt = $logo_image['alt'];
                        @endphp
                        <img class="form-logo-image pb-4" style="height: 80px;" src="{{ esc_url($logo_url) }}"
                            alt="{{ esc_attr($logo_alt) }}" />
                    @endif
                        @if ($h1_title)
                            <h2 class="text-white fs-2">{{ $h1_title }}</h2>
                        @endif
                        @if ($left_description)
                            <p class="text-white">{{ $left_description }}</p>
                        @endif
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-6 col-12 text-center mt-4">
                    @if ($form_description)
                        <p class="my-3">{{ $form_description }}</p>
                    @endif
                    @if ($gravity_forms_shortcode_us)
                        {!! do_shortcode($gravity_forms_shortcode_us) !!}
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif
