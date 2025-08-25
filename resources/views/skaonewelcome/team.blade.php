@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Team LCKS
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/hs-bg-video/hs-bg-video.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/fancybox/jquery.fancybox.css') }}">
@endsection
@section('content')
    <section class="container g-pt-100 g-pb-70">
        <!-- Heading -->
        <div class="row justify-content-center text-center g-mb-50">
            <div class="col-lg-9">
                <h2 class="h3 g-color-black g-font-weight-600 text-uppercase mb-2">Meet our team</h2>
                <div class="d-inline-block g-width-35 g-height-2 g-bg-primary mb-2"></div>
                <p class="lead mb-0">We are creative people focused on the latest developments, <br>straddling the line
                    between
                    sophistication and simplicity.</p>
            </div>
        </div>
        <!-- End Heading -->

        @include('skaonewelcome.team-style-1', ['teamPengembang' => $teamPengembang])
    </section>

    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Implementing Plugins -->
    <script src="{{ URL::asset('build/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/hs-bg-video/hs-bg-video.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/hs-bg-video/vendor/player.min.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ URL::asset('build/assets/js/hs.core.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.header.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.dropdown.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.carousel.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.bg-video.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.popup.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.go-to.js') }}"></script>

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
        });
    </script>
@endsection
