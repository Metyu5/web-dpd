<nav class="text-sm mb-6">
    <ol class="inline-flex items-center">
        <li><a href="{{ route('admin.dashboard') }}" class="text-red-700 hover:text-red-900 font-medium">Dashboard</a></li>
        <li class="flex items-center">
            <svg class="w-3 h-3 mx-2 text-gray-400" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>
            <span class="text-gray-500">Manajemen Berita</span>
        </li>
    </ol>
</nav>

<h2 class="text-3xl font-bold text-gray-800 mb-8">Buat dan Edit Berita</h2>

<div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200">
    <h3 class="text-xl font-semibold mb-6 border-b pb-3">Formulir Berita Baru</h3>
    
    <form action="#" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Berita</label>
                <input type="text" id="judul" name="judul" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-red-500 focus:border-red-500">
            </div>
            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select id="kategori" name="kategori" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-red-500 focus:border-red-500">
                    <option value="">Pilih Kategori</option>
                    <option value="utama">Utama</option>
                    <option value="agenda">Agenda</option>
                    <option value="publikasi">Publikasi</option>
                </select>
            </div>
        </div>
        
        <div class="mt-6">
            <label for="konten" class="block text-sm font-medium text-gray-700 mb-1">Isi Konten Berita</label>
            <textarea id="konten" name="konten" rows="8" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-red-500 focus:border-red-500"></textarea>
        </div>
        
        <div class="mt-6">
            <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Upload Foto Utama</label>
            <input type="file" id="foto" name="foto" class="mt-1 block w-full text-sm text-gray-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-red-50 file:text-red-700
                hover:file:bg-red-100
            ">
            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG. Ukuran maksimal 2MB.</p>
        </div>
        
        <div class="mt-8">
            <button type="submit" class="w-full md:w-auto bg-red-800 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition duration-150">
                Publikasikan Berita
            </button>
        </div>
    </form>
</div>