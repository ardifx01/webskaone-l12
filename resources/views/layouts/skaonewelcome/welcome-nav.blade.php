<div class="container">
    <!-- Nav -->
    <nav class="js-mega-menu navbar navbar-expand-lg g-px-0 g-py-5 g-py-0--lg">
        <!-- Logo -->
        <a class="navbar-brand g-max-width-170 g-max-width-200--lg" href="/">
            <img class="img-fluid g-hidden-lg-down" src="{{ URL::asset('build/assets/img/logo/logo.png') }}"
                alt="Logo">
            <img class="img-fluid g-width-80 g-hidden-md-down g-hidden-xl-up"
                src="{{ URL::asset('build/assets/img/logo/logo-mini.png') }}" alt="Logo">
            <img class="img-fluid g-hidden-lg-up" src="{{ URL::asset('build/assets/img/logo/logo.png') }}"
                alt="Logo">
        </a>
        <!-- End Logo -->

        <!-- Responsive Toggle Button -->
        <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0" type="button"
            aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse"
            data-target="#navBar">
            <span class="hamburger hamburger--slider g-px-0">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </span>
        </button>
        <!-- End Responsive Toggle Button -->
        <div id="navBar" class="collapse navbar-collapse">
            <ul class="navbar-nav align-items-lg-center g-py-30 g-py-0--lg ml-auto">
                <!-- Pages - Mega Menu -->
                <li class="nav-item hs-has-sub-menu g-mx-20--lg">
                    <a href="#!" class="nav-link g-px-0" id="nav-link-1" aria-haspopup="true" aria-expanded="false"
                        aria-controls="nav-submenu-1">Profil
                    </a>
                    <!-- Submenu -->
                    <ul class="hs-sub-menu list-unstyled g-text-transform-none g-brd-top g-brd-white g-brd-top-7 g-brd-around g-brd-7 g-min-width-200 g-mt-20 g-mt-10--lg--scrolling u-shadow-v39"
                        id="nav-submenu-1" aria-labelledby="nav-link-1">
                        <li class="dropdown-item">
                            <a class="nav-link g-px-0" href="#!">Sejarah</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="nav-link g-px-0" href="/skaone/visimisi">Visi dan Misi</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="nav-link g-px-0" href="/skaone/struktur_organisasi">Struktur Organisasi</a>
                        </li>
                    </ul>
                    <!-- End Submenu -->
                </li>
                <!-- End Pages - Mega Menu -->

                <li class="nav-item active">
                    <a class="nav-link g-color-primary--hover g-font-size-15 g-font-size-17--xl g-px-15--lg g-py-10 g-py-30--lg"
                        href="/skaone/program">
                        Programs Studi
                    </a>
                </li>
                {{-- <li class="nav-item">
            <a class="nav-link g-color-primary--hover g-font-size-15 g-font-size-17--xl g-px-15--lg g-py-10 g-py-30--lg"
                href="/skaone/future_students">
                Future Students
            </a>
        </li> --}}
                <li class="nav-item">
                    <a class="nav-link g-color-primary--hover g-font-size-15 g-font-size-17--xl g-px-15--lg g-py-10 g-py-30--lg"
                        href="/skaone/faculty_and_staff">
                        Teacher &amp; Staff
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link g-color-primary--hover g-font-size-15 g-font-size-17--xl g-px-15--lg g-py-10 g-py-30--lg"
                        href="/skaone/current_students">
                        Current Students
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link g-color-primary--hover g-font-size-15 g-font-size-17--xl g-px-15--lg g-py-10 g-py-30--lg"
                        href="/skaone/ppdb">
                        PPDB
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link g-color-primary--hover g-font-size-15 g-font-size-17--xl g-px-15--lg g-py-10 g-py-30--lg"
                        href="/skaone/team">
                        Team
                    </a>
                </li>
                {{-- <li class="nav-item">
            <a class="nav-link g-color-primary--hover g-font-size-15 g-font-size-17--xl g-px-15--lg g-py-10 g-py-30--lg"
                href="/skaone/events">
                Events
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link g-color-primary--hover g-font-size-15 g-font-size-17--xl g-pl-15--lg g-pr-0--lg g-py-10 g-py-30--lg"
                href="/skaone/alumni">
                Alumni
            </a>
        </li> --}}
            </ul>
        </div>
    </nav>
    <!-- End Nav -->
</div>
