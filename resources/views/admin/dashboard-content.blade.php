<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-red-600 hover:scale-[1.02] transition">
        <div class="flex justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium uppercase">Berita Populer</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $berita_populer_count }}</p>
            </div>
            <div class="text-red-600 bg-red-100 p-3 rounded-full">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l2.44 7.36h7.68l-6.24 4.8L16.88 22l-6.88-4.8L3.2 13.36h7.68L12 2z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-yellow-500 hover:scale-[1.02] transition">
        <div class="flex justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium uppercase">Berita Utama</p>
                {{-- Ganti 9 dengan variabel --}}
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $berita_utama_count }}</p> 
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
                <p class="text-sm text-gray-500 font-medium uppercase">Berita Agenda</p>
                {{-- Ganti 9 dengan variabel --}}
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $berita_agenda_count }}</p> 
            </div>
            <div class="text-blue-600 bg-blue-100 p-3 rounded-full">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 10h10m2 10H5V6h14v14z"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-green-600 hover:scale-[1.02] transition">
        <div class="flex justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium uppercase">Berita Kegiatan</p>
                {{-- Ganti 88 dengan variabel --}}
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $berita_kegiatan_count }}</p> 
            </div>
            <div class="text-green-600 bg-green-100 p-3 rounded-full">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2H10v2H7a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2h-3V2z"></path>
                </svg>
            </div>
        </div>
    </div>
    <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-gray-600 hover:scale-[1.02] transition">
        <div class="flex justify-between">
            <div>
                <p class="text-sm text-gray-500 font-medium uppercase">Berita Biasa</p>
                {{-- Ganti 888 dengan variabel --}}
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $berita_biasa_count }}</p> 
            </div>
            <div class="text-gray-600 bg-gray-100 p-3 rounded-full">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3H6a2 2 0 00-2 2v14a2 2 0 002 2h12a2 2 0 002-2V8l-6-5H10a2 2 0 00-2 2v2H6V5a2 2 0 012-2h4a2 2 0 012 2v2h4V5a2 2 0 00-2-2z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>