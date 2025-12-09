<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

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
}
