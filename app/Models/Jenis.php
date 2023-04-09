<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    protected $table = 'jenises';
    protected $fillable = [
        'id', 'jenis', 'created_at', 'updated_at'
    ];
}
