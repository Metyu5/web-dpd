<div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100">
    <div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-6 pb-4 border-b">
        <div>
            <h3 class="text-xl font-bold text-gray-800">Manajemen Data Berita</h3>
            <p class="text-gray-500 text-sm mt-1">Kelola semua berita, agenda, publikasi dan konten populer.</p>
        </div>

<div class="flex flex-col md:flex-row items-center gap-4">
   <button id="openAddModal"
    class="px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white text-xs font-semibold 
           rounded-lg shadow flex items-center gap-2 transition">

    <svg class="w-5 h-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 4v16m8-8H4"/>
    </svg>
    Tambah Berita
</button>

    <div class="relative w-full md:w-80">
        <input type="text" placeholder="Cari judul berita..."
            class="w-full px-3 py-2.25 pl-9 border border-gray-400 rounded-lg shadow-sm 
                   focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 text-sm">

        <svg class="w-4 h-4 absolute top-1/2 left-3 -translate-y-1/2 text-gray-500"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z"/>
        </svg>
    </div>


</div>


    </div>
    <div class="overflow-x-auto rounded-xl border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Judul Berita</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Foto</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Keterangan</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <tr class="hover:bg-red-50/50 transition cursor-pointer">
                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">1</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-800 max-w-xs truncate">
                        DPD RI Serap Aspirasi Pelaku UMKM Gorontalo
                    </td>
                    <td class="px-6 py-4">
                        <img src="{{ asset('sample.jpeg') }}"
                            class="w-24 h-16 object-cover rounded-lg shadow border focus:outline-none ">
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-700 rounded-full">
                            Utama
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm flex justify-center gap-3">
                        <button class="flex items-center gap-1 text-indigo-600 hover:text-indigo-800 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 17h2m-6 4h10a2 2 0 002-2V7a2 2 0 00-2-2h-3l-2-2h-3l-2 2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Edit
                        </button>
                        <button class="flex items-center gap-1 text-red-600 hover:text-red-800 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Hapus
                        </button>
                    </td>
                </tr>
                <tr class="hover:bg-red-50/50 transition cursor-pointer">
                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">2</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-800 max-w-xs truncate">
                        DPD Kota Gorontalo
                    </td>
                    <td class="px-6 py-4">
                        <img src="https://www.dpd.go.id/media/berita-lama/berita-20201118_052515-.jpg"
                            class="w-24 h-16 object-cover rounded-lg shadow border focus:outline-none ">
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-700 rounded-full">
                            Kegiatan
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm flex justify-center gap-3">
                        <button class="flex items-center gap-1 text-indigo-600 hover:text-indigo-800 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 17h2m-6 4h10a2 2 0 002-2V7a2 2 0 00-2-2h-3l-2-2h-3l-2 2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Edit
                        </button>
                        <button class="flex items-center gap-1 text-red-600 hover:text-red-800 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Hapus
                        </button>

                    </td>
                </tr>
                <tr class="hover:bg-red-50/50 transition cursor-pointer">
                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">3</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-800 max-w-xs truncate">
                        DPD RI Serap Aspirasi Pelaku UMKM, Dorong Peningkatan Daya Saing Produk Lokal
                    </td>
                    <td class="px-6 py-4">
                        <img src="https://gorontalo.brmp.pertanian.go.id/storage/assets/uploads/images/berita/o0ZRooU1CdnhHJQ5BTUFgozGiP7PilsBNeVLTMet.png"
                            class="w-24 h-16 object-cover rounded-lg shadow border focus:outline-none ">
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-semibold bg-orange-100 text-orange-700 rounded-full">
                            Berita
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm flex justify-center gap-3">
                        <button class="flex items-center gap-1 text-indigo-600 hover:text-indigo-800 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 17h2m-6 4h10a2 2 0 002-2V7a2 2 0 00-2-2h-3l-2-2h-3l-2 2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Edit
                        </button>
                        <button class="flex items-center gap-1 text-red-600 hover:text-red-800 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Hapus
                        </button>

                    </td>
                </tr>
                <tr class="hover:bg-red-50/50 transition cursor-pointer">
                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">4</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-800 max-w-xs truncate">
                        Kantor DPD RI Provinsi Gorontalo Rayakan HUT ke-21 dengan Bakti Sosial
                    </td>
                    <td class="px-6 py-4">
                        <img src="https://www.dpd.go.id/media/WhatsApp%20Image%202025-10-03%20at%2017.37.56.jpeg"
                            class="w-24 h-16 object-cover rounded-lg shadow border focus:outline-none ">
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-semibold bg-purple-100 text-purple-700 rounded-full">
                            Agenda
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm flex justify-center gap-3">
                        <button class="flex items-center gap-1 text-indigo-600 hover:text-indigo-800 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 17h2m-6 4h10a2 2 0 002-2V7a2 2 0 00-2-2h-3l-2-2h-3l-2 2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Edit
                        </button>
                        <button class="flex items-center gap-1 text-red-600 hover:text-red-800 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Hapus
                        </button>

                    </td>
                </tr>
                <tr class="hover:bg-red-50/50 transition cursor-pointer">
                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">5</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-800 max-w-xs truncate">
                        Komite I DPD RI Bahas Pentingnya Peta Wilayah dalam RUU Kabupaten/Kota
                    </td>
                    <td class="px-6 py-4">
                        <img src="https://www.dpd.go.id/media/WhatsApp%20Image%202025-05-14%20at%2020.01.30.jpeg"
                            class="w-24 h-16 object-cover rounded-lg shadow border focus:outline-none ">
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">
                            Publikasi
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm flex justify-center gap-3">
                        <button class="flex items-center gap-1 text-indigo-600 hover:text-indigo-800 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 17h2m-6 4h10a2 2 0 002-2V7a2 2 0 00-2-2h-3l-2-2h-3l-2 2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Edit
                        </button>
                        <button class="flex items-center gap-1 text-red-600 hover:text-red-800 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Hapus
                        </button>

                    </td>
                </tr>
                <tr class="hover:bg-red-50/50 transition cursor-pointer">
                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">6</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-800 max-w-xs truncate">
                       Gobel Prakarsai Kerja Sama Pertanian Hokota-Gorontalo, Kirim Petani Muda
                    </td>
                    <td class="px-6 py-4">
                        <img src="https://nasdemdprri.id/storage/app/media/gobel%20melon.jpg"
                            class="w-24 h-16 object-cover rounded-lg shadow border focus:outline-none ">
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">
                            Publikasi
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm flex justify-center gap-3">
                        <button class="flex items-center gap-1 text-indigo-600 hover:text-indigo-800 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 17h2m-6 4h10a2 2 0 002-2V7a2 2 0 00-2-2h-3l-2-2h-3l-2 2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Edit
                        </button>
                        <button class="flex items-center gap-1 text-red-600 hover:text-red-800 font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Hapus
                        </button>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="flex justify-between items-center mt-6 px-2">

        <p class="text-sm text-gray-600">
            Menampilkan <span class="font-semibold">1-6</span> dari <span class="font-semibold">6</span> berita
        </p>

        <div class="flex items-center gap-1 select-none">
            <button
                class="px-3 py-1.5 border border-gray-300 rounded-lg hover:bg-gray-100 text-sm 
               focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                Sebelumnya
            </button>

            <button
                class="px-3 py-1.5 bg-red-600 text-white rounded-lg text-sm shadow 
               hover:bg-red-700 focus:outline-none focus:ring-1 focus:ring-red-300">
                1
            </button>

            <button
                class="px-3 py-1.5 border border-gray-300 rounded-lg bg-white text-sm 
               hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                2
            </button>

            <button
                class="px-3 py-1.5 border border-gray-300 rounded-lg bg-white text-sm 
               hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                3
            </button>

            <button
                class="px-3 py-1.5 border border-gray-300 rounded-lg hover:bg-gray-100 text-sm 
               focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                Selanjutnya
            </button>
        </div>
    </div>
</div>
<!-- ===================== MODAL TAMBAH BERITA ===================== -->
<div id="addModal"
    class="fixed inset-0 bg-black/40 hidden justify-center items-center z-[999] px-4">

    <div class="bg-white w-full max-w-3xl rounded-xl shadow-xl overflow-hidden animate-scaleIn">

        <!-- Header -->
        <div class="px-6 py-4 border-b flex justify-between items-center bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">
                Tambah Berita
            </h2>
            <button id="closeAddModal"
                class="text-gray-500 hover:text-red-600 transition p-2 rounded-lg">
                ✕
            </button>
        </div>

        <!-- Body -->
        <div class="p-6 max-h-[75vh] overflow-y-auto space-y-6">

            <!-- FORM INPUT -->
            <form id="formAddBerita" class="space-y-5">

                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium mb-1">Judul Berita</label>
                    <input type="text" name="judul" required
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-red-600 focus:ring-1 focus:ring-red-600 outline-none">
                </div>

                <!-- Isi Berita -->
                <div>
                    <label class="block text-sm font-medium mb-1">Isi Berita</label>
                    <textarea name="isi" required rows="5"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-red-600 focus:ring-1 focus:ring-red-600 outline-none resize-none"></textarea>
                </div>

                <!-- Foto Berita -->
                <div>
                    <label class="block text-sm font-medium mb-1">Foto Berita</label>

                    <input id="fotoInput" type="file" accept="image/*"
                        class="block w-full text-sm border border-gray-300 rounded-lg cursor-pointer bg-gray-50 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-red-600 file:text-white file:text-sm hover:file:bg-red-700 transition">

                    <!-- PREVIEW -->
                    <div class="mt-4">
                        <img id="previewImage"
                            class="hidden w-full max-h-64 object-cover rounded-lg shadow-md border">
                    </div>
                </div>

                <!-- Tombol -->
                <div class="flex justify-end gap-3 pt-4 border-t">
                    <button type="button" id="closeAddModal2"
                        class="px-4 py-2.5 rounded-lg bg-gray-100 hover:bg-gray-200 transition">
                        Batal
                    </button>

                    <button type="submit"
                        class="px-4 py-2.5 rounded-lg bg-red-600 text-white font-medium hover:bg-red-700 shadow transition">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
