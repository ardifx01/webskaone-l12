<?php

namespace App\Models\WebSite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatAplikasi extends Model
{
    use HasFactory;
    protected $table = 'riwayat_aplikasi';
    protected $fillable = ['judul', 'sub_judul', 'deskripsi'];
}
