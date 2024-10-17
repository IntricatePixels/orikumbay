{{-- Top bar for Landing pages only  --}}
<section class="header-top-small d-flex align-items-center">
    <div class="container-fluid">
        <div class="d-flex justify-content-between pb-1">
            <a href="{{ esc_url(home_url('/')) }}">
                <img class="home-logo" width="84" height="21" src="{{ asset('images/Mimeo_Logo_KO.svg') }}"
                    alt="Mimeo Logo" />
            </a>
            <div class="header-top-icons d-flex justify-content-end">
                <a href="{{ esc_url(home_url('/')) }}search/" class="d-inline-block header-search-icon" title="Search">
                    <img width="20" height="20" class="header-search-icon" src="@asset('images/icon_search_new.svg')"
                        alt="search mimeo"><span class="d-none ps-1 text-white">Search</span></a>
                </a>
                <a href="{{ esc_url(home_url('/')) }}contact/" class="d-inline-block header-contact-icon"
                    title="Contact Us">
                    <img class="header-contact-icon" width="20" height="20" src="@asset('images/icon_header_envelope_new.svg')"
                        alt="contact mimeo"><span class="d-none ps-1 text-white">Contact</span></a>
            </div>
        </div>
</section>
