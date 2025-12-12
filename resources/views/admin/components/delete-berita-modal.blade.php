<div id="deleteModal" class="fixed inset-0 bg-black/40 hidden justify-center items-center z-[999] px-4">
    <div class="bg-white w-full max-w-md rounded-xl shadow-xl overflow-hidden animate-scaleIn">
        <div class="px-6 py-4 border-b flex justify-between items-center bg-gray-50">
            <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Hapus</h2>
            <button id="closeDeleteModal" class="text-gray-500 hover:text-red-600 transition p-2 rounded-lg">✕</button>
        </div>

        <div class="p-6 space-y-4">
            <p class="text-gray-700">Yakin mau hapus berita ini? Tindakan ini tidak bisa dibatalkan.</p>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')

                <div class="flex justify-end gap-3 pt-4 border-t">
                    <button type="button" id="cancelDelete" class="px-4 py-2 bg-gray-300 text-gray-800 rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Hapus</button>
                </div>
            </form>
        </div>
    </div>
    <form id="deleteFormSwal" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>
</div>
