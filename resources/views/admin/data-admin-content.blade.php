<nav class="text-sm mb-6">
    <ol class="inline-flex items-center">
        <li><a href="{{ route('admin.dashboard') }}" class="text-red-700 hover:text-red-900 font-medium">Dashboard</a></li>
        <li class="flex items-center">
            <svg class="w-3 h-3 mx-2 text-gray-400" viewBox="0 0 320 512">
                <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
            </svg>
            <span class="text-gray-500">Data Admin</span>
        </li>
    </ol>
</nav>

<h2 class="text-2xl font-bold text-gray-800 mb-8">Manajemen Data Akun Admin</h2>

{{-- Menggunakan style container yang sama dengan data-berita-content.blade.php --}}
<div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100">
    
    {{-- Menggunakan style header yang sama --}}
    <div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-6 pb-4 border-b">
        <div>
            <h3 class="text-xl font-semibold text-gray-800">Daftar Akun Admin Aktif</h3>
            <p class="text-gray-500 text-sm mt-1">Kelola akun-akun yang memiliki akses ke dashboard.</p>
        </div>

        <div class="flex flex-col md:flex-row items-center gap-4">
            {{-- Mengubah tombol menjadi style Tambah Berita (Green) --}}
            <button id="openAddAdminModal"
                class="px-4 py-2.5 bg-green-600 hover:bg-green-800 text-white text-xs font-semibold rounded-lg  flex items-center gap-2 transition transform hover:scale-102">
                <svg class="w-5 h-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Admin Baru
            </button>

            {{-- Menambahkan input search (untuk konsistensi) --}}
            <div class="relative w-full md:w-80">
                <input type="text" id="searchInputAdmin" placeholder="Cari nama admin..."
                    class="w-full px-3 py-2.25 pl-9 border border-gray-400 rounded-lg shadow-sm 
                        focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 text-sm">

                <svg class="w-4 h-4 absolute top-1/2 left-3 -translate-y-1/2 text-gray-500"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
            </div>
        </div>
    </div>

    {{-- Struktur dan style tabel disesuaikan --}}
    <div class="overflow-x-auto rounded-xl border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            {{-- Header Tabel --}}
            <thead class="bg-gray-50">
                <tr>
                    {{-- Menggunakan text-xs font-normal text-gray-700 --}}
                    <th class="px-6 py-3 text-left text-xs font-normal text-gray-700 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-normal text-gray-700 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-normal text-gray-700 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-normal text-gray-700 uppercase tracking-wider">Terakhir Login</th>
                    <th class="px-6 py-3 text-center text-xs font-normal text-gray-700 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                {{-- Contoh Data --}}
                <tr class="hover:bg-red-50/50 transition cursor-pointer">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-900">1</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">Admin Utama</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-800">admin@dpd.go.id</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-normal text-gray-600">2025-12-09 10:00:00</td>
                    
                    {{-- Aksi diubah menjadi tombol ikon --}}
                    <td class="px-6 py-4 text-sm flex justify-center gap-2">
                        
                        <button class="btnEditAdmin p-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition"
                            data-id="1">
                            {{-- Ikon Edit --}}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-7 1l4-4m-4-4l4 4m-4 4l-4-4m4 4l4 4" />
                            </svg>
                        </button>

                        <button class="btnDeleteAdmin p-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition"
                            data-id="1">
                            {{-- Ikon Hapus (X) --}}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </td>

                </tr>
                {{-- Tambahkan baris data admin lainnya di sini jika ada loop data dinamis --}}
            </tbody>
        </table>
    </div>

    {{-- Jika Anda memiliki fitur paginasi untuk data admin, Anda bisa menambahkannya di sini --}}
</div>

{{-- Pastikan Anda juga menyertakan modal Tambah, Edit, dan Hapus Admin di file ini atau di dashboard.blade.php jika menggunakan SPA. --}}