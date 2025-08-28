@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Program
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/chosen/chosen.css') }}">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
@endsection
@section('content')
    <!-- Promo Block -->
    <div class="g-bg-img-hero g-bg-cover g-bg-black-opacity-0_1--after"
        style="background-image: url({{ URL::asset('images/sakola/kk.jpg') }});">
        <div class="g-bg-cover g-bg-black-opacity-0_1--after g-pos-rel g-z-index-1">
            <div class="container g-pos-rel g-z-index-1 g-pt-50 g-pb-20">
                <div class="row justify-content-lg-between align-items-md-center">
                    <div class="col-md-6 col-lg-6 g-mb-30">
                        <h1 class="g-color-white g-font-size-35--md">The choice of specialization programs that offers hope
                            to acquire the necessary skills.</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Promo Block -->
    <!-- Program -->
    <section id="kk-selector" class="container g-py-75">
        <div class="container text-center g-mb-20">
            <p>
                @foreach ($kompetensiKeahlians as $kk)
                    <a href="#kk-{{ $kk->idkk }}" class="btn btn-sm btn-outline-primary m-1">
                        {{ $kk->nama_kk }}
                    </a>
                @endforeach
            </p>
        </div>
        @foreach ($kompetensiKeahlians as $kk)
            @include('skaonewelcome.program-tampil', ['kk' => $kk])
        @endforeach
    </section>
    <!-- End Program -->

    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Implementing Plugins -->
    <script src="{{ URL::asset('build/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/chosen/chosen.jquery.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ URL::asset('build/assets/js/hs.core.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.header.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.dropdown.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.select.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.sticky-block.js') }}"></script>
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

            // initialization of custom select
            $.HSCore.components.HSSelect.init('.js-custom-select');

            // initialization of sticky blocks
            setTimeout(function() {
                $.HSCore.components.HSStickyBlock.init('.js-sticky-block');
            }, 300);

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
        });
    </script>
@endsection
