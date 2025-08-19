<?php

namespace App\Models\Kurikulum\PerangkatUjian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengawasUjian extends Model
{
    use HasFactory;
    protected $table = 'pengawas_ujians';
    protected $fillable = [
        'kode_ujian',
        'nomor_ruang',
        'tanggal_ujian',
        'jam_ke',
        'kode_pengawas',
    ];
}
