<div id="kk-{{ $kk->idkk }}" class="g-mb-100"></div>
<section class="g-mb-10">
    <div class="container">
        <header class="text-center g-width-80x--md mx-auto g-mb-10">
            <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                <h6 class="g-font-size-12 g-font-weight-600">Kompetensi Keahlian</h6>
                <h2 class="h3 u-heading-v6__title g-brd-primary g-color-primary g-font-weight-600">
                    {{ $kk->nama_kk }}
                </h2>
            </div>
        </header>

        <div class="row">
            <div class="col-md-3">
                {{-- Logo jurusan --}}
                @php
                    $photo = DB::table('logo_jurusans')->where('kode_kk', $kk->idkk)->first();
                    $imagePath =
                        $photo && $photo->logo
                            ? asset('images/jurusan_logo/' . $photo->logo)
                            : asset('images/jurusan_logo/default.png');
                @endphp
                <img src="{{ $imagePath }}" alt="logo jurusan" class="mx-auto img-fluid d-block">

                <hr class="g-brd-gray-light-v4 g-my-60">

                {{-- Ketua Prodi --}}
                <header class="text-center mx-auto g-mb-10">
                    <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                        <h6 class="g-font-size-12 g-font-weight-600">Ketua Kompetensi Keahlian</h6>
                    </div>
                </header>
                @if (isset($tampilKaprodi[$kk->idkk]))
                    @php $kaprodi = $tampilKaprodi[$kk->idkk]; @endphp
                    <div class="text-center">
                        <img class="img-fluid img-thumbnail g-rounded-10 g-mb-20"
                            src="{{ asset('images/photo-personil/' . $kaprodi->photo) }}"
                            alt="{{ $kaprodi->namalengkap }}">
                        <div class="u-heading-v6-2 text-center text-uppercase g-mb-20">
                            <h6 class="g-font-size-12">
                                {{ trim($kaprodi->gelardepan . ' ' . $kaprodi->namalengkap . ' ' . $kaprodi->gelarbelakang) }}
                            </h6>
                        </div>
                    </div>
                @endif

                <hr class="g-brd-gray-light-v4 g-my-60">

                <style>
                    /* khusus untuk tab tahun ajaran */
                    #tahunAjaranTab-{{ $kk->idkk }} .nav-link {
                        font-size: 0.85rem;
                        padding: 0.3rem 0.6rem;
                    }
                </style>

                {{-- Tab Tahun Ajaran --}}
                <ul class="nav nav-tabs" id="tahunAjaranTab-{{ $kk->idkk }}" role="tablist">
                    @foreach ($tahunAjarans as $ta)
                        <li class="nav-item">
                            <a class="nav-link {{ $ta->id == $tahunAjaranAktif->id ? 'active' : '' }}"
                                id="tab-{{ $kk->idkk }}-{{ $ta->id }}" data-toggle="tab"
                                href="#content-{{ $kk->idkk }}-{{ $ta->id }}">
                                {{ $ta->tahunajaran }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content mt-3" id="tahunAjaranContent-{{ $kk->idkk }}">
                    @foreach ($tahunAjarans as $ta)
                        <div class="tab-pane fade {{ $ta->id == $tahunAjaranAktif->id ? 'show active' : '' }}"
                            id="content-{{ $kk->idkk }}-{{ $ta->id }}">

                            <h6>{{ $kk->nama_kk }} ({{ $ta->tahunajaran }})</h6>
                            <table class="table mt-3 table-bordered" style="font-size: 12px;">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tingkat</th>
                                        <th class="text-center">Rombel</th>
                                        <th class="text-center">Siswa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPerTahunAjaran[$ta->tahunajaran]['jumlahSiswaPerKK'][$kk->idkk] ?? [] as $row)
                                        <tr>
                                            <td align="center">{{ $row->rombel_tingkat }}</td>
                                            <td align="center">{{ $row->jumlah_rombel }}</td>
                                            <td align="center">{{ $row->jumlah_siswa }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td align="center"><strong>Total</strong></td>
                                        <td align="center">
                                            <strong>{{ $dataPerTahunAjaran[$ta->tahunajaran]['totalRombelPerKK'][$kk->idkk] ?? 0 }}</strong>
                                        </td>
                                        <td align="center">
                                            <strong>{{ $dataPerTahunAjaran[$ta->tahunajaran]['totalSiswaPerKK'][$kk->idkk] ?? 0 }}</strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <h6 class="text-danger">
                                {{ terbilang($dataPerTahunAjaran[$ta->tahunajaran]['totalSiswaPerKK'][$kk->idkk] ?? 0) }}
                                orang
                            </h6>

                        </div>
                    @endforeach

                    <hr class="g-brd-gray-light-v4 g-my-60">

                    @php
                        $photo = DB::table('photo_jurusans')->where('kode_kk', $kk->idkk)->first();
                        $imagePath =
                            $photo && $photo->image
                                ? asset('images/jurusan_gmb/' . $photo->image)
                                : asset('images/jurusan_gmb/default.jpg');
                    @endphp
                    <img src="{{ $imagePath }}" alt="photo jurusan"
                        class="img-fluid img-thumbnail g-rounded-10 g-mb-20">
                </div>
            </div>

            <div class="col-md-9">
                <div class="container g-mb-60">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 g-mb-40 g-mb-0--lg">
                            <h2 class="g-color-primary g-font-weight-800">Profil Lulusan:</h2>

                            @if ($kk->idkk == '421')
                                <p class='fs-6 mb-1'>Tujuan Kompetensi Keahlian {{ $kk->nama_kk }}
                                    secara umum mengacu pada isi Undang-Undang Sistem Pendidikan Nasional (UU SPN) pasal
                                    3 dan penjelasan pasal 15 mengenai Tujuan Pendidikan Nasional yang menyebutkan bahwa
                                    pendidikan kejuruan merupakan pendidikan menengah yang mempersiapkan peserta didik
                                    terutama untuk bekerja dalam bidang tertentu.</p>
                                <p class='mb-1 fs-6'>Secara khusus tujuan Program Keahlian {{ $kk->nama_kk }} adalah
                                    membekali peserta didik dengan keterampilan, pengetahuan dan sikap
                                    agar kompeten, dengan kegiatan :</p>
                            @else
                                <p class="mb-0 g-font-size-16">Membekali peserta didik Kompetensi Keahlian
                                    {{ $kk->nama_kk }} dengan
                                    keterampilan, pengetahuan dan sikap agar kompeten dalam :
                                </p>
                            @endif

                            @if (isset($dataProfil[$kk->idkk]['profil_lulusan']))
                                @foreach ($dataProfil[$kk->idkk]['profil_lulusan'] as $item)
                                    <x-variasi-ceklist-one>{{ $item->deskripsi }}</x-variasi-ceklist-one>
                                @endforeach
                            @endif
                        </div>

                        <div class="col-lg-4 col-md-4 g-mb-40 g-mb-0--lg">
                            <h2 class="g-color-primary g-font-weight-800">Prospek Kerja:</h2>
                            @if (isset($dataProfil[$kk->idkk]['prospek_kerja']))
                                @foreach ($dataProfil[$kk->idkk]['prospek_kerja'] as $item)
                                    <x-variasi-ceklist-one>{{ $item->deskripsi }}</x-variasi-ceklist-one>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="u-shadow-v1-5 g-line-height-2 g-pa-40 g-mb-30" role="alert">
                    @if (!empty($personil[$kk->idkk]) && $personil[$kk->idkk]->isNotEmpty())
                        <h2>Guru Produktif {{ $kk->nama_kk }}</h2>
                        <div class="row">
                            @foreach ($personil[$kk->idkk] as $p)
                                <div class="col-sm-7 col-lg-4 g-mb-30">
                                    <div
                                        class="u-shadow-v36 g-brd-around g-brd-7 g-brd-white g-brd-primary--hover rounded g-pos-rel g-transition-0_2">
                                        @if ($p->photo)
                                            <img class="img-fluid"
                                                src="{{ URL::asset('images/photo-personil/' . $p->photo) }}"
                                                alt="{{ $p->namalengkap }}">
                                        @else
                                            <img class="img-fluid"
                                                src="{{ URL::asset('images/welcome/personil/img1.jpg') }}"
                                                alt="Image Description">
                                        @endif
                                    </div>
                                    <p class="text-center">
                                        <span class="g-font-size-12 g-color-gray">
                                            {{ $p->gelardepan }} {{ ucwords(strtolower($p->namalengkap)) }}
                                            {{ $p->gelarbelakang }}
                                        </span>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="u-divider u-divider-solid u-divider-center g-brd-gray-light-v3 g-my-80">
            <a href="#kk-selector">
                <i class="fa fa-angle-up u-divider__icon g-bg-gray-light-v4 g-color-gray-light-v1 rounded-circle"></i>
            </a>
        </div>

    </div>
</section>
