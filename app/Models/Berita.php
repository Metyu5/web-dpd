<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    
    protected $table = 'berita'; 

    protected $fillable = [
        'judul_berita', 
        'foto', 
        'keterangan', 
        'tanggal_pembuatan',
        'isi_berita' 
    ];

    // Jika id_berita adalah primary key Anda
    protected $primaryKey = 'id_berita';
    public $incrementing = true;
}