<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranAnggota extends Model
{
    use HasFactory;
    protected $table = 'pembayaran_anggotais';
    protected $fillable = [
        'id', 'anggota_id', 'jenis_bayar', 'tgl_bayar', 'jumlah_bayar', 'keterangan', 'created_at', 'updated_at'
    ];
}
