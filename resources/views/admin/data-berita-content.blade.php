<div class="bg-white p-4 sm:p-6 rounded-2xl shadow-xl border border-gray-100" 
     x-data="newsManager" 
     x-init="init()">
    <div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-6 pb-4 border-b">
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
                <input type="text" id="searchInput" placeholder="Cari judul berita..."
                    class="w-full px-3 py-2.5 pl-9 border border-gray-300 rounded-lg shadow-sm 
                        focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 text-sm transition"
                    x-model.debounce.300ms="searchQuery"> <i class="fas fa-search w-4 h-4 absolute top-1/2 left-3 -translate-y-1/2 text-gray-500"></i>
            </div>
        </div>
    </div>
    
    <template x-if="loading">
        </template>

    <template x-if="!loading && newsData.data.length === 0">
        <div class="bg-red-50 p-6 rounded-xl border border-red-200 text-center">
            <h3 class="text-xl font-normal text-red-600 mb-4" 
                x-text="searchQuery ? 'Hasil Pencarian Tidak Ditemukan' : 'Data Berita Kosong'"></h3>
            <p class="text-sm text-gray-600" 
               x-text="searchQuery ? 'Tidak ada berita yang cocok dengan kata kunci: ' + searchQuery : 'Saat ini tidak ada berita yang tersedia. Silakan tambahkan berita baru.'">
            </p>
        </div>
    </template>
    
    <template x-if="!loading && newsData.data.length > 0">
        <div>
            <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-md">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">No</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider w-1/4">Judul Berita</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider w-2/5">Isi Berita</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Foto</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Keterangan</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        <template x-for="(item, key) in newsData.data" :key="item.id_berita">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-4 text-sm font-medium text-gray-900 whitespace-nowrap" 
                                    x-text="newsData.from + key"></td>
                                
                                <td class="px-4 py-4 text-sm font-medium text-gray-800 whitespace-normal max-w-xs xl:max-w-sm" 
                                    x-text="item.judul_berita">
                                </td>

                                <td class="px-4 py-4 text-sm text-gray-600 whitespace-normal max-w-xs xl:max-w-md" 
                                    x-html="truncateHtml(item.isi_berita, 120)">
                                </td>

                                <td class="px-4 py-4">
                                    <img :src="assetUrl(item.foto)" class="w-20 h-12 object-cover rounded-md shadow focus:outline-none" :alt="item.judul_berita">
                                </td>
                                
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 text-xs font-medium rounded-full" 
                                        :class="getCategoryColorClass(item.keterangan)" 
                                        x-text="getCategoryLabel(item.keterangan)">
                                    </span>
                                </td>
                                
                                <td class="px-4 py-4 text-sm flex justify-center items-center gap-2 whitespace-nowrap">
                                    <button class="btnEdit p-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition duration-150"
                                        :data-id="item.id_berita" title="Edit">
                                        <i class="fas fa-edit w-4 h-4"></i> </button>

                                    <button class="btnDelete p-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition duration-150"
                                        :data-id="item.id_berita" title="Hapus">
                                        <i class="fas fa-trash-alt w-4 h-4"></i> </button>
                                </td>

                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col sm:flex-row justify-between items-center mt-6 px-2 gap-4">
                <p class="text-sm text-gray-600 order-2 sm:order-1" x-show="newsData.total > 0">
                    Menampilkan <span class="font-semibold" x-text="newsData.from">-<span x-text="newsData.to"></span></span> dari <span class="font-semibold" x-text="newsData.total"></span> berita
                </p>
                <div class="order-1 sm:order-2 flex items-center gap-2">
                    <button @click="changePage(newsData.current_page - 1)" 
                            :disabled="newsData.current_page === 1"
                            :class="{'opacity-50 cursor-not-allowed': newsData.current_page === 1}"
                            class="px-3 py-1 border rounded-lg text-sm transition duration-150 hover:bg-gray-100">
                        &laquo; Sebelumnya
                    </button>
                    <span class="text-sm font-medium text-gray-700" x-text="newsData.current_page"></span>
                    <button @click="changePage(newsData.current_page + 1)" 
                            :disabled="newsData.current_page === newsData.last_page"
                            :class="{'opacity-50 cursor-not-allowed': newsData.current_page === newsData.last_page}"
                            class="px-3 py-1 border rounded-lg text-sm transition duration-150 hover:bg-gray-100">
                        Berikutnya &raquo;
                    </button>
                </div>
            </div>
        </div>
    </template>

</div>

@include('admin.components.tambah-berita-modal')
@include('admin.components.edit-berita-modal')
@include('admin.components.delete-berita-modal')