<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'id', 'pelatih_id', 'foto_event', 'tgl_event', 'harga', 'keterangan', 'created_at', 'updated_at'
    ];
}
