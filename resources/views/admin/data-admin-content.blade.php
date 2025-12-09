<nav class="text-sm mb-6">
    <ol class="inline-flex items-center">
        <li><a href="{{ route('admin.dashboard') }}" class="text-red-700 hover:text-red-900 font-medium">Dashboard</a></li>
        <li class="flex items-center">
            <svg class="w-3 h-3 mx-2 text-gray-400" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>
            <span class="text-gray-500">Data Admin</span>
        </li>
    </ol>
</nav>

<h2 class="text-3xl font-bold text-gray-800 mb-8">Manajemen Data Akun Admin</h2>

<div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
    <div class="flex justify-between items-center mb-4 border-b pb-4">
        <h3 class="text-xl font-semibold">Daftar Akun Admin Aktif</h3>
        <button class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg shadow transition duration-150">
            + Tambah Admin Baru
        </button>
    </div>

    <p class="text-gray-600 mb-4">Gunakan halaman ini untuk mengelola akun-akun yang memiliki akses ke dashboard.</p>
    
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-red-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-red-800 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-red-800 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-red-800 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-red-800 uppercase tracking-wider">Terakhir Login</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-red-800 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Admin Utama</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">admin@dpd.go.id</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2025-12-09 10:00:00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                        <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>