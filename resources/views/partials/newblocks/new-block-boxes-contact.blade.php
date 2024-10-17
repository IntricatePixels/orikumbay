@if (get_row_layout() == 'boxes_contact')

    @php
        $header = get_sub_field('header');
        $description = get_sub_field('description');
        $swap_sides = get_sub_field('swap_sides');
        $eyebrow = get_sub_field('eyebrow');
    @endphp

    <section class="block-boxes-contact in-page-section px-lg-4 px-4 px-md-0 py-5 my-5 in-page-section"
        id="list-{{ get_row_index() }}" data-section-name="">
        <div class="container">
            <div class="d-lg-flex flex-column justify-content-lg-center text-md-center">
                <h2 class="hero-eyebrow pb-3">{{ $eyebrow }}</h2>
                <h3 class="font-black fs-1 pb-4">{!! $header !!}</h3>
                <p>{{ $description }}</p>
                <div class="mx-auto">
                    @php
                        $link = get_sub_field('link');
                    @endphp
                    @if ($link)
                        @php
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        @endphp
                        <a class="btn btn-brown-gradient mt-4 px-5" href="@php echo esc_url( $link_url ) @endphp"
                            target="@php echo esc_attr( $link_target ) @endphp">
                            @php echo esc_html( $link_title ) @endphp
                        </a>
                    @endif
                </div>
            </div>
            <div class="row gy-5">
                @if (have_rows('boxes'))
                    @while (have_rows('boxes'))
                        @php the_row();
                            $image = get_sub_field('image');
                            $title = get_sub_field('title');
                            $descr = get_sub_field('description');
                        @endphp
                        <div class="col-4" style="min-width: 350px; min-height: 235px;">
                            <div class="border rounded p-5 gradient-border h-100">
                                @if ($image)
                                  <img width="180" height="20" src="{{ esc_url($image['url']) }}" alt="{{ esc_attr($image['alt']) }}" loading="lazy" style="width: 179px; height: 20px;" />
                                @endif
                                @if ($title)
                                  <h4 class="p-0 mt-3 fs-5 font-bold">{!! $title !!}</h4>
                                @endif
                                @if ($descr)
                                  <div class="mt-4">{!! $descr !!}</div>
                                @endif
                            </div>
                        </div>
                    @endwhile
                @endif
            </div>
        </div>
        </div>
    </section>


  <section class="block-map in-page-section bg-lighter px-lg-4 px-4 px-md-0 py-5">
  <div class="container">
    <div class="d-lg-flex flex-column justify-content-lg-center text-md-center">
      <h2 class="hero-eyebrow pb-3">Mimeo Locations</h2>
      <h3 class="fs-1 pb-5">Mimeo is a Global Company <br class="desktop-break">with Locations Across the Globe.</h3>
    </div>
    <div class="row g-5">
      <div class="col-md-6">
        <div id="map-container">
          <img width="500" height="500" id="map-image" class="rounded-3 border border-1 border-lighter" src="@asset('images/maps/newyork.png')">
        </div>
      </div>
      <div class="col-md-6">
        <div class="dropdown mt-3 w-50">
          <button class="btn btn-brown w-100 bg-white text-body dropdown-toggle border border-secondary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Select Location
          </button>
          <ul class="dropdown-menu w-100 border border-secondary" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#" data-location="New York" data-image="{{ asset('images/maps/newyork.png') }}">New York Office</a></li>
            <li><a class="dropdown-item" href="#" data-location="Memphis" data-image="{{ asset('images/maps/memphis.png') }}">Memphis Office and Print Hub</a></li>
            <li><a class="dropdown-item" href="#" data-location="Huntingdon" data-image="{{ asset('images/maps/huntingdon.png') }}">Huntingdon Office and Print Hub</a></li>
            <li><a class="dropdown-item" href="#" data-location="Berlin1" data-image="{{ asset('images/maps/berlin.png') }}">Berlin Print Hub</a></li>
            <li><a class="dropdown-item" href="#" data-location="Berlin2" data-image="{{ asset('images/maps/berlin.png') }}">Berlin Office</a></li>
            <li><a class="dropdown-item" href="#" data-location="Pune" data-image="{{ asset('images/maps/pune.png') }}">Pune Office and Development Hub</a></li>
          </ul>
        </div>
        <div id="address-info" class="pt-5">
          <div id="New York" class="location-info">
            <h2 class="font-bold">New York Office</h2>
            <div class="full-address">16 W 22nd Street, <br>New York, NY, 10010 <br>United States</div>
          </div>
          <div id="Memphis" class="location-info" style="display: none;">
            <h2 class="font-bold">Memphis Office and Print Hub</h2>
            <div class="full-address">3350 Miac Cove, <br>Memphis, TN 38118 <br>United States</div>
          </div>
          <div id="Huntingdon" class="location-info" style="display: none;">
            <h2 class="font-bold">Huntingdon Office and Print Hub</h2>
            <div class="full-address">The Ermine Centre Hurricane Close  <br>Huntingdon, Cambridgeshire PE29 6XX,  <br>United Kingdom</div>
          </div>
          <div id="Berlin1" class="location-info" style="display: none;">
            <h2 class="font-bold">Berlin Print Hub</h2>
            <div class="full-address">Gartenfelder Str. 29-37 13599 <br>Berlin, Germany</div>
          </div>
          <div id="Berlin2" class="location-info" style="display: none;">
            <h2 class="font-bold">Berlin Office</h2>
            <div class="full-address">Gartenfelder Str. 29-37 13599 <br>Berlin, Germany</div>
          </div>
          <div id="Pune" class="location-info" style="display: none;">
            <h2 class="font-bold">Pune Office and Development Hub</h2>
            <div class="full-address">8th floor, Phoenix Fountainhead, <br>207, Nagar Rd. <br>Clover Park, Viman Nagar, <br>Pune, Maharashtra 411014 <br>India</div>
          </div>
          <a class="btn btn-white-blue mt-5 px-5" onclick="openGoogleMap()" href="https://www.google.com/maps/place/16+W+22nd+St,+New+York,+NY+10010,+USA/@40.7411848,-73.991313,17z/data=!3m1!4b1!4m6!3m5!1s0x89c259a3847a067f:0xf2688248373f2f28!8m2!3d40.7411848!4d-73.991313!16s%2Fg%2F11bw3xwwrg?entry=ttu">Open in Google Maps</a>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  // Function to change the selected address and update the map image and full address
  function changeAddress(address) {
    // Hide all location info blocks
    console.log(address);
    document.querySelectorAll('.location-info').forEach(item => {
      item.style.display = 'none';
    });

    // Show the selected location info block
    document.getElementById(address).style.display = 'block';

     // Update map image based on the selected location
    const imageUrl = document.querySelector(`[data-location="${address}"]`).getAttribute('data-image');
    console.log(imageUrl);
    document.getElementById("map-image").src = imageUrl;
  }

  // Function to open Google Maps for the selected location
  function openGoogleMap() {
  // Get the selected location info block
  const selectedLocationInfo = document.querySelector('.location-info[style="display: block;"]');
  
  // Get the full address from the selected location info block
  const fullAddress = selectedLocationInfo.querySelector('.full-address').innerText;

  // Construct the Google Maps URL with the full address
  let url = "https://www.google.com/maps/place/";
  url += encodeURIComponent(fullAddress);

  // Open Google Maps in a new tab
  window.open(url, "_blank");
}


  // Event listener for dropdown items
  document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', function(event) {
      event.preventDefault();
      changeAddress(this.getAttribute('data-location'));
    });
  });
</script>









<style>
    .col-4 .gradient-border {
        border: 0;
        padding: 0;
        position: relative;
    }

    .col-4 .gradient-border:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 25px;
        background: linear-gradient(90deg, #59397a, #007ab7, #5b9042);
        border-radius: 5px 5px 0 0;
    }
    .col-4:nth-child(2) .gradient-border:before {        
        background: linear-gradient(90deg,#ffc72c,#f8991c,#e87722);
    }
    .col-4:nth-child(3) .gradient-border:before {        
        background: linear-gradient(90deg,#eacb39 0,#eacb39 3%,#d99c30 10%,#cb772a 17%,#a82780 38%,#7c3c82 52%,#6a4683 60%,#60a3dc 80%,#66a7bd 84%,#76b170 94%,#81b93d);
    }

    #map {
      height: 400px; /* adjust height as needed */
      width: 100%;
    }
    

</style>

@endif