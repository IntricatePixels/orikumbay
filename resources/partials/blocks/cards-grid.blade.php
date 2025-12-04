@if (get_row_layout() == 'cards_grid')
<section class="cards-section py-5">
    <div class="container">
        <h2 class="text-center mb-5" data-animate="fade-in">{{ get_sub_field('section_title') }}</h2>
        <div class="row g-4">
            @php $delay = 1; @endphp
            @foreach (get_sub_field('cards') as $card)
            <div class="col-md-6 col-lg-4" data-animate="slide-up" data-delay="{{ $delay }}">
                <div class="card h-100 shadow-sm">
                    @if ($card['image'])
                    <img src="{{ $card['image']['url'] }}" alt="{{ $card['image']['alt'] }}" class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $card['title'] }}</h5>
                        <p class="card-text">{{ $card['description'] }}</p>
                    </div>
                </div>
            </div>
            @php $delay++; @endphp
            @endforeach
        </div>
    </div>
</section>
@endif
