<footer class="pt-0 bg-casa-light">
    <!-- <a href="https://maps.app.goo.gl/jepNiFabWBbvo7s7A" target="_blank">
        <img src="@asset('images/map_lago.jpg')" alt="Map" width="1000" height="500" class="object-fit" style="height: 500px;">
    </a> -->
    <div class="container pt-5">
        <div class="row">
            <!-- Left Column for WordPress Menu -->
            <div class="col-12">
                @if (is_active_sidebar('sidebar-footer'))
                @php dynamic_sidebar('sidebar-footer') @endphp

                @endif
            </div>
        </div>
    </div>

    <div class="footer-copyright px-5 mt-5">
        <div class="container">
            <div class="row p-0">
                <p class="text-white">&copy; All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
