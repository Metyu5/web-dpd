<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class PublicController extends Controller
{
    public function listBerita()
    {
        $beritaList = Berita::orderBy('tanggal_pembuatan', 'desc')->paginate(9);

        $beritaUtama = Berita::where('keterangan', 'utama')->orderBy('tanggal_pembuatan', 'desc')->first();
        
        return view('berita-content', compact('beritaList', 'beritaUtama'));
    }

    public function showDetailBerita($id_berita, $slug)
    {
        $berita = Berita::findOrFail($id_berita);

        $beritaTerbaru = Berita::where('id_berita', '!=', $id_berita)
                               ->orderBy('tanggal_pembuatan', 'desc')
                               ->take(5)
                               ->get();
        
        return view('berita-detail', compact('berita', 'beritaTerbaru'));
    }
}