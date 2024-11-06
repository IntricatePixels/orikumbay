@if (get_row_layout() == 'location_distances')
<section id="location-distances" class="location-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-4 pb-5 pb-lg-0">
                <div class="location-details d-flex d-md-block flex-wrap justify-content-center">
                    @if (have_rows('numbers'))
                    @while (have_rows('numbers'))
                    @php the_row() @endphp
                    @php $number = get_sub_field('number')@endphp
                    @php $title = get_sub_field('title')@endphp
                    <div class="col-12 col-lg-6 col-md-@php echo esc_attr($colvalue) @endphp text-center border-bottom-styled">
                        <div class="py-3">
                            <h3 class="fs-6 fw-normal">@php echo $number @endphp</h3>
                            <p class="fw-bold fs-3 mb-0">@php echo $title @endphp </p>
                        </div>
                    </div>
                    @endwhile
                    @endif
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="location-map">
                    <img src="@php the_sub_field('image') @endphp" alt="Map Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
@endif
