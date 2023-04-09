<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasukkanPelatih extends Model
{
    use HasFactory;
    protected $table = 'pemasukkan_pelatihs';
    protected $fillable = [
        'id', 'pelatih_id', 'jenis_id', 'tgl_absen', 'jumlah_pempel', 'created_at', 'updated_at'
    ];
}
