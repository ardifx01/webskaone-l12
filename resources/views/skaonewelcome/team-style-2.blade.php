@php
    // Ambil semua jabatan unik dari team_pengembangs
    $jabatans = \App\Models\WebSite\TeamPengembang::select('jabatan')->distinct()->pluck('jabatan');
@endphp

<!-- Cube Portfolio Blocks - Filter -->
<ul id="filterControls1" class="d-block list-inline text-center g-mb-50">
    <li class="list-inline-item cbp-filter-item g-color-black g-color-gray-dark-v5--active g-font-weight-600 g-font-size-13 text-uppercase pr-2 mb-2"
        role="button" data-filter="*">
        Show All
    </li>
    @foreach ($jabatans as $jabatan)
        <li class="list-inline-item cbp-filter-item g-color-black g-color-primary--hover g-color-gray-dark-v5--active g-font-weight-600 g-font-size-13 text-uppercase px-2 mb-2"
            role="button" data-filter=".{{ Str::slug($jabatan) }}">
            {{ $jabatan }}
        </li>
    @endforeach
</ul>
<!-- End Cube Portfolio Blocks - Filter -->

<!-- Cube Portfolio Blocks - Content -->
<div class="cbp" data-controls="#filterControls1" data-animation="quicksand" data-x-gap="30" data-y-gap="30"
    data-media-queries='[{"width": 1500, "cols": 3}, {"width": 1100, "cols": 3}, {"width": 800, "cols": 3}, {"width": 480, "cols": 2}, {"width": 300, "cols": 1}]'>

    @foreach ($teamPengembang as $team)
        <!-- Cube Portfolio Blocks - Item -->
        <div class="cbp-item {{ Str::slug($team->jabatan) }}">
            <div class="u-block-hover g-parent">
                <img class="img-fluid g-transform-scale-1_1--parent-hover g-transition-0_5 g-transition--ease-in-out"
                    src="{{ asset('images/team/' . $team->photo) }}" alt="{{ $team->namalengkap }}">
                <div
                    class="d-flex w-100 h-100 u-block-hover__additional--fade u-block-hover__additional--fade-in g-pos-abs g-top-0 g-left-0 g-transition-0_3 g-transition--ease-in g-pa-20">
                    <ul class="align-items-end flex-column list-inline mt-auto ml-auto mb-0">
                        <li class="list-inline-item">
                            <a class="u-icon-v2 u-icon-size--sm g-brd-white g-color-black g-bg-white rounded-circle"
                                href="mailto:{{ $team->email ?? '#' }}">
                                <i class="icon-communication-095 u-line-icon-pro"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="cbp-lightbox u-icon-v2 u-icon-size--sm g-brd-white g-color-black g-bg-white rounded-circle"
                                href="{{ asset('images/team/' . $team->photo) }}">
                                <i class="icon-communication-017 u-line-icon-pro"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="text-center g-pa-25">
                <h3 class="h5 g-color-black mb-1">{{ $team->namalengkap }}</h3>
                <p class="g-color-gray-dark-v4 mb-0">{{ $team->jabatan }}</p>
                <small class="d-block text-muted">{{ $team->deskripsi }}</small>
            </div>
        </div>
        <!-- End Cube Portfolio Blocks - Item -->
    @endforeach
</div>
