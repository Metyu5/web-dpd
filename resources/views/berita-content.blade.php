<div>
    <section class="pb-12">

        <div class="flex items-center gap-3 mb-10 border-b pb-4">
            <div class="w-1.5 h-10 bg-sky-600 rounded-full"></div>
            <h3 class="text-3xl font-bold text-gray-800">
                Berita @if(request()->keterangan) {{ ucwords(str_replace('_', ' ', request()->keterangan)) }} @else Utama @endif DPD Provinsi Gorontalo
            </h3>
        </div>

        <p class="text-lg text-gray-600 mb-10 max-w-4xl">
            Kumpulan berita terbaru dan kegiatan yang dilakukan oleh Dewan Perwakilan Daerah (DPD) Republik Indonesia dari Daerah Pemilihan Provinsi Gorontalo.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach ($berita as $item)
            <div
                class="block bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:translate-y-[-5px] cursor-default">
                <img class="w-full h-48 object-cover" src="{{ asset($item->foto) }}" alt="{{ $item->judul_berita }}">

                <div class="p-5">
                    <p class="text-sm font-semibold text-sky-600 capitalize mb-2">{{ ucwords(str_replace('_', ' ', $item->keterangan)) }}</p>

                    <h4 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">
                        {{ $item->judul_berita }}
                    </h4>

                    <p class="text-sm text-gray-500 mb-4 line-clamp-3">
                        {{ \Illuminate\Support\Str::limit(strip_tags($item->isi_berita), 150) }}
                    </p>

                    <div class="flex justify-between items-center mt-4">
                        <button
                            type="button"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transition duration-150 btn-selengkapnya"
                            @click="$dispatch('open-news-modal', { 
                                id: {{ $item->id_berita }}, 
                                tanggal: '{{ \Carbon\Carbon::parse($item->tanggal_pembuatan)->translatedFormat('d F Y') }}',
                                keterangan: '{{ ucwords(str_replace('_', ' ', $item->keterangan)) }}'
                            })">
                            Selengkapnya
                        </button>

                        <span class="text-xs text-gray-400 flex items-center gap-2">
                            <span class="flex items-center" 
                                  x-data="{ 
                                      beritaId: {{ $item->id_berita }},
                                      views: parseInt(localStorage.getItem('berita_view_{{ $item->id_berita }}') || '0')
                                  }"
                                  @berita-view-updated.window="
                                      if ($event.detail.id === beritaId) {
                                          views = $event.detail.views;
                                      }
                                  ">
                                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                                <span x-text="views.toLocaleString('id-ID')"></span> Dilihat
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach

            @if ($berita->isEmpty())
            <div class="col-span-full py-10 text-center">
                <p class="text-xl text-gray-500">Belum ada berita dalam kategori ini.</p>
            </div>
            @endif
        </div>

    </section>

    {{-- Modal Selengkapnya (Alpine.js & AJAX) --}}
    <div
        x-data="newsModal()"
        @open-news-modal.window="openModal($event.detail)"
        @keydown.escape.window="show = false"
        style="position: relative; z-index: 1;">
        
        {{-- Modal Wrapper --}}
        <template x-teleport="body">
            <div
                x-show="show"
                x-cloak
                class="fixed inset-0 overflow-y-auto"
                style="z-index: 99999 !important;"
                aria-labelledby="modal-title"
                role="dialog"
                aria-modal="true">
                
                {{-- Background Overlay - Blur Only --}}
                <div 
                    x-show="show"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click="show = false"
                    class="fixed inset-0 backdrop-blur-md transition-opacity"
                    style="z-index: 99998 !important; background-color: rgba(255, 255, 255, 0.1) !important;"></div>

                {{-- Modal Container --}}
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
                     style="position: relative; z-index: 99999 !important;">
                    
                    {{-- Modal Panel --}}
                    <div
                        x-show="show"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        @click.stop
                        class="relative transform rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-4xl"
                        style="max-height: 85vh; display: flex; flex-direction: column; overflow: hidden;">

                        {{-- Header Modal (Sticky) --}}
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900" x-text="data.judul_berita || 'Detail Berita'"></h3>
                                <button 
                                    @click="show = false"
                                    type="button"
                                    class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Content Modal (Scrollable) --}}
                        <div class="overflow-y-auto flex-1 px-4 py-4 sm:px-6" 
                             x-ref="scrollContainer"
                             style="max-height: calc(85vh - 140px); overflow-y: auto; -webkit-overflow-scrolling: touch;">
                            
                            {{-- Loading State --}}
                            <template x-if="loading">
                                <div class="text-center py-12">
                                    <svg class="animate-spin h-10 w-10 text-sky-600 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <p class="text-gray-600">Memuat berita...</p>
                                </div>
                            </template>

                            {{-- Error State --}}
                            <template x-if="error && !loading">
                                <div class="text-center py-12">
                                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-red-100">
                                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                        </svg>
                                    </div>
                                    <h3 class="mt-4 text-lg font-semibold text-gray-900">Gagal Memuat Berita</h3>
                                    <p class="mt-2 text-sm text-red-600" x-text="error"></p>
                                </div>
                            </template>

                            {{-- Content State --}}
                            <div x-show="!loading && !error">
                                
                                {{-- Gambar Berita --}}
                                <div class="mb-4" x-show="data.foto_url">
                                    <img
                                        :src="data.foto_url"
                                        :alt="data.judul_berita"
                                        class="w-full max-h-96 object-cover rounded-lg">
                                </div>

                                {{-- Meta Info --}}
                                <div class="mb-4 flex flex-wrap gap-3 items-center text-sm">
                                    <span class="flex items-center gap-1 text-gray-500">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                        </svg>
                                        <span x-text="data.tanggal"></span>
                                    </span>
                                    <span class="px-3 py-1 bg-sky-100 text-sky-700 rounded-full text-xs font-semibold capitalize" 
                                          x-text="data.keterangan"></span>
                                    <span class="flex items-center gap-1 text-gray-500">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                        </svg>
                                        <span x-text="data.view_count"></span> Dilihat
                                    </span>
                                </div>

                                {{-- Isi Berita --}}
                                <div class="prose max-w-none">
                                    <div 
                                        x-html="data.isi_berita" 
                                        class="text-gray-700 leading-relaxed space-y-4"></div>
                                </div>

                            </div>
                        </div>

                        {{-- Footer Modal (Sticky) --}}
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 border-t border-gray-200">
                            <button 
                                @click="show = false"
                                type="button"
                                class="inline-flex w-full justify-center rounded-md bg-sky-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-700 sm:ml-3 sm:w-auto">
                                Tutup
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>

<style>
    [x-cloak] { 
        display: none !important; 
    }
</style>