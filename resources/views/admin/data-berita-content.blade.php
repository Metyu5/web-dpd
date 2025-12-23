<div class="bg-white p-4 sm:p-6 rounded-2xl shadow-xl border border-gray-100" 
     x-data="newsManager" 
     x-cloak>
    
    <div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-6 pb-4 ">
        <div>
            <h3 class="text-xl font-semibold text-gray-800">Manajemen Data Berita</h3>
            <p class="text-gray-500 text-sm mt-1">Kelola semua berita, agenda, publikasi dan konten populer.</p>
        </div>

        <div class="flex flex-col sm:flex-row items-center gap-4 w-full md:w-auto">
            <button id="openAddModal"
                class="w-full sm:w-auto px-4 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg flex items-center justify-center gap-2 transition duration-150 transform hover:scale-[1.02]">
                <i class="fas fa-plus w-4 h-4"></i> Tambah Berita
            </button>

            <div class="relative w-full md:w-80">
                <input type="text" placeholder="Cari judul berita..."
                    class="w-full px-3 py-2.5 pl-9 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-1 focus:ring-sky-500 text-sm transition"
                    x-model.debounce.300ms="searchQuery"> 
                <i class="fas fa-search w-4 h-4 absolute top-1/2 left-3 -translate-y-1/2 text-gray-500"></i>
            </div>
        </div>
    </div>
    
    <template x-if="loading">
        <div class="flex justify-center py-10">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-green-600"></div>
        </div>
    </template>

    <template x-if="!loading && newsData && newsData.data && newsData.data.length === 0">
        <div class="bg-red-50 p-6 rounded-xl border border-red-200 text-center">
            <h3 class="text-xl font-normal text-red-600 mb-4" 
                x-text="searchQuery ? 'Hasil Pencarian Tidak Ditemukan' : 'Data Berita Kosong'"></h3>
            <p class="text-sm text-gray-600" 
               x-text="searchQuery ? 'Tidak ada berita yang cocok dengan kata kunci: ' + searchQuery : 'Saat ini tidak ada berita yang tersedia.'">
            </p>
        </div>
    </template>
    
    <template x-if="!loading && newsData && newsData.data && newsData.data.length > 0">
        <div>
            <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-md">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase">No</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase w-1/4">Judul</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase w-2/5">Isi</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase">Foto</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase">Keterangan</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-700 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        <template x-for="(item, key) in newsData.data" :key="item.id_berita">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-4 text-sm text-gray-900" x-text="newsData.from + key"></td>
                                <td class="px-4 py-4 text-sm font-medium text-gray-800" x-text="item.judul_berita"></td>
                                <td class="px-4 py-4 text-sm text-gray-600" x-html="truncateHtml(item.isi_berita, 120)"></td>
                                <td class="px-4 py-4">
                                    <img :src="assetUrl(item.foto)" class="w-20 h-12 object-cover rounded shadow">
                                </td>
                                <td class="px-4 py-4">
                                    <span class="px-3 py-1 text-xs rounded-full" 
                                          :class="getCategoryColorClass(item.keterangan)" 
                                          x-text="getCategoryLabel(item.keterangan)">
                                    </span>
                                </td>
                                <td class="px-4 py-4 flex justify-center gap-2">
                                    <button class="btnEdit p-2 bg-blue-100 text-blue-500 rounded-lg" :data-id="item.id_berita">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btnDelete p-2 bg-red-100 text-red-500 rounded-lg" :data-id="item.id_berita">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col sm:flex-row justify-between items-center mt-6 gap-4">
                <p class="text-sm text-gray-600 order-2 sm:order-1">
                    Menampilkan <span class="font-semibold" x-text="newsData.from"></span> - 
                    <span class="font-semibold" x-text="newsData.to"></span> dari 
                    <span class="font-semibold" x-text="newsData.total"></span> berita
                </p>
                <div class="flex items-center gap-2 order-1 sm:order-2">
                    <button @click="changePage(newsData.current_page - 1)" 
                            :disabled="newsData.current_page === 1"
                            class="px-3 py-1 border rounded-lg disabled:opacity-50">Sebelumnya</button>
                    <span class="text-sm font-bold" x-text="newsData.current_page"></span>
                    <button @click="changePage(newsData.current_page + 1)" 
                            :disabled="newsData.current_page === newsData.last_page"
                            class="px-3 py-1 border rounded-lg disabled:opacity-50">Berikutnya</button>
                </div>
            </div>
        </div>
    </template>
</div>

@include('admin.components.tambah-berita-modal')
@include('admin.components.edit-berita-modal')
@include('admin.components.delete-berita-modal')