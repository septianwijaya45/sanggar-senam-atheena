<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
    use HasFactory;
    protected $table = 'pelatihs';
    protected $fillable = [
        'id', 'user_id', 'jenis_id', 'nama_pelatih', 'tlp_pelatih', 'almt_pelatih', 'created_at', 'updated_at'
    ];
}
