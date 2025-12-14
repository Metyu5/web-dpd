<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function login(Request $request)
    {
        // 1. validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 2. cek apakah email ada di database
        $admin = Admin::where('email', $request->email)->first();

        // 3. jika email tidak ada atau password salah
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Mohon Periksa Kembali Email Dan Password Anda');
        }

        // 4. jika benar → redirect ke dashboard
        session(['admin_id' => $admin->id]);
        return redirect()->route('admin.dashboard');
    }
    
    // Method untuk menampilkan data admin (sudah dibuat sebelumnya)
    public function index(Request $request)
    {
        $query = Admin::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('username', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
        }
        $admins = $query->latest()->paginate(5); 
        return view('admin.data-admin-content', compact('admins'));
    }

    // =======================================================
    // 1. CREATE (Tambah Admin)
    // =======================================================
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', Rule::unique('admins')],
            'email'    => ['required', 'string', 'email', 'max:255', Rule::unique('admins')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        Admin::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => $request->password, // Mutator di Model Admin akan menghashnya
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Admin berhasil ditambahkan!',
        ], 201);
    }
    
    // =======================================================
    // 2. GET (Ambil data Admin untuk form Edit)
    // =======================================================
    public function get($id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['error' => 'Data admin tidak ditemukan'], 404);
        }

        // Tidak perlu mengirim password yang sudah di-hash
        return response()->json([
            'id'       => $admin->id,
            'username' => $admin->username,
            'email'    => $admin->email,
        ]);
    }

    // =======================================================
    // 3. UPDATE (Edit Admin)
    // =======================================================
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $rules = [
            // Abaikan validasi unique email dan username jika nilainya tidak berubah
            'username' => ['required', 'string', 'max:255', Rule::unique('admins')->ignore($admin->id)],
            'email'    => ['required', 'string', 'email', 'max:255', Rule::unique('admins')->ignore($admin->id)],
        ];

        // Hanya validasi password jika diisi
        if ($request->filled('password')) {
            $rules['password'] = ['nullable', 'string', 'min:8', 'confirmed'];
        }

        $request->validate($rules);

        $admin->username = $request->username;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            // Karena Anda sudah memiliki setPasswordAttribute di Model Admin,
            // cukup set nilainya
            $admin->password = $request->password; 
        }
        
        $admin->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Admin berhasil diperbarui!',
        ]);
    }
    
    // =======================================================
    // 4. DELETE (Hapus Admin)
    // =======================================================
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete(); // Menggunakan SoftDeletes

        return response()->json([
            'success' => true,
            'message' => 'Admin berhasil dihapus!',
        ]);
    }
}