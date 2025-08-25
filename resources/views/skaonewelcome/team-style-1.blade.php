<div class="row">
    @foreach ($teamPengembang as $team)
        <div class="col-lg-3 col-sm-6 g-mb-30">
            <!-- Team Block -->
            <figure class="u-block-hover">
                <!-- Figure Image -->
                <img class="w-100" src="{{ asset('images/team/' . $team->photo) }}" alt="{{ $team->namalengkap }}">
                <!-- End Figure Image-->

                <!-- Figure Caption -->
                <figcaption
                    class="u-block-hover__additional--v1 u-block-hover__additional--slide-down g-bg-blue-opacity-0_9 g-pa-30">
                    <div class="u-block-hover__additional--v1 g-flex-middle">
                        <div class="text-center g-flex-middle-item">
                            <h4 class="h4 g-color-white g-mb-5">{{ $team->namalengkap }}</h4>
                            <em
                                class="d-block g-font-style-normal g-font-size-11 g-font-weight-600 text-uppercase g-color-white-opacity-0_9">{{ $team->jabatan }}</em>
                        </div>
                    </div>
                </figcaption>
                <!-- End Figure Caption -->
            </figure>
            <!-- End Team Block -->
        </div>
    @endforeach
</div>
