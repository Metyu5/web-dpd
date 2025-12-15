<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{

public function getBerandaData()
{
    $beritaUtama = Berita::where('keterangan', 'utama')
        ->orderBy('tanggal_pembuatan', 'desc')
        ->first();
    
    $beritaTerkini = Berita::whereNotIn('keterangan', ['utama', 'berita_populer'])
        ->orderBy('tanggal_pembuatan', 'desc')
        ->take(4)
        ->get()
        ->map(function($berita) {
            return [
                'id_berita' => $berita->id_berita,
                'judul_berita' => $berita->judul_berita,
                'isi_berita' => strip_tags(substr($berita->isi_berita, 0, 200)) . '...',
                'keterangan' => $berita->keterangan,
                'foto_url' => asset($berita->foto),
                'tanggal' => \Carbon\Carbon::parse($berita->tanggal_pembuatan)->translatedFormat('d F Y'),
            ];
        });
    
    $beritaPopuler = Berita::where('keterangan', 'berita_populer')
        ->orderBy('tanggal_pembuatan', 'desc')
        ->take(3)
        ->get()
        ->map(function($berita) {
            return [
                'id_berita' => $berita->id_berita,
                'judul_berita' => $berita->judul_berita,
                'foto_url' => asset($berita->foto),
                'tanggal' => \Carbon\Carbon::parse($berita->tanggal_pembuatan)->translatedFormat('d F Y'),
            ];
        });
    
    $kategoriCount = [
        'utama' => Berita::where('keterangan', 'utama')->count(),
        'kegiatan' => Berita::where('keterangan', 'kegiatan')->count(),
        'agenda' => Berita::where('keterangan', 'agenda')->count(),
        'publikasi' => Berita::where('keterangan', 'publikasi')->count(),
    ];
    
    return response()->json([
        'success' => true,
        'data' => [
            'beritaUtama' => $beritaUtama ? [
                'id_berita' => $beritaUtama->id_berita,
                'judul_berita' => $beritaUtama->judul_berita,
                'isi_berita' => strip_tags(substr($beritaUtama->isi_berita, 0, 200)) . '...',
                'foto_url' => asset($beritaUtama->foto),
                'tanggal' => \Carbon\Carbon::parse($beritaUtama->tanggal_pembuatan)->translatedFormat('d F Y'),
                'keterangan' => $beritaUtama->keterangan,
            ] : null,
            'beritaTerkini' => $beritaTerkini,
            'beritaPopuler' => $beritaPopuler,
            'kategoriCount' => $kategoriCount,
        ]
    ]);
}


   public function content(Request $request)
    {
        $query = Berita::query();

        if ($request->keterangan) {
            $query->where('keterangan', $request->keterangan);
        }

        $berita = $query
            ->orderBy('tanggal_pembuatan', 'desc')
            ->paginate(6); // Data berita tetap diambil

        return view('berita-content', compact('berita'));
    }
    
    public function getDetail($id)
{
    $berita = Berita::find($id);

    if (!$berita) {
        return response()->json([
            'success' => false,
            'message' => 'Berita tidak ditemukan.'
        ], 404);
    }
    $clean_isi_berita = strip_tags($berita->isi_berita);
    $formatted_isi_berita = collect(preg_split('/(\r\n|\n|\r)/', $clean_isi_berita))
        ->map(fn($line) => trim($line))
        ->filter(fn($line) => $line !== '')
        ->map(fn($line) => "<p class='mb-4'>{$line}</p>") 
        ->implode('');

    return response()->json([
        'success' => true,
        'data' => [
            'id_berita'      => $berita->id_berita,
            'judul_berita'   => $berita->judul_berita,
            'isi_berita'     => $formatted_isi_berita, 
            'keterangan'     => ucwords(str_replace('_', ' ', $berita->keterangan)),
            'foto_url'       => asset($berita->foto),
            'tanggal'        => \Carbon\Carbon::parse($berita->tanggal_pembuatan)->translatedFormat('d F Y'),
        ]
    ]);
}

    public function indexDashboard(Request $request)
    {
        $berita_populer_count = Berita::where('keterangan', 'berita_populer')->count();
        $berita_utama_count = Berita::where('keterangan', 'utama')->count();
        $berita_agenda_count = Berita::where('keterangan', 'agenda')->count();
        $berita_publikasi_count = Berita::where('keterangan', 'publikasi')->count();
        $berita_kegiatan_count = Berita::where('keterangan', 'kegiatan')->count();
        $berita_biasa_count = Berita::where('keterangan', 'berita')->count();

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
