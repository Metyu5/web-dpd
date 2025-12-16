<nav class="text-sm mb-6">
    <ol class="inline-flex items-center space-x-2">
        <li><a href="{{ route('admin.dashboard') }}" class="text-red-700 hover:text-red-900 font-medium transition duration-150">Dashboard</a></li>
        <li class="flex items-center">
            <i class="fas fa-chevron-right w-3 h-3 mx-2 text-gray-400"></i>
            <span class="text-gray-500">Manajemen Berita</span>
        </li>
    </ol>
</nav>

<h2 class="text-2xl font-bold text-gray-800 mb-8">Buat dan Edit Berita</h2>

<div class="bg-white p-4 sm:p-6 rounded-2xl shadow-xl border border-gray-100">
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
                        focus:outline-none focus:ring-1 focus:ring-sky-500 focus:border-sky-500 text-sm transition">

                <i class="fas fa-search w-4 h-4 absolute top-1/2 left-3 -translate-y-1/2 text-gray-500"></i>
            </div>
        </div>
    </div>

    @if($berita->isEmpty())
    <div class="bg-red-50 p-6 rounded-xl border border-red-200 text-center">
        <h3 class="text-xl font-normal text-red-600 mb-4">Data Berita Kosong</h3>
        <p class="text-sm text-gray-600">Saat ini tidak ada berita yang tersedia. Silakan tambahkan berita baru.</p>
    </div>
    @else
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
                @foreach($berita as $key => $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $berita->firstItem() + $key }}</td>
                    
                    <td class="px-4 py-4 text-sm font-medium text-gray-800 whitespace-normal max-w-xs xl:max-w-sm">
                        {{ $item->judul_berita }}
                    </td>

                    <td class="px-4 py-4 text-sm text-gray-600 whitespace-normal max-w-xs xl:max-w-md">
                        {{ \Illuminate\Support\Str::limit(strip_tags($item->isi_berita), 120) }} 
                    </td>

                    <td class="px-4 py-4">
                        <img src="{{ asset($item->foto) }}" class="w-20 h-12 object-cover rounded-md shadow focus:outline-none">
                    </td>
                    @php
                    $colorMap = [
                    'utama' => 'bg-yellow-100 text-yellow-800',
                    'agenda' => 'bg-blue-100 text-blue-800',
                    'publikasi' => 'bg-green-100 text-green-800',
                    'berita' => 'bg-red-100 text-red-800',
                    'kegiatan' => 'bg-purple-100 text-purple-800',
                    'berita_populer' => 'bg-indigo-100 text-indigo-800',
                    ];
                    $color = $colorMap[$item->keterangan] ?? 'bg-gray-100 text-gray-800';
                    @endphp

                    <td class="px-4 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 text-xs font-medium rounded-full {{ $color }}">
                            {{ ucfirst(str_replace('_', ' ', $item->keterangan)) }}
                        </span>
                    </td>
                    
                    <td class="px-4 py-4 text-sm flex justify-center items-center gap-2 whitespace-nowrap">
                        <button class="btnEdit p-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition duration-150"
                            data-id="{{ $item->id_berita }}" title="Edit">
                            <i class="fas fa-edit w-4 h-4"></i> </button>

                        <button class="btnDelete p-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition duration-150"
                            data-id="{{ $item->id_berita }}" title="Hapus">
                            <i class="fas fa-trash-alt w-4 h-4"></i> </button>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    @if($berita->isNotEmpty())
    <div class="flex flex-col sm:flex-row justify-between items-center mt-6 px-2 gap-4">
        <p class="text-sm text-gray-600 order-2 sm:order-1">
            Menampilkan <span class="font-semibold">{{ $berita->firstItem() }}-{{ $berita->lastItem() }}</span> dari <span class="font-semibold">{{ $berita->total() }}</span> berita
        </p>
        <div class="order-1 sm:order-2">
            {{ $berita->links('pagination::tailwind') }}
        </div>
    </div>
    @endif
</div>


@include('admin.components.tambah-berita-modal')
@include('admin.components.edit-berita-modal')
@include('admin.components.delete-berita-modal')