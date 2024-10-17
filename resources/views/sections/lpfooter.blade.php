{{-- Footer for landing pages only  --}}
<footer class="content-info py-3 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-0 p-0 text-white">
                <div class="px-0 d-flex justify-content-between">
                    <p class="text-white mb-0">&copy; Mimeo. All rights reserved.</p>
                    <ul class="list-unstyled data-privacy-links d-flex m-0">
                        <li>
                            <a class="text-white" href="{{ esc_url(home_url('/')) }}privacy-policy/">Privacy Policy</a>
                        </li>
                        <li>
                            <a class="text-white" href="{{ esc_url(home_url('/')) }}/data-processing-agreement/">Data Processing</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
