<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full antialiased scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPD RI - Dewan Perwakilan Daerah Kota Gorontalo</title>
            @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="icon" href="{{'DPD-RI.png'}}" type="image/png">
    <style>
    [x-cloak] { 
        display: none !important; 
    }

    [x-ref="scrollContainer"]::-webkit-scrollbar {
        width: 8px;
    }

    [x-ref="scrollContainer"]::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    [x-ref="scrollContainer"]::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    [x-ref="scrollContainer"]::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    body.overflow-hidden {
        overflow: hidden !important;
    }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .hover-lift {
            transition: all 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        .breaking-news {
            animation: slideText 10s linear infinite;
        }
        @keyframes slideText {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
    </style>
</head>
<body class="bg-gray-50">

    <div class="bg-sky-600 text-white text-sm ">
        <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
            <div class="flex gap-4 items-center">
                <span class="flex items-center gap-2 animate__animated animate__fadeIn ">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                    info@dpd.go.id
                </span>
                <span class="flex items-center gap-2 animate__animated animate__fadeIn">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                    085256748481
                </span>
            </div>
        </div>
    </div>

    <header class="bg-white shadow-md sticky top-0 z-50 ">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-3 animate__animated animate__fadeInDown">
                    <img src="{{ asset('DPD-RI.png') }}" class="w-14 h-14" alt="Logo DPD RI">
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">DPD RI</h1>
                        <p class="text-xs text-gray-600">Dewan Perwakilan Daerah Provinsi Gorontalo</p>
                    </div>
                </div>
                <nav class="hidden lg:flex gap-8 text-gray-700 font-medium animate__animated animate__fadeInDown">
                    <a href="/" id="beranda-link" class="hover:text-sky-600 transition border-b-2 border-sky-600 pb-1 menu-link">Beranda</a>
                   <a href="/berita-utama" id="berita-link" class="hover:text-sky-600 transition menu-link">Berita</a>
                    <a href="/profil-content" id="profil-link" class="hover:text-sky-600 transition menu-link">Profil</a>
                    <!-- <a href="/kontak-content" class="hover:text-sky-600 transition">Kontak</a> -->
                </nav>
                <button class="lg:hidden text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>
    
    <section id="hero-section" class="relative bg-gradient-to-br from-sky-600 via-blue-500 to-cyan-500 overflow-hidden ">
        <div class="absolute inset-0 opacity-50">
            <img src="{{ asset('20170303_organisasi_DPD.jpg') }}" 
                 class="w-full h-full object-cover">
        </div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-400 rounded-full filter blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-cyan-600 rounded-full filter blur-3xl opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 py-24 md:py-32">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-1 h-16 bg-white"></div>
                <div class="text-white">
                    <h2 class="text-4xl md:text-5xl font-bold mb-2 leading-tight">
                        Portal Berita Resmi<br/>DPD Provinsi Gorontalo
                    </h2>
                </div>
            </div>
            <p class="text-lg md:text-xl text-blue-100 max-w-2xl mb-8 ml-4">
                Informasi terkini seputar kegiatan, kebijakan, dan layanan publik dari Dewan Perwakilan Daerah
            </p>
            <div class="flex gap-4 ml-4">
                <a href="/berita-utama" class="bg-white text-sky-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition shadow-lg">
                    Baca Berita
                </a>
                <!-- <a href="#" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-sky-600 transition">
                    Tentang DPD Gorontalo
                </a> -->
            </div>
        </div>
    </section>
    <section id="breaking-news-section" class="bg-gradient-to-r from-sky-600 to-blue-500 text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex items-center gap-4">
                <span class="bg-red-500 text-white px-4 py-1.5 rounded font-bold text-sm whitespace-nowrap">
                    BERITA TERBARU
                </span>
                <div class="flex-1 overflow-hidden">
                    <p class="breaking-news whitespace-nowrap font-semibold">
                        Portal Berita Resmi DPD Provinsi Gorontalo - Informasi terkini seputar kegiatan, kebijakan, dan layanan publik dari Dewan Perwakilan Daerah. &nbsp; • &nbsp; Portal Berita Resmi DPD Provinsi Gorontalo - Informasi terkini seputar kegiatan, kebijakan, dan layanan publik dari Dewan Perwakilan Daerah. &nbsp; • &nbsp; Portal Berita Resmi DPD Provinsi Gorontalo - Informasi terkini seputar kegiatan, kebijakan, dan layanan publik dari Dewan Perwakilan Daerah.
                    </p>
                </div>
            </div>
        </div>
    </section>


<main class="max-w-7xl mx-auto px-4 py-12" id="main-content" x-data="berandaData">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <div class="lg:col-span-8">
            
            <div id="berita-utama">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-1.5 h-10 bg-sky-600 rounded-full"></div>
                    <h3 class="text-3xl font-bold text-gray-800">Berita Utama</h3>
                </div>
            </div>

            <template x-if="loading">
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden p-8">
                    <div class="animate-pulse space-y-4">
                        <div class="bg-gray-300 h-80 rounded"></div>
                        <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                        <div class="h-4 bg-gray-300 rounded w-1/2"></div>
                    </div>
                </div>
            </template>

            <template x-if="!loading && !beritaUtama">
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden p-12 text-center">
                    <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h4 class="text-xl font-bold text-gray-400 mb-2">Tidak Ada Berita Utama</h4>
                    <p class="text-gray-500">Belum ada berita utama yang dipublikasikan.</p>
                </div>
            </template>

            <div x-show="!loading && beritaUtama !== null && typeof beritaUtama === 'object'" 
                 x-cloak
                 class="bg-white shadow-xl rounded-2xl overflow-hidden hover-lift mb-12 cursor-pointer"
                 @click="if(beritaUtama?.id_berita) $dispatch('open-modal', { 
                     id: beritaUtama.id_berita, 
                     tanggal: beritaUtama.tanggal || '', 
                     keterangan: beritaUtama.keterangan || '' 
                 })">
                <div class="relative">
                    <img :src="beritaUtama?.foto_url || 'data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22800%22 height=%22320%22%3E%3Crect fill=%22%23e5e7eb%22 width=%22800%22 height=%22320%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 font-size=%2220%22 fill=%22%239ca3af%22 text-anchor=%22middle%22 dy=%22.3em%22%3EImage Not Available%3C/text%3E%3C/svg%3E'" 
                         :alt="beritaUtama?.judul_berita || 'Berita'"
                         class="w-full h-80 object-cover"
                         onerror="this.style.backgroundColor='#f3f4f6'">
                    <div class="absolute top-4 left-4">
                        <span class="bg-sky-600 text-white px-4 py-1.5 rounded-full text-sm font-semibold shadow-lg">
                            Utama
                        </span>
                    </div>
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-3 mb-4 text-sm text-gray-500">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span x-text="beritaUtama?.tanggal || '-'"></span>
                        </span>
                        <span>•</span>
                        <span x-text="getCategoryLabel(beritaUtama?.keterangan || '')"></span>
                    </div>
                    <h4 class="text-3xl font-bold text-gray-800 mb-4 hover:text-sky-600 transition leading-tight" 
                        x-text="beritaUtama?.judul_berita || 'Tidak ada judul'"></h4>
                    <p class="text-gray-600 mb-6 leading-relaxed text-lg" 
                       x-text="beritaUtama?.isi_berita || 'Tidak ada konten'"></p>
                    <div class="flex items-center justify-between">
                        <div class="flex gap-2">
                            <button class="p-2 hover:bg-gray-100 rounded-lg transition">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                            </button>
                            <button class="p-2 hover:bg-gray-100 rounded-lg transition">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 mb-8">
                <div class="w-1.5 h-10 bg-sky-600 rounded-full"></div>
                <h3 class="text-2xl font-bold text-gray-800">Berita Terkini</h3>
            </div>

            <template x-if="loading">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <template x-for="i in 4" :key="'loading-' + i">
                        <div class="bg-white shadow-lg rounded-xl overflow-hidden p-5">
                            <div class="animate-pulse space-y-3">
                                <div class="bg-gray-300 h-52 rounded"></div>
                                <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                                <div class="h-4 bg-gray-300 rounded w-1/2"></div>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            <template x-if="!loading && (!beritaTerkini || beritaTerkini.length === 0)">
                <div class="bg-white shadow-lg rounded-xl p-12 text-center mb-8">
                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <h4 class="text-lg font-bold text-gray-400 mb-2">Tidak Ada Berita Terkini</h4>
                    <p class="text-gray-500">Belum ada berita terkini yang tersedia.</p>
                </div>
            </template>

            <template x-if="showBeritaTerkini">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <template x-for="(item, index) in validBeritaTerkini" :key="item?.id_berita || 'berita-' + index">
                    <div class="bg-white shadow-lg rounded-xl overflow-hidden hover-lift group cursor-pointer"
                        x-show="item && item.id_berita"
                        @click="if(item?.id_berita) $dispatch('open-modal', {
                                 id: item.id_berita, 
                                 tanggal: item.tanggal || '', 
                                 keterangan: item.keterangan || '' 
                             })">
                            <div class="relative overflow-hidden">
                                <img :src="item?.foto_url || '...'" 
                                     :alt="item?.judul_berita || 'Berita'"
                                     class="w-full h-52 object-cover group-hover:scale-110 transition duration-500"
                                     onerror="this.style.backgroundColor='#f3f4f6'">
                                <div class="absolute top-3 left-3">
                                    <span class="text-white px-3 py-1 rounded-full text-xs font-semibold"
                                          :class="getCategoryColor(item.keterangan || '')"
                                          x-text="getCategoryLabel(item.keterangan || '')"></span>
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="flex items-center gap-2 mb-3 text-xs text-gray-500">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                   <span x-text="item?.tanggal || '-'"></span>
                                </div>
                                <h4 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-sky-600 transition line-clamp-2" 
                                    x-text="item?.judul_berita || 'Tidak ada judul'"></h4>
                                <p class="text-sm text-gray-600 line-clamp-3" 
                                   x-text="item?.isi_berita || 'Tidak ada konten'"></p>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            <!-- <template x-if="!loading && beritaTerkini && beritaTerkini.length > 0">
                <div class="text-center mt-10">
                    <button class="bg-sky-600 text-white px-10 py-3 rounded-lg font-semibold hover:bg-blue-700 transition shadow-lg hover:shadow-xl">
                        Muat Berita Lainnya
                    </button>
                </div>
            </template> -->

        </div>

        <aside class="lg:col-span-4 space-y-6">
            
            <div class="bg-white shadow-lg rounded-xl p-6">
                <h4 class="font-bold text-lg mb-4 text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Cari Berita
                </h4>
                <div class="relative">
                    <input type="text" placeholder="Cari berita..." 
                           class="w-full border-2 border-gray-200 rounded-lg px-4 py-3 pr-12 focus:outline-none focus:border-sky-500 transition">
                    <button class="absolute right-2 top-1/2 -translate-y-1/2 bg-sky-600 text-white p-2 rounded-lg hover:bg-blue-700 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-xl p-6">
                <h4 class="font-bold text-lg mb-5 text-gray-800">Kategori</h4>
                
                <template x-if="loading">
                    <div class="space-y-3">
                        <template x-for="i in 4" :key="'kat-load-' + i">
                            <div class="animate-pulse h-12 bg-gray-200 rounded-lg"></div>
                        </template>
                    </div>
                </template>

                <div x-show="!loading" x-cloak>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="flex justify-between items-center p-3 rounded-lg hover:bg-blue-50 transition group">
                                <span class="text-gray-700 group-hover:text-sky-600 font-medium">Berita Utama</span>
                                <span class="bg-blue-100 text-sky-700 text-xs px-3 py-1 rounded-full font-semibold" 
                                      x-text="kategoriCount?.utama || 0"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center p-3 rounded-lg hover:bg-blue-50 transition group">
                                <span class="text-gray-700 group-hover:text-sky-600 font-medium">Kegiatan</span>
                                <span class="bg-blue-100 text-sky-700 text-xs px-3 py-1 rounded-full font-semibold" 
                                      x-text="kategoriCount?.kegiatan || 0"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center p-3 rounded-lg hover:bg-blue-50 transition group">
                                <span class="text-gray-700 group-hover:text-sky-600 font-medium">Agenda</span>
                                <span class="bg-blue-100 text-sky-700 text-xs px-3 py-1 rounded-full font-semibold" 
                                      x-text="kategoriCount?.agenda || 0"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center p-3 rounded-lg hover:bg-blue-50 transition group">
                                <span class="text-gray-700 group-hover:text-sky-600 font-medium">Publikasi</span>
                                <span class="bg-blue-100 text-sky-700 text-xs px-3 py-1 rounded-full font-semibold" 
                                      x-text="kategoriCount?.publikasi || 0"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-xl p-6">
                <h4 class="font-bold text-lg mb-5 text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-sky-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    Berita Populer
                </h4>

                <template x-if="loading">
                    <div class="space-y-4">
                        <template x-for="i in 3" :key="'pop-load-' + i">
                            <div class="flex gap-3">
                                <div class="w-20 h-20 bg-gray-200 rounded-lg animate-pulse"></div>
                                <div class="flex-1 space-y-2">
                                    <div class="h-4 bg-gray-200 rounded animate-pulse"></div>
                                    <div class="h-3 bg-gray-200 rounded w-2/3 animate-pulse"></div>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>

                <template x-if="!loading && (!beritaPopuler || beritaPopuler.length === 0)">
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <p class="text-sm text-gray-500">Tidak ada berita populer</p>
                    </div>
                </template>

                <template x-if="showBeritaPopuler">
                    <ul class="space-y-4">
                        <template x-for="(item, index) in validBeritaPopuler" :key="item?.id_berita || 'populer-' + index">
                        <li class="flex gap-3 group cursor-pointer"
                            x-show="item && item.id_berita"
                            @click="if(item?.id_berita) $dispatch('open-modal', {
                                    id: item.id_berita, 
                                    tanggal: item.tanggal || '', 
                                    keterangan: 'berita_populer' 
                                })">
                                <img :src="item?.foto_url || '...'"
                                     :alt="item?.judul_berita || 'Berita'"
                                     class="w-20 h-20 object-cover rounded-lg flex-shrink-0"
                                     onerror="this.style.backgroundColor='#f3f4f6'">
                                <div class="flex-1">
                                    <h5 x-text="item?.judul_berita || 'Tidak ada judul'"></h5>
                                    <div class="flex items-center gap-2 text-xs text-gray-500">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                        </svg>
                                        
                                       <span x-text="item?.tanggal || '-'"></span>
                                    </div>
                                </div>
                            </li>
                        </template>
                    </ul>
                </template>
            </div>

        </aside>

    </div>
</main>
    <footer class="bg-gray-900 text-gray-300 pt-12 pb-6 mt-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 mb-8">
                
                <div class="md:col-span-4">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('DPD-RI.png') }}" 
                             class="w-12 h-12">
                        <div>
                            <h4 class="font-bold text-white text-lg">DPD RI</h4>
                            <p class="text-xs text-gray-400">Dewan Perwakilan Daerah Provinsi Gorontalo</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed mb-4">
                        Dewan Perwakilan Daerah Provinsi Gorontalo
                    </p>
                    <div class="flex gap-3">
                        <a href="#" class="w-10 h-10 bg-sky-600 rounded-lg flex items-center justify-center hover:bg-blue-700 transition">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-sky-600 rounded-lg flex items-center justify-center hover:bg-blue-400 transition">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/dpdrigorontalo26?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="w-10 h-10 bg-sky-600 rounded-lg flex items-center justify-center hover:bg-red-700 transition">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-sky-600 rounded-lg flex items-center justify-center hover:bg-red-700 transition">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="md:col-span-3">
                    <h4 class="font-bold text-white mb-4 text-sm">Kontak</h4>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-sky-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-gray-400">Jl. Arif Rahman Hakim No.18, Wumialo, Kec. Kota Tengah, Kota Gorontalo, Gorontalo 96138</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-sky-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                            <span class="text-gray-400">085256748481</span>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="border-t border-gray-800 pt-6 text-center">
                <p class="text-sm text-gray-400">
                    © 2025 <span class="text-sky-500 font-semibold">Dewan Perwakilan Daerah Provinsi Gorontalo</span>. Seluruh Hak Cipta Dilindungi.
                </p>
                <div class="flex justify-center gap-4 mt-3 text-xs text-gray-500">
                    <a href="#" class="hover:text-sky-400 transition">Kebijakan Privasi</a>
                    <span>•</span>
                    <a href="#" class="hover:text-sky-400 transition">Syarat & Ketentuan</a>
                    <span>•</span>
                    <a href="#" class="hover:text-sky-400 transition">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

  <script>

document.addEventListener('DOMContentLoaded', function() {
    const mainContent = document.getElementById('main-content');
    const menuLinks = document.querySelectorAll('.menu-link'); 
    const heroSection = document.getElementById('hero-section');
    const breakingNewsSection = document.getElementById('breaking-news-section');
    
    let berandaHTML = null;
    let berandaSaved = false;
    let isNavigating = false;
    let currentPage = '/';
    
    function saveBerandaState() {
    if (!berandaSaved && mainContent) {
        const berandaContainer = mainContent.querySelector('[x-data="berandaData"]');
        if (berandaContainer) {
            const clone = berandaContainer.cloneNode(true);
            berandaHTML = clone.outerHTML;
            berandaSaved = true;
            console.log('💾 Beranda state saved (clean clone)');
        }
    }
}
    
    function showLoading() {
        if (!mainContent) return;
        
        mainContent.innerHTML = `
            <div class="text-center py-20 text-sky-600">
                <svg class="animate-spin h-10 w-10 text-sky-600 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <p class="font-semibold text-xl">Memuat Konten...</p>
            </div>
        `;
    }

    function cleanupAlpine(container) {
        if (!window.Alpine || !container) return;
        
        try {
            const allElements = container.querySelectorAll('*');
            
            allElements.forEach(el => {
                Object.keys(el).forEach(key => {
                    if (key.startsWith('__x') || key.startsWith('_x_') || key === '__alpine_root__') {
                        try {
                            delete el[key];
                        } catch (e) {}
                    }
                });
            });
            
            const dataElements = container.querySelectorAll('[x-data]');
            dataElements.forEach(el => {
                if (el.__x) {
                    try {
                        if (typeof el.__x.$destroy === 'function') {
                            el.__x.$destroy();
                        }
                    } catch (e) {
                        console.warn('Destroy error:', e);
                    }
                    delete el.__x;
                }
            });
            
            console.log('🧹 Aggressive Alpine cleanup complete');
        } catch (error) {
            console.error('⚠️ Cleanup error:', error);
        }
    }

function reinitializeAlpine(container) {
    if (!window.Alpine || !container) {
        console.error('❌ Alpine or container not available');
        return;
    }
    
    setTimeout(() => {
        try {
            console.log('🔄 Reinitializing Alpine...');
            
            const alpineRoot = container.querySelector('[x-data]');
            
            if (alpineRoot) {
                Alpine.initTree(alpineRoot);
                console.log('✅ Alpine reinitialized successfully');
            } else {
                console.warn('⚠️ No Alpine root element found');
            }
        } catch (error) {
            console.error('❌ Alpine reinit error:', error);
            
            setTimeout(() => {
                console.log('🔄 Attempting full page reload...');
                window.location.href = '/';
            }, 1000);
        }
    }, 300);
}

    function loadContent(url, push = true) {
        if (isNavigating) {
            console.log('⚠️ Navigation already in progress');
            return;
        }
        if (url === currentPage) {
            console.log('⚠️ Already on this page');
            return;
        }
        
        isNavigating = true;
        const isBeranda = url === '/'; 
        if (!isBeranda && !berandaSaved) {
            saveBerandaState();
        }
        
        showLoading(); 
        
        let fetchUrl = url;
        if (url === '/profil-content') {
            fetchUrl = '/profil-content/content'; 
        } else if (url === '/berita-utama') {
            fetchUrl = '/berita-utama/content'; 
        }
        if (heroSection) heroSection.style.display = isBeranda ? 'block' : 'none';
        if (breakingNewsSection) breakingNewsSection.style.display = isBeranda ? 'block' : 'none';
        if (push) {
            history.pushState({ path: url }, '', url);
        }
        
        currentPage = url;
if (isBeranda) {
    console.log('🏠 Restoring Beranda...');
    cleanupAlpine(mainContent);
    setTimeout(() => {
        mainContent.innerHTML = '';
        setTimeout(() => {
            if (berandaHTML) {
                mainContent.innerHTML = berandaHTML;
                requestAnimationFrame(() => {
                    reinitializeAlpine(mainContent);
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    isNavigating = false;
                    console.log('✅ Beranda restored successfully');
                });
            } else {
                console.error('❌ Beranda HTML not saved, reloading...');
                window.location.href = '/';
            }
        }, 50);
    }, 150);
    return;
}
        
        fetch(fetchUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                }
                return response.text();
            })
            .then(html => {
                setTimeout(() => {
                    console.log('📄 Loading new page...');
                    
                    cleanupAlpine(mainContent);
                    
                    setTimeout(() => {
                        mainContent.innerHTML = html;
                        reinitializeAlpine(mainContent);
                        
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                        isNavigating = false;
                    }, 150);
                }, 100);
            })
            .catch(error => {
                mainContent.innerHTML = `
                    <div class="text-center py-20 text-red-600 font-semibold text-xl">
                        Terjadi kesalahan saat memuat konten.
                        <p class="text-sm text-gray-500 mt-2">${error.message}</p>
                        <button onclick="window.location.reload()" 
                                class="mt-4 bg-sky-600 text-white px-6 py-2 rounded-lg hover:bg-sky-700">
                            Muat Ulang Halaman
                        </button>
                    </div>`;
                console.error('❌ Fetch error:', error);
                isNavigating = false;
            });
    }
    
    function setActiveLink(clickedLink) {
        if (!clickedLink) return;
        
        menuLinks.forEach(link => {
            link.classList.remove('border-b-2', 'border-sky-600', 'pb-1');
        });
        clickedLink.classList.add('border-b-2', 'border-sky-600', 'pb-1');
    }
    
    function checkInitialUrl() {
        const currentPath = window.location.pathname;
        const menuLinkForPath = document.querySelector(`.menu-link[href="${currentPath}"]`);
        
        if (currentPath !== '/' && menuLinkForPath) {
            saveBerandaState();
            currentPage = currentPath;
            loadContent(currentPath, false); 
            setActiveLink(menuLinkForPath);
        } else {
            const berandaLink = document.getElementById('beranda-link');
            if (berandaLink) {
                setActiveLink(berandaLink);
            }
        }
    }
    
    menuLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');

            if (!href || href.startsWith('#')) {
                return;
            }

            e.preventDefault(); 
            loadContent(href, true); 
            setActiveLink(this);
        });
    });
    
    window.addEventListener('popstate', function(e) {
        const currentPath = window.location.pathname;
        const menuLinkForPath = document.querySelector(`.menu-link[href="${currentPath}"]`);
        
        if (menuLinkForPath) {
            loadContent(currentPath, false); 
            setActiveLink(menuLinkForPath);
        } else if (currentPath === '/') {
            loadContent('/', false);
            const berandaLink = document.getElementById('beranda-link');
            if (berandaLink) {
                setActiveLink(berandaLink);
            }
        }
    });
    
    checkInitialUrl();
    
    console.log('✅ Navigation system initialized');
});
</script>
</body>
</html>