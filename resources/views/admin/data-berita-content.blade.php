<nav class="text-sm mb-6">
    <ol class="inline-flex items-center">
        <li><a href="{{ route('admin.dashboard') }}" class="text-red-700 hover:text-red-900 font-medium">Dashboard</a></li>
        <li class="flex items-center">
            <svg class="w-3 h-3 mx-2 text-gray-400" viewBox="0 0 320 512">
                <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
            </svg>
            <span class="text-gray-500">Manajemen Berita</span>
        </li>
    </ol>
</nav>
<h2 class="text-2xl font-bold text-gray-800 mb-8">Buat dan Edit Berita</h2>

<div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100">
    <div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-6 pb-4 border-b">
        <div>
            <h3 class="text-xl font-semibold text-gray-800">Manajemen Data Berita</h3>
            <p class="text-gray-500 text-sm mt-1">Kelola semua berita, agenda, publikasi dan konten populer.</p>
        </div>

        <div class="flex flex-col md:flex-row items-center gap-4">
            <button id="openAddModal"
                class="px-4 py-2.5 bg-green-600 hover:bg-green-800 text-white text-xs font-semibold rounded-lg  flex items-center gap-2 transition transform hover:scale-102">
                <svg class="w-5 h-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Berita
            </button>

            <div class="relative w-full md:w-80">
                <input type="text" id="searchInput" placeholder="Cari judul berita..."
                    class="w-full px-3 py-2.25 pl-9 border border-gray-400 rounded-lg shadow-sm 
                        focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 text-sm">

                <svg class="w-4 h-4 absolute top-1/2 left-3 -translate-y-1/2 text-gray-500"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
            </div>
        </div>
    </div>

    @if($berita->isEmpty())
    <div class="bg-red-100 p-6 rounded-lg text-center">
        <h3 class="text-xl font-normal  text-red-600 mb-4">Data Berita Kosong</h3>
        <p class="text-sm text-gray-600">Saat ini tidak ada berita yang tersedia. Silakan tambahkan berita baru.</p>
    </div>
    @else
    <div class="overflow-x-auto rounded-xl border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-normal text-gray-700 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-normal text-gray-700 uppercase tracking-wider">Judul Berita</th>
                    <th class="px-6 py-3 text-left text-xs font-normal text-gray-700 uppercase tracking-wider">Isi Berita</th>
                    <th class="px-6 py-3 text-left text-xs font-normal text-gray-700 uppercase tracking-wider">Foto</th>
                    <th class="px-6 py-3 text-left text-xs font-normal text-gray-700 uppercase tracking-wider">Keterangan</th>
                    <th class="px-6 py-3 text-center text-xs font-normal text-gray-700 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($berita as $key => $item)
                <tr class="hover:bg-red-50/50 transition cursor-pointer">
                    <td class="px-6 py-4 text-sm font-normal text-gray-900">{{ $berita->firstItem() + $key }}</td>
                    <td class="px-6 py-4 text-sm font-normal text-gray-800 max-w-xs">{{ $item->judul_berita }}</td>

                    <td class="px-6 py-4 text-sm font-normal text-gray-600 max-w-md">
                        {{ \Illuminate\Support\Str::limit(strip_tags($item->isi_berita), 150) }}
                    </td>

                    <td class="px-6 py-4">
                        <img src="{{ asset($item->foto) }}" class="w-24 h-16 object-cover rounded-lg shadow border focus:outline-none">
                    </td>
                    @php
                    $colorMap = [
                    'utama' => 'bg-yellow-100 text-yellow-800',
                    'agenda' => 'bg-blue-100 text-blue-800',
                    'publikasi' => 'bg-green-100 text-green-800 ',
                    'berita' => 'bg-red-100 text-red-800',
                    'kegiatan' => 'bg-purple-100 text-purple-800',
                    'berita_populer' => 'bg-indigo-100 text-indigo-800',
                    ];
                    $color = $colorMap[$item->keterangan] ?? 'bg-gray-100 text-gray-800';
                    @endphp

                    <td class="px-6 py-4">
                        <span class="px-3 py-1 text-xs font-normal rounded-full {{ $color }}">
                            {{ ucfirst(str_replace('_', ' ', $item->keterangan)) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm flex justify-center gap-2">

                        <button class="btnEdit p-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition"
                            data-id="{{ $item->id_berita }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 17h2m-6 4h10a2 2 0 002-2V7a2 2 0 00-2-2h-3l-2-2h-3l-2 2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </button>

                        <button class="btnDelete p-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition"
                            data-id="{{ $item->id_berita }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    @if($berita->isNotEmpty())
    <div class="flex justify-between items-center mt-6 px-2">
        <p class="text-sm text-gray-600">Menampilkan <span class="font-semibold">{{ $berita->firstItem() }}-{{ $berita->lastItem() }}</span> dari <span class="font-semibold">{{ $berita->total() }}</span> berita</p>
        {{ $berita->links('pagination::tailwind') }}
    </div>
    @endif
</div>


@include('admin.components.tambah-berita-modal')
@include('admin.components.edit-berita-modal')
@include('admin.components.delete-berita-modal')