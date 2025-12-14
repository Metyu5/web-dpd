<div id="deleteAdminModal" class="fixed inset-0 bg-black/40 hidden justify-center items-center z-[999] px-4">
    <div class="bg-white w-full max-w-md rounded-xl shadow-xl overflow-hidden animate-scaleIn">
        <div class="px-6 py-4 border-b flex justify-between items-center bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Hapus Admin</h2>
            <button id="closeDeleteAdminModal" class="text-gray-500 hover:text-red-600 transition p-2 rounded-lg">✕</button>
        </div>

        <div class="p-6 space-y-4">
            <p class="text-gray-700">Yakin mau hapus akun admin ini? Tindakan ini tidak bisa dibatalkan.</p>
            <p class="text-sm text-red-600 font-medium">Username: <span id="delete_admin_username_text"></span></p>

            <form id="deleteAdminForm" method="POST">
                @csrf
                @method('DELETE')

                <div class="flex justify-end gap-3 pt-4 border-t">
                    <button type="button" id="cancelDeleteAdmin" class="px-4 py-2 bg-gray-300 text-gray-800 rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Hapus Permanen</button>
                </div>
            </form>
        </div>
    </div>
</div>