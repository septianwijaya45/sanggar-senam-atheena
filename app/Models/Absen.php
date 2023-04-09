<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $table = 'absens';
    protected $fillable = [
        'id', 'pelatih_id', 'jenis_id', 'tgl_absen', 'created_at', 'updated_at'
    ];
}
