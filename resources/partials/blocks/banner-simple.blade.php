@if (get_row_layout() == 'banner_simple')
<section class="banner-simple position-relative" data-animate="slide-up">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-content text-center">
                    <h1 class="banner-title">{{ get_sub_field('title') }}</h1>
                    <p class="banner-description">{{ get_sub_field('description') }}</p>
                    @if (get_sub_field('button_text') && get_sub_field('button_link'))
                    <a href="{{ get_sub_field('button_link') }}" class="btn btn-primary">
                        {{ get_sub_field('button_text') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if (get_sub_field('background_image'))
    <div class="banner-bg" style="background-image: url('{{ get_sub_field('background_image') }}');"></div>
    @endif
</section>
@endif