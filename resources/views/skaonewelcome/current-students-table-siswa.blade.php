@php
    $totalRombel = $dataSiswa->sum('jumlah_rombel');
    $totalSiswa = $dataSiswa->sum('jumlah_siswa');
@endphp

@forelse ($dataSiswa as $row)
    <tr>
        <td>{{ $row->tahun_ajaran }}</td>
        <td>{{ $row->kode_kk }} - {{ $row->nama_kk }} [{{ $row->singkatan }}]</td>
        <td class="text-center">{{ $row->rombel_tingkat }}</td>
        <td class="text-center">{{ $row->jumlah_rombel }}</td>
        <td class="text-center">{{ $row->jumlah_siswa }}</td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center">Tidak ada data</td>
    </tr>
@endforelse

@if ($dataSiswa->count())
    <tr class="fw-bold">
        <td colspan="3" class="text-end">TOTAL</td>
        <td class="text-center">{{ $totalRombel }}</td>
        <td class="text-center">{{ $totalSiswa }}</td>
    </tr>
@endif
