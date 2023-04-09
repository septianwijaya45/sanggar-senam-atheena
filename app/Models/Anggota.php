<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggotais';
    protected $fillable = [
        'id', 'user_id', 'nama_ang', 'almt_ang', 'created_at', 'updated_at'
    ];
}
