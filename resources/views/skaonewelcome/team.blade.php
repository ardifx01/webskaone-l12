@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Team
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.css') }}">
    <link type="text/plain" rel="stylesheet"
        href="{{ URL::asset('build/assets/vendor/cubeportfolio-full/cubeportfolio/css/cubeportfolio.min.css') }}">
@endsection
@section('content')
    <!-- Cubeportfolio -->
    <section class="container g-py-100">
        <div class="row justify-content-center g-mb-60">
            <div class="col-lg-7">
                <!-- Heading -->
                <div class="text-center">
                    <h2 class="h4 text-uppercase mb-3">Branding works</h2>
                    <div class="d-inline-block g-width-60 g-height-1 g-bg-black mb-2"></div>
                    <p class="mb-0">I am a creative person focusing on culture, luxury, editorial &amp; art. Somewhere
                        between sophistication and simplicity.</p>
                </div>
                <!-- End Heading -->
            </div>
        </div>

        <!-- Cubeportfolio Filter -->
        <ul id="filterControls" class="text-center u-filter-v1 g-mb-40">
            <li class="list-inline-item cbp-filter-item cbp-filter-item-active g-cursor-pointer g-transition-0_2"
                data-filter="*">All</li>
            <li class="list-inline-item cbp-filter-item text-uppercase g-cursor-pointer g-transition-0_2"
                data-filter=".js-illustration">Illustration</li>
            <li class="list-inline-item cbp-filter-item text-uppercase g-cursor-pointer g-transition-0_2"
                data-filter=".js-design">Design</li>
            <li class="list-inline-item cbp-filter-item text-uppercase g-cursor-pointer g-transition-0_2"
                data-filter=".js-graphic">Graphic</li>
            <li class="list-inline-item cbp-filter-item text-uppercase g-cursor-pointer g-transition-0_2"
                data-filter=".js-logo">Logo</li>
        </ul>
        <!-- End Cubeportfolio Filter -->

        <!-- Cubeportfolio container -->
        <div class="cbp" data-controls="#filterControls">
            <div class="cbp-item js-logo">
                <!-- Figure -->
                <figure class="u-info-v1-4 g-overflow-hidden mb-0">
                    <!-- Figure Image -->
                    <img class="w-100 u-info-v1-4__item-regular g-transition-0_2"
                        src="../../assets/img-temp/400x270/img13.jpg" alt="Image Description">
                    <!-- End Figure Image-->

                    <a class="cbp-caption cbp-singlePageInline u-link-v2" href="../ajax/projects/projects-1.html"></a>

                    <!-- Figure Caption -->
                    <figcaption class="u-info-v1-4__item-hidden g-transition-0_2 g-bg-black g-color-white g-px-30 g-py-10">
                        <h4 class="h6 g-font-weight-500 mb-0">Kathy Reyes</h4>
                        <em class="d-block g-color-white-opacity-0_8 g-font-style-normal g-font-size-13">Logo</em>
                    </figcaption>
                    <!-- End Figure Caption-->
                </figure>
                <!-- End Figure -->
            </div>

            <div class="cbp-item js-logo">
                <!-- Figure -->
                <figure class="u-info-v1-4 g-overflow-hidden mb-0">
                    <!-- Figure Image -->
                    <img class="w-100 u-info-v1-4__item-regular g-transition-0_2"
                        src="../../assets/img-temp/400x270/img14.jpg" alt="Image Description">
                    <!-- End Figure Image-->

                    <a class="cbp-caption cbp-singlePageInline u-link-v2" href="../ajax/projects/projects-2.html"></a>

                    <!-- Figure Caption -->
                    <figcaption class="u-info-v1-4__item-hidden g-transition-0_2 g-bg-black g-color-white g-px-30 g-py-10">
                        <h4 class="h6 g-font-weight-500 mb-0">Kathy Reyes</h4>
                        <em class="d-block g-color-white-opacity-0_8 g-font-style-normal g-font-size-13">Logo</em>
                    </figcaption>
                    <!-- End Figure Caption-->
                </figure>
                <!-- End Figure -->
            </div>

            <div class="cbp-item js-illustration js-design">
                <!-- Figure -->
                <figure class="u-info-v1-4 g-overflow-hidden mb-0">
                    <!-- Figure Image -->
                    <img class="w-100 u-info-v1-4__item-regular g-transition-0_2"
                        src="../../assets/img-temp/400x270/img15.jpg" alt="Image Description">
                    <!-- End Figure Image-->

                    <a class="cbp-caption cbp-singlePageInline u-link-v2" href="../ajax/projects/projects-3.html"></a>

                    <!-- Figure Caption -->
                    <figcaption class="u-info-v1-4__item-hidden g-transition-0_2 g-bg-black g-color-white g-px-30 g-py-10">
                        <h4 class="h6 g-font-weight-500 mb-0">Kathy Reyes</h4>
                        <em class="d-block g-color-white-opacity-0_8 g-font-style-normal g-font-size-13">Illustration</em>
                    </figcaption>
                    <!-- End Figure Caption-->
                </figure>
                <!-- End Figure -->
            </div>

            <div class="cbp-item js-design js-illustration">
                <!-- Figure -->
                <figure class="u-info-v1-4 g-overflow-hidden mb-0">
                    <!-- Figure Image -->
                    <img class="w-100 u-info-v1-4__item-regular g-transition-0_2"
                        src="../../assets/img-temp/400x270/img16.jpg" alt="Image Description">
                    <!-- End Figure Image-->

                    <a class="cbp-caption cbp-singlePageInline u-link-v2" href="../ajax/projects/projects-4.html"></a>

                    <!-- Figure Caption -->
                    <figcaption class="u-info-v1-4__item-hidden g-transition-0_2 g-bg-black g-color-white g-px-30 g-py-10">
                        <h4 class="h6 g-font-weight-500 mb-0">Kathy Reyes</h4>
                        <em class="d-block g-color-white-opacity-0_8 g-font-style-normal g-font-size-13">Design</em>
                    </figcaption>
                    <!-- End Figure Caption-->
                </figure>
                <!-- End Figure -->
            </div>

            <div class="cbp-item js-design js-graphic">
                <!-- Figure -->
                <figure class="u-info-v1-4 g-overflow-hidden mb-0">
                    <!-- Figure Image -->
                    <img class="w-100 u-info-v1-4__item-regular g-transition-0_2"
                        src="../../assets/img-temp/400x270/img9.jpg" alt="Image Description">
                    <!-- End Figure Image-->

                    <a class="cbp-caption cbp-singlePageInline u-link-v2" href="../ajax/projects/projects-5.html"></a>

                    <!-- Figure Caption -->
                    <figcaption class="u-info-v1-4__item-hidden g-transition-0_2 g-bg-black g-color-white g-px-30 g-py-10">
                        <h4 class="h6 g-font-weight-500 mb-0">Kathy Reyes</h4>
                        <em class="d-block g-color-white-opacity-0_8 g-font-style-normal g-font-size-13">Graphic</em>
                    </figcaption>
                    <!-- End Figure Caption-->
                </figure>
                <!-- End Figure -->
            </div>

            <div class="cbp-item js-illustration js-design js-graphic">
                <!-- Figure -->
                <figure class="u-info-v1-4 g-overflow-hidden mb-0">
                    <!-- Figure Image -->
                    <img class="w-100 u-info-v1-4__item-regular g-transition-0_2"
                        src="../../assets/img-temp/400x270/img10.jpg" alt="Image Description">
                    <!-- End Figure Image-->

                    <a class="cbp-caption cbp-singlePageInline u-link-v2" href="../ajax/projects/projects-6.html"></a>

                    <!-- Figure Caption -->
                    <figcaption class="u-info-v1-4__item-hidden g-transition-0_2 g-bg-black g-color-white g-px-30 g-py-10">
                        <h4 class="h6 g-font-weight-500 mb-0">Kathy Reyes</h4>
                        <em class="d-block g-color-white-opacity-0_8 g-font-style-normal g-font-size-13">Design</em>
                    </figcaption>
                    <!-- End Figure Caption-->
                </figure>
                <!-- End Figure -->
            </div>
        </div>
        <!-- End Cubeportfolio container -->
    </section>
    <!-- End Cubeportfolio -->

    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Implementing Plugins -->
    <script src="{{ URL::asset('build/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/dzsparallaxer/dzsparallaxer.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/dzsparallaxer/dzsscroller/scroller.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/dzsparallaxer/advancedscroller/plugin.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/hs-bg-video/hs-bg-video.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/hs-bg-video/vendor/player.min.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ URL::asset('build/assets/js/hs.core.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.header.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.dropdown.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.carousel.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.go-to.js') }}"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ URL::asset('build/assets/vendor/cubeportfolio-full/cubeportfolio/js/jquery.cubeportfolio.min.js') }}">
    </script>

    <!-- JS Unify -->
    <script src="{{ URL::asset('build/assets/js/components/hs.cubeportfolio.js') }}"></script>

    <!-- JS Customization -->
    <script src="{{ URL::asset('build/assets/js/custom.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#js-header'));
            $.HSCore.helpers.HSHamburgers.init('.hamburger');

            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                pageContainer: $('.container'),
                breakpoint: 991
            });

            // initialization of HSDropdown component
            $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
                afterOpen: function() {
                    $(this).find('input[type="search"]').focus();
                }
            });

            // initialization of carousel
            $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
        });

        $(window).on('load', function() {
            // initialization of cubeportfolio
            $.HSCore.components.HSCubeportfolio.init('.cbp');
        });
    </script>
@endsection
