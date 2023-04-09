<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    use HasFactory;
    protected $table = 'pemiliks';
    protected $fillable = [
        'id', 'user_id', 'nama_pemilik', 'tlp_pem', 'alm_pem', 'created_at', 'updated_at'
    ];
}
