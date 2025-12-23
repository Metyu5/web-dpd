<div id="addAdminModal" class="fixed inset-0 bg-black/40 hidden justify-center items-center z-[999] px-4">
    <div class="bg-white w-full max-w-xl rounded-xl shadow-xl overflow-hidden animate-scaleIn">

        <div class="px-6 py-4 border-b  flex justify-between items-center bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">Tambah Akun</h2>
            <button id="closeAddAdminModal" class="text-gray-500 hover:text-red-600 transition p-2 rounded-lg">✕</button>
        </div>

        <div class="p-6 max-h-[75vh] overflow-y-auto space-y-6">
            <form id="addAdminForm" action="{{ route('admin.store-admin') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium mb-1">Username</label>
                    <input type="text" name="username" required autocomplete="username"
                        placeholder="Masukkan username admin baru"
                        class="w-full px-4 py-2 text-sm rounded border border-gray-300 focus:border-green-600 focus:ring-1 focus:ring-green-600 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" required autocomplete="email"
                        placeholder="Contoh: admin@dpd.go.id"
                        class="w-full px-4 py-2 text-sm rounded border border-gray-300 focus:border-green-600 focus:ring-1 focus:ring-green-600 outline-none">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Password</label>
                        <input type="password" name="password" required
                            placeholder="Masukkan password (min. 8 karakter)" autocomplete="new-password"
                            class="w-full px-4 py-2 text-sm rounded border border-gray-300 focus:border-green-600 focus:ring-1 focus:ring-green-600 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required autocomplete="new-password"
                            placeholder="Ulangi password di atas"
                            class="w-full px-4 py-2 text-sm rounded border border-gray-300 focus:border-green-600 focus:ring-1 focus:ring-green-600 outline-none">
                    </div>
                </div>
                
                <div class="flex justify-end gap-3 pt-4 border-t">
                    <button type="button" id="closeAddAdminModal2" class="px-4 py-2 text-sm bg-red-400 hover:bg-red-500 text-white rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white text-sm rounded hover:bg-green-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>