<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Tambahkan ini jika belum ada

class PublicController extends Controller
{
    /**
     * Menampilkan daftar berita (index page).
     */
    public function listBerita()
    {
        // Ambil semua berita, urutkan terbaru, dan paginasi (misal 9 per halaman)
        $beritaList = Berita::orderBy('tanggal_pembuatan', 'desc')->paginate(9);

        // Ambil berita utama untuk highlight
        $beritaUtama = Berita::where('keterangan', 'utama')->orderBy('tanggal_pembuatan', 'desc')->first();
        
        return view('berita-content', compact('beritaList', 'beritaUtama'));
    }

    /**
     * Menampilkan detail berita (full content/isi_berita).
     */
    public function showDetailBerita($id_berita, $slug)
    {
        // Cari berita berdasarkan id_berita
        $berita = Berita::findOrFail($id_berita);

        // Ambil 5 berita terkait/populer di sidebar (opsional)
        $beritaTerbaru = Berita::where('id_berita', '!=', $id_berita)
                               ->orderBy('tanggal_pembuatan', 'desc')
                               ->take(5)
                               ->get();
        
        return view('berita-detail', compact('berita', 'beritaTerbaru'));
    }
}