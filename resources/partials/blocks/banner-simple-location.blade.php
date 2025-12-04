@if (get_row_layout() == 'banner_simple_location')
<section class="banner-location position-relative" data-animate="slide-up">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-content text-center">
                    <h1 class="banner-title" style="color: #6b645e;">@php the_field('title'); @endphp</h1>
                    <p class="banner-description" style="color: #333;">
                        @php the_field('description'); @endphp
                    </p>
                    <div class="banner-buttons d-flex justify-content-center gap-3">
                        @php $button1 = get_field('button_1'); $button2 = get_field('button_2'); @endphp
                        @if ($button1)
                        <a href="{{ $button1['url'] }}" class="btn" style="background-color: #6b645e; color: white;">
                            {{ $button1['title'] }}
                        </a>
                        @endif
                        @if ($button2)
                        <a href="{{ $button2['url'] }}" class="btn btn-outline" style="border-color: #6b645e; color: #6b645e;">
                            {{ $button2['title'] }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif