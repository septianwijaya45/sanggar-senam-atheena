<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwals';
    protected $fillable = [
        'id', 'pelatih_id', 'jenis_id', 'tanggal', 'harga', 'created_at', 'updated_at'
    ];
}
