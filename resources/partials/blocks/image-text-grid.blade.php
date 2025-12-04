@if (get_row_layout() == 'image_text_grid')
<section class="image-text-grid py-5" data-animate="fade-in">
    <div class="container">
        <div class="row">
            @php $delay = 1; @endphp
            @foreach (get_sub_field('grid_items') as $item)
            <div class="col-md-6 col-lg-4 mb-4" data-animate="slide-up" data-delay="{{ $delay }}">
                <div class="card h-100 border-0 shadow-sm">
                    @if ($item['image'])
                    <img src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] }}" class="card-img-top" style="object-fit: cover; height: 200px;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['title'] }}</h5>
                        <p class="card-text">{{ $item['description'] }}</p>
                    </div>
                </div>
            </div>
            @php $delay++; @endphp
            @endforeach
        </div>
    </div>
</section>
@endif