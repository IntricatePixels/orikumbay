@if (get_row_layout() == 'content_block')
<section class="content-section py-5" data-animate="slide-up">
    <div class="container">
        <div class="row">
            <div class="col-lg-8" data-animate="slide-left" data-delay="1">
                {!! get_sub_field('content') !!}
            </div>
            @if (get_sub_field('featured_image'))
            <div class="col-lg-4" data-animate="slide-right" data-delay="2">
                <img src="{{ get_sub_field('featured_image')['url'] }}" alt="{{ get_sub_field('featured_image')['alt'] }}" class="img-fluid rounded">
            </div>
            @endif
        </div>
    </div>
</section>
@endif
