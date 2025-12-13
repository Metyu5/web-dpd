<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function indexDashboard(Request $request)
    {
        // Hitung semua data (seperti di dashboardData)
        $berita_populer_count = Berita::where('keterangan', 'berita_populer')->count();
        $berita_utama_count = Berita::where('keterangan', 'utama')->count();
        $berita_agenda_count = Berita::where('keterangan', 'agenda')->count();
        $berita_publikasi_count = Berita::where('keterangan', 'publikasi')->count();
        $berita_kegiatan_count = Berita::where('keterangan', 'kegiatan')->count();
        $berita_biasa_count = Berita::where('keterangan', 'berita')->count();

        // Me-return view dashboard.blade.php dan melewatkan data ke dalamnya.
        // Data ini akan tersedia untuk @include('admin.dashboard-content')
        return view('admin.dashboard', compact(
            'berita_populer_count',
            'berita_utama_count',
            'berita_agenda_count',
            'berita_publikasi_count',
            'berita_kegiatan_count',
            'berita_biasa_count'
        ));
    }
    public function dashboardData(Request $request)
    {
        $berita_populer_count = Berita::where('keterangan', 'berita_populer')->count();
        $berita_utama_count = Berita::where('keterangan', 'utama')->count();
        $berita_agenda_count = Berita::where('keterangan', 'agenda')->count();
        $berita_publikasi_count = Berita::where('keterangan', 'publikasi')->count();
        $berita_kegiatan_count = Berita::where('keterangan', 'kegiatan')->count();
        $berita_biasa_count = Berita::where('keterangan', 'berita')->count();


        return view('admin.dashboard-content', compact(
            'berita_populer_count',
            'berita_utama_count',
            'berita_agenda_count',
            'berita_publikasi_count',
            'berita_kegiatan_count',
            'berita_biasa_count'
        ));
    }


    public function index(Request $request)
    {
        $query = Berita::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('judul_berita', 'like', '%' . $search . '%')
                ->orWhere('isi_berita', 'like', '%' . $search . '%')
                ->orWhere('keterangan', 'like', '%' . $search . '%');
        }
        
        $berita = $query->paginate(5);

        return view('admin.data-berita-content', compact('berita'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'keterangan' => 'required|in:utama,agenda,publikasi,berita,kegiatan,berita_populer',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'judul.required' => 'Judul berita wajib diisi.',
            'isi.required' => 'Isi berita wajib diisi.',
            'keterangan.required' => 'Kategori keterangan wajib dipilih.',
            'foto.required' => 'Foto berita wajib diupload.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $folder = 'images/berita';
            $path = $request->file('foto')->store($folder, 'public');
            $path = 'storage/' . $path;
        }
        Berita::create([
            'judul_berita' => $request->judul,
            'isi_berita' => $request->isi,
            'keterangan' => $request->keterangan,
            'foto' => $path,
            'tanggal_pembuatan' => now(),
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil ditambahkan!'
            ]);
        }

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }


    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul_berita' => 'required|string|max:255',
            'isi' => 'required|string',
            'keterangan' => 'required|in:utama,agenda,publikasi,berita,kegiatan,berita_populer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berita->judul_berita = $request->judul_berita;
        $berita->isi_berita = $request->isi;
        $berita->keterangan = $request->keterangan;

        if ($request->hasFile('foto')) {
            if ($berita->foto && file_exists(public_path($berita->foto))) {
                unlink(public_path($berita->foto));
            }
            $path = $request->file('foto')->store('images/berita', 'public');
            $berita->foto = 'storage/' . $path;
        }

        $berita->save();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil diperbarui!'
            ]);
        }

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    public function get($id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        return response()->json([
            'id_berita'      => $berita->id_berita,
            'judul_berita'   => $berita->judul_berita,
            'isi_berita'     => $berita->isi_berita,
            'keterangan'     => $berita->keterangan,
            'foto'           => $berita->foto,
        ]);
    }


    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->foto && file_exists(public_path($berita->foto))) {
            unlink(public_path($berita->foto));
        }

        $berita->delete();

        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Berita berhasil dihapus!'
            ]);
        }

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus!');
    }
}
