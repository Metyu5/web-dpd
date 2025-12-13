<div id="addModal" class="fixed inset-0 bg-black/40 hidden justify-center items-center z-[999] px-4">
    <div class="bg-white w-full max-w-7xl rounded-xl shadow-xl overflow-hidden animate-scaleIn">

        <div class="px-6 py-4 border-b flex justify-between items-center bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">Tambah Berita</h2>
            <button id="closeAddModal" class="text-gray-500 hover:text-red-600 transition p-2 rounded-lg">✕</button>
        </div>

        <div class="p-6 max-h-[75vh] overflow-y-auto space-y-6">
            <form id="addForm" action="{{ route('admin.store-berita') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block text-sm font-medium mb-1">Judul Berita</label>
                        <input type="text" name="judul" required
                            class="w-full px-4 py-2 rounded border border-gray-300 focus:border-red-600 focus:ring-1 focus:ring-red-600 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Kategori Keterangan</label>
                        <select name="keterangan" required
                            class="w-full px-4 py-2 rounded-sm border border-gray-300 bg-white focus:border-red-600 focus:ring-1 focus:ring-red-600 outline-none">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="utama">Utama</option>
                            <option value="agenda">Agenda</option>
                            <option value="publikasi">Publikasi</option>
                            <option value="berita">Berita</option>
                            <option value="kegiatan">Kegiatan</option>
                            <option value="berita_populer">Berita Populer</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1">Isi Berita</label>
                        <textarea name="isi" rows="5" required
                            class="w-full px-4 py-2 rounded border border-gray-300 focus:border-red-600 focus:ring-1 focus:ring-red-600 outline-none"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1">Foto Berita</label>

                        <div class="flex flex-col items-start gap-3">

                            <img id="previewImage"
                                class="hidden w-48 h-32 object-cover rounded shadow border bg-gray-100">

                            <input id="fotoInput"
                                type="file" name="foto" accept="image/*" required
                                class="block text-sm border border-gray-300 rounded-lg cursor-pointer bg-gray-50
                                        file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                                        file:bg-red-500 file:text-white file:text-sm hover:file:bg-red-400 transition
                                        w-[250px]">
                        </div>
                    </div>


                </div>

                <div class="flex justify-end gap-3 pt-4 border-t">
                    <button type="button" id="closeAddModal2" class="px-4 py-2 bg-red-400 text-white rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>