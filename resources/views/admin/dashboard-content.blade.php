<nav class="text-sm mb-6">
    <ol class="inline-flex items-center">
        <li>
            <a href="#" class="text-red-700 hover:text-red-900 font-medium">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
            </a>
        </li>
        <li class="flex items-center">
            <svg class="w-3 h-3 mx-2 text-gray-400" viewBox="0 0 320 512">
                <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
            </svg>
            <span class="text-gray-500">Ringkasan Data Berita</span>
        </li>
    </ol>
</nav>

<h2 class="text-3xl font-bold text-gray-800 mb-8">Ringkasan Data</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-red-600 hover:scale-[1.02] transition">
        <div class="flex justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium uppercase">Berita Aktif</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">136</p>
            </div>
            <div class="text-red-600 bg-red-100 p-3 rounded-full">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20v-2h2m-4.5 0a4.5 4.5 0 10-9 0 4.5 4.5 0 019 0zM17 14v6m-6-6v6"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-yellow-500 hover:scale-[1.02] transition">
        <div class="flex justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium uppercase">Berita Dihapus</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">42</p>
            </div>
            <div class="text-yellow-600 bg-yellow-100 p-3 rounded-full">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-blue-600 hover:scale-[1.02] transition">
        <div class="flex justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium uppercase">Berita Baru</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">18</p>
            </div>
            <div class="text-blue-600 bg-blue-100 p-3 rounded-full">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
    <h3 class="text-xl font-semibold mb-4 border-b pb-3">Berita Terbaru (5 Teratas)</h3>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-800 uppercase">Judul</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-800 uppercase">Foto</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-800 uppercase">Keterangan</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-800 uppercase">Kategori</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-800 uppercase">Tanggal</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                <tr>
                    <td class="px-4 py-4 text-sm text-gray-900 truncate max-w-xs">DPD Kota Gorontalo</td>
                    <td class="px-4 py-4 text-sm text-gray-900 truncate">
                        <img src="https://www.dpd.go.id/media/Terbitan/WhatsApp%20Image%202024-04-02%20at%2020.02.29%20%281%29.jpeg" class="w-14 h-14 object-cover rounded-md" alt="Foto DPD">
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-500 max-w-sm">Dapatkan update terkini tentang kegiatan, program, dan kebijakan Dewan Perwakilan Daerah Kota Gorontalo.</td>
                    <td class="px-4 py-4">
                        <span class="px-2 inline-flex text-xs rounded-full bg-yellow-100 text-yellow-800">Utama</span>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-500">2025-12-05</td>
                </tr>

                <tr>
                    <td class="px-4 py-4 text-sm text-gray-900 truncate">Revisi UU Otonomi Khusus</td>
                     <td class="px-4 py-4 text-sm text-gray-900 truncate">
                        <img src="https://gorontalo.brmp.pertanian.go.id/storage/assets/uploads/images/berita/o0ZRooU1CdnhHJQ5BTUFgozGiP7PilsBNeVLTMet.png" class="w-14 h-14 object-cover rounded-md" alt="Foto DPD">
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-500 max-w-sm">DPD RI Serap Aspirasi Pelaku UMKM, Dorong Peningkatan Daya Saing Produk Lokal Minyak Kelapa</td>
                    <td class="px-4 py-4">
                        <span class="px-2 inline-flex text-xs rounded-full bg-red-100 text-red-800">Agenda</span>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-500">2025-12-04</td>
                </tr>

                <tr>
                    <td class="px-4 py-4 text-sm text-gray-900 truncate">Kantor DPD RI Provinsi Gorontalo Rayakan HUT ke-21</td>
                     <td class="px-4 py-4 text-sm text-gray-900 truncate">
                        <img src="https://www.dpd.go.id/media/berita-lama/berita-20201118_052515-.jpg" class="w-14 h-14 object-cover rounded-md" alt="Foto DPD">
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-500 max-w-sm">DPD RI mengumumkan jadwal kunjungan kerja ke berbagai daerah.</td>
                    <td class="px-4 py-4">
                        <span class="px-2 inline-flex text-xs rounded-full bg-green-100 text-green-800">Publikasi</span>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-500">2025-12-03</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
