<!-- Footer -->
<footer class="g-bg-secondary g-pt-5 g-pb-5">
    <div class="container">
        <!-- Footer Copyright -->
        <div class="row justify-content-lg-center align-items-center text-center">
            <div class="col-sm-6 col-md-4 col-lg-3 order-md-3 g-mb-10">
                <a class="u-link-v5 g-color-text g-color-primary--hover" href="#">
                    <p class="g-color-text mb-0">SMKN 1 Kadipaten - Since 1969</p>
                </a>
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3 order-md-2 g-mb-10">
                <!-- Social Icons -->
                <ul class="list-inline mb-0">
                    <li class="list-inline-item g-mx-2">
                        <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                            href="#">
                            <i class="g-font-size-default fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-2">
                        <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                            href="https://www.facebook.com/smknegeri1kadipaten" target="_blank">
                            <i class="g-font-size-default fa fa-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-2">
                        <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                            href="https://www.instagram.com/smkn1kadipaten" target="_blank">
                            <i class="g-font-size-default fa fa-instagram"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-2">
                        <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                            href="http://www.youtube.com/@smknegeri1kadipaten-majalengka" target="_blank">
                            <i class="g-font-size-default fa fa-youtube"></i>
                        </a>
                    </li>
                </ul>
                <!-- End Social Icons -->
            </div>

            <div class="col-md-6 col-lg-4 order-md-1 g-mb-10">
                <div class="d-flex align-items-center">
                    <!-- Logo -->
                    <a class="g-text-underline--none--hover mr-3" href="/">
                        <img class="g-width-95" src="{{ URL::asset('build/assets/img/logo/logo-mini.png') }}"
                            alt="Logo">
                    </a>
                    <!-- End Logo -->

                    <!-- Profil -->
                    <p class="mb-0 g-color-gray-dark-v5 g-font-size-13">
                        &copy; {{ $profileApp->app_tahun ?? '' }}
                        <script>
                            document.write(new Date().getFullYear())
                        </script> {{ $profileApp->app_nama ?? '' }}.
                        <br>All Rights Reserved. {{ $profileApp->app_pengembang ?? '' }}
                    </p>
                </div>
            </div>

        </div>
        <!-- End Footer Copyright -->
    </div>
</footer>
<!-- End Footer -->
