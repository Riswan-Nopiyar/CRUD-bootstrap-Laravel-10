<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;

    protected $table = 'kursus';

    protected $fillable = [
        'judul',
        'deskripsi',
        'durasi_mulai',
        'durasi_selesai',
        'link_embed',
        'foto_kursus',
    ];
}
