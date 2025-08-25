@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Current Student
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/chosen/chosen.css') }}">
@endsection
@section('content')
    <!-- Promo Block -->
    <section class="clearfix">
        <div class="g-bg-img-hero g-bg-cover g-bg-black-opacity-0_4--after"
            style="background-image: url({{ URL::asset('images/sakola/misisekolah2.jpg') }});">
            <div class="g-bg-cover g-bg-black-opacity-0_1--after g-pos-rel g-z-index-1">
                <div class="container text-center g-pos-rel g-z-index-1 g-pt-100 g-pb-25">
                    <!-- Promo Block Info -->
                    <div class="g-mb-30">
                        <h1 class="g-color-white g-font-size-30--md">Outstanding Students</h1>
                        <p class="g-color-white-opacity-0_8 g-font-size-14">The condition of the students is more than 1,700+
                            people.</p>
                    </div>
                    <!-- End Promo Block Info -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Promo Block -->

    <!-- Programs -->
    <div class="container g-pt-70">

        <div class="row">
            <div class="col-lg-9 g-mb-70">
                <div class="mb-5">
                    <div class="u-heading-v6-2 text-center g-mb-60">
                        <span class="d-block g-color-gray-dark-v4 g-font-weight-600 g-font-size-13 text-uppercase">Keadaan
                            siswa</span>
                        <h2 id="judul-tahun"
                            class="h1 u-heading-v6__title g-brd-black g-color-primary g-font-weight-600 mb-0">
                            Tahun Ajaran {{ $tahunAjaran[0] ?? '' }}</h2>
                    </div>
                </div>

                <div class="g-px-15 mb-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tahun Ajaran</th>
                                <th>Nama Kompetensi</th>
                                <th>Tingkat</th>
                                <th>Jumlah Rombel</th>
                                <th>Jumlah Siswa</th>
                            </tr>
                        </thead>
                        <tbody id="table-siswa">
                            @include('skaonewelcome.current-students-table-siswa', [
                                'dataSiswa' => $dataSiswa,
                            ])
                        </tbody>
                    </table>

                    <hr class="g-brd-secondary-light-v2 my-5">
                </div>
            </div>

            <div class="col-lg-3 g-mb-70">
                <h3 class="h4">Tahun Ajaran</h3>
                <div id="stickyblock-start">
                    <div class="js-sticky-block g-sticky-block--lg pt-4" data-responsive="true"
                        data-start-point="#stickyblock-start" data-end-point="#stickyblock-end">
                        <!-- Sidebar Links -->
                        <ul class="list-unstyled g-mb-50">
                            @foreach ($tahunAjaran as $tahun)
                                <li class="mb-1">
                                    <a href="#" data-tahun="{{ $tahun }}"
                                        class="tahun-link d-block u-link-v5 g-color-text g-font-size-default rounded g-pl-30--hover g-px-20 g-py-7 {{ $tahunAktif === $tahun ? 'g-color-white g-bg-main' : 'g-bg-secondary g-color-white--hover g-bg-main--hover' }}">
                                        <i class="g-font-size-13 g-pos-rel g-top-2 mr-2 material-icons">arrow_forward</i>
                                        {{ $tahun }}
                                    </a>

                                </li>
                            @endforeach
                        </ul>
                        <!-- End Sidebar Links -->

                        <!-- Twitter Feed -->
                        {{-- <h3 class="h4 mb-4">Twitter Feeds</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="g-brd-bottom g-brd-secondary-light-v2 g-pb-20">
                                <h4 class="h6">RT <a class="g-font-weight-600" href="#">@UofA_Arts:</a> DON'T
                                    MISS</h4>
                                <p class="g-color-text-light-v1 g-font-size-13 mb-0">Political Science's “What Comes Next?
                                    The Political Afterlives of the <a class="g-font-weight-500" href="#">#TRC</a>,
                                    WED/OCT 4/4:30-6 pm… <a class="g-font-weight-500"
                                        href="#">twitter.com/i/web/status/9…</a></p>
                            </li>
                            <li class="g-pt-20">
                                <h4 class="h6">RT <a class="g-font-weight-500" href="#">@UofA_Arts:</a> DON'T
                                    MISS</h4>
                                <p class="g-color-text-light-v1 g-font-size-13 mb-0">Political Science's “What Comes Next?
                                    The Political Afterlives of the <a class="g-font-weight-500" href="#">#TRC</a>,
                                    WED/OCT 4/4:30-6 pm…</p>
                            </li>
                        </ul> --}}
                        <!-- End Twitter Feed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Programs -->

    <hr class="u-divider-linear-gradient u-divider-linear-gradient--gray-light-v2 g-my-50">

    <!-- Call to Action -->
    <div id="stickyblock-end" class="g-pos-rel">
        @include('skaonewelcome.call-to-acction')
    </div>
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

    <!-- AJAX load data berdasarkan tahun ajaran -->
    <script>
        $(document).ready(function() {
            $('.tahun-link').on('click', function(e) {
                e.preventDefault();
                var $this = $(this);
                var tahun = $this.data('tahun');

                $.ajax({
                    url: "{{ url('/skaone/current_students/data') }}/" + tahun,
                    type: "GET",
                    success: function(res) {
                        $('#table-siswa').html(res);
                        $('#judul-tahun').text("Tahun Ajaran " + tahun);

                        // 🔹 reset semua tombol ke state normal
                        $('.tahun-link')
                            .removeClass('g-color-white g-bg-main')
                            .addClass('g-bg-secondary g-color-white--hover g-bg-main--hover');

                        // 🔹 set tombol yang diklik jadi aktif
                        $this
                            .removeClass('g-bg-secondary g-color-white--hover g-bg-main--hover')
                            .addClass('g-color-white g-bg-main');
                    },
                    error: function() {
                        alert("Gagal memuat data siswa!");
                    }
                });
            });
        });
    </script>
@endsection
