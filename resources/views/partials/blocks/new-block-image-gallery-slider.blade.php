@if (get_row_layout() == 'image_gallery_slider')

    @php 
        $gallery_images = get_sub_field('images');
    @endphp
    
    @if ($gallery_images)
        <section class="block py-5 my-lg-5" id="imageSlider">
            <div id="carouselSlideGallery" class="carousel carousel-dark slide" data-bs-ride="false" data-bs-pause="false">
                <div class="carousel-inner">
                    @foreach ($gallery_images as $index => $image)
                        @php
                            $image_url = $image['url'];
                            $active_class = ($index == 0) ? 'active' : '';
                        @endphp
                        <div class="carousel-item {{ $active_class }}">
                        
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ $image_url }}" class="d-block" style="max-width: 100%; max-height: 500px; object-fit: contain;" alt="Slide Image">
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselSlideGallery" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselSlideGallery" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    @endif

@endif
