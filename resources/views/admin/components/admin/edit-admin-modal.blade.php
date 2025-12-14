<div id="editAdminModal" class="fixed inset-0 bg-black/40 hidden justify-center items-center z-[999] px-4">
    <div class="bg-white w-full max-w-xl rounded-xl shadow-xl overflow-hidden animate-scaleIn">

        <div class="px-6 py-4 border-b flex justify-between items-center bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">Edit Akun Admin</h2>
            <button id="closeEditAdminModal" class="text-gray-500 hover:text-red-600 transition p-2 rounded-lg">✕</button>
        </div>

        <div class="p-6 max-h-[75vh] overflow-y-auto space-y-6">
            <form id="editAdminForm" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" id="edit_admin_id">

                <div>
                    <label class="block text-sm font-medium mb-1">Username</label>
                    <input type="text" name="username" id="edit_admin_username" required
                        class="w-full px-4 py-2 text-sm rounded border border-gray-300 focus:border-green-600 focus:ring-1 focus:ring-green-600 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" id="edit_admin_email" required
                        class="w-full px-4 py-2 text-sm rounded border border-gray-300 focus:border-green-600 focus:ring-1 focus:ring-green-600 outline-none">
                </div>

                <div class="text-sm font-semibold text-gray-700 pt-2 border-t mt-4">Ubah Password (Opsional)</div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Password Baru</label>
                        <input type="password" name="password" 
                            class="w-full px-4 py-2 text-sm rounded border border-gray-300 focus:border-green-600 focus:ring-1 focus:ring-green-600 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" 
                            class="w-full px-4 py-2 text-sm rounded border border-gray-300 focus:border-green-600 focus:ring-1 focus:ring-green-600 outline-none">
                    </div>
                </div>
                
                <div class="flex justify-end gap-3 pt-4 border-t">
                    <button type="button" id="closeEditAdminModal2" class="px-4 py-2 text-sm bg-red-400 hover:bg-red-500 text-white rounded ">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-sm text-white rounded hover:bg-green-700">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>