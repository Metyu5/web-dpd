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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Mohon Periksa Kembali Email Dan Password Anda');
        }

        session(['admin_id' => $admin->id]);
        return redirect()->route('admin.dashboard');
    }
    
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
            'password' => $request->password, 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Admin berhasil ditambahkan!',
        ], 201);
    }
    
    public function get($id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json(['error' => 'Data admin tidak ditemukan'], 404);
        }

        return response()->json([
            'id'       => $admin->id,
            'username' => $admin->username,
            'email'    => $admin->email,
        ]);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $rules = [
            'username' => ['required', 'string', 'max:255', Rule::unique('admins')->ignore($admin->id)],
            'email'    => ['required', 'string', 'email', 'max:255', Rule::unique('admins')->ignore($admin->id)],
        ];

        if ($request->filled('password')) {
            $rules['password'] = ['nullable', 'string', 'min:8', 'confirmed'];
        }

        $request->validate($rules);

        $admin->username = $request->username;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            $admin->password = $request->password; 
        }
        
        $admin->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Admin berhasil diperbarui!',
        ]);
    }
    
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete(); 

        return response()->json([
            'success' => true,
            'message' => 'Admin berhasil dihapus!',
        ]);
    }
}