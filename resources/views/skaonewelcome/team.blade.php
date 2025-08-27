@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Team LCKS
@endsection
@section('css')
    <!-- CSS Global Icons -->
    <link rel="stylesheet"
        href="{{ URL::asset('build/assets/vendor/cubeportfolio-full/cubeportfolio/css/cubeportfolio.min.css') }}">
@endsection
@section('content')
    <section class="container g-pt-100 g-pb-70">
        <!-- Heading -->
        <div class="u-heading-v6-2 text-center g-mb-60">
            <h2 class="h1 u-heading-v6__title g-brd-black g-color-primary g-font-weight-600 text-uppercase mb-0">Meet our
                team
            </h2>
            <p class="lead mb-0">We are creative people focused on the latest developments, <br>straddling the line
                between
                sophistication and simplicity.</p>
        </div>
        <!-- End Heading -->

        @include('skaonewelcome.team-style-2', ['teamPengembang' => $teamPengembang])
    </section>

    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Implementing Plugins -->
    <script src="{{ URL::asset('build/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/cubeportfolio-full/cubeportfolio/js/jquery.cubeportfolio.min.js') }}">
    </script>

    <!-- JS Unify -->
    <script src="{{ URL::asset('build/assets/js/hs.core.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.header.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.tabs.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.go-to.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.carousel.js') }}"></script>
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

            // initialization of video on background
            $.HSCore.helpers.HSBgVideo.init('.js-bg-video');

            // initialization of popups
            $.HSCore.components.HSPopup.init('.js-fancybox');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');

            // initialization of cubeportfolio
            $.HSCore.components.HSCubeportfolio.init('.cbp');
        });
        $(window).on('load', function() {
            // initialization of cubeportfolio
            $.HSCore.components.HSCubeportfolio.init('.cbp');
        });
    </script>
@endsection
