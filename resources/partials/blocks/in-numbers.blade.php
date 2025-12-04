@if (get_row_layout() == 'in_numbers')
<section class="in-numbers-section py-5" data-animate="fade-in">
    <div class="container">
        <div class="row">
            @php $delay = 1; @endphp
            @foreach (get_sub_field('numbers') as $item)
            <div class="col-md-6 col-lg-3 mb-4" data-animate="scale" data-delay="{{ $delay }}">
                <div class="number-block text-center">
                    <div class="number" style="font-size: 2.5rem; font-weight: bold;">
                        {{ $item['number'] }}
                    </div>
                    <div class="description" style="font-size: 1rem;">
                        {{ $item['description'] }}
                    </div>
                </div>
            </div>
            @php $delay++; @endphp
            @endforeach
        </div>
    </div>
</section>
@endif