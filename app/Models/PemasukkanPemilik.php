<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasukkanPemilik extends Model
{
    use HasFactory;
    protected $table = 'pemasukkan_pemiliks';
    protected $fillable = [
        'id', 'pemilik_id', 'tgl_terima', 'jumlah_pempem', 'created_at', 'updated_at'
    ];
}
