<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full antialiased scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPD RI - Dewan Perwakilan Daerah Kota Gorontalo</title>
        @vite('resources/css/app.css')
    
    <link rel="icon" href="{{'DPD-RI.png'}}" type="image/png">
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            line-clamp: 3;
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
            <div class="flex gap-4 items-center">
                <a href="/id" class="hover:text-blue-200 font-semibold animate__animated animate__fadeIn">ID</a>
                <span>|</span>
                <a href="/en" class="hover:text-blue-200 animate__animated animate__fadeIn">EN</a>
                <span class="ml-2 text-xs bg-sky-700 px-2 py-1 rounded animate__animated animate__fadeIn">unknown developer</span>
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
                        <p class="text-xs text-gray-600">Dewan Perwakilan Daerah Kota Gorontalo</p>
                    </div>
                </div>
                <nav class="hidden lg:flex gap-8 text-gray-700 font-medium animate__animated animate__fadeInDown">
                    <a href="/" class="hover:text-sky-600 transition border-b-2 border-sky-600 pb-1">Beranda</a>
                    <a href="#berita-utama" class="hover:text-sky-600 transition">Berita</a>
                    <a href="#" class="hover:text-sky-600 transition">Profil</a>
                    <a href="#" class="hover:text-sky-600 transition">Kontak</a>
                </nav>
                <button class="lg:hidden text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>
    <section class="relative bg-gradient-to-br from-sky-600 via-blue-500 to-cyan-500 overflow-hidden ">
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
                        Portal Berita Resmi<br/>DPD Kota Gorontalo
                    </h2>
                </div>
            </div>
            <p class="text-lg md:text-xl text-blue-100 max-w-2xl mb-8 ml-4">
                Informasi terkini seputar kegiatan, kebijakan, dan layanan publik dari Dewan Perwakilan Daerah
            </p>
            <div class="flex gap-4 ml-4">
                <a href="#berita" class="bg-white text-sky-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition shadow-lg">
                    Baca Berita
                </a>
                <a href="#" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-sky-600 transition">
                    Tentang DPD Gorontalo
                </a>
            </div>
        </div>
    </section>
    <section class="bg-gradient-to-r from-sky-600 to-blue-500 text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 py-3">
            <div class="flex items-center gap-4">
                <span class="bg-red-500 text-white px-4 py-1.5 rounded font-bold text-sm whitespace-nowrap">
                    BERITA TERBARU
                </span>
                <div class="flex-1 overflow-hidden">
                    <p class="breaking-news whitespace-nowrap font-semibold">
                        DPD RI Gelar Rapat Paripurna Pembahasan RUU Otonomi Daerah - Selasa, 2 Desember 2025
                    </p>
                </div>
            </div>
        </div>
    </section>
    <main class="max-w-7xl mx-auto px-4 py-12" id="berita">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <div class="lg:col-span-8">
                <div id="berita-utama">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-1.5 h-10 bg-sky-600 rounded-full"></div>
                        <h3 class="text-3xl font-bold text-gray-800">Berita Utama</h3>
                    </div>
                </div>
                <div class="bg-white shadow-xl rounded-2xl overflow-hidden hover-lift mb-12">
                    <div class="relative">
                        <img src="https://www.dpd.go.id/media/berita-lama/berita-20201118_052515-.jpg" 
                             class="w-full h-80 object-cover">
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
                                2 Desember 2025
                            </span>
                            <span>•</span>
                            <span>Pemerintah Daerah</span>
                        </div>
                        <h4 class="text-3xl font-bold text-gray-800 mb-4 hover:text-sky-600 transition cursor-pointer leading-tight">
                            DPD Kota Gorontalo
                        </h4>
                        <p class="text-gray-600 mb-6 leading-relaxed text-lg">
                            Dapatkan update terkini tentang kegiatan, program, dan kebijakan Dewan Perwakilan Daerah Kota Gorontalo untuk kemajuan daerah.
                        </p>
                        <div class="flex items-center justify-between">
                            <a href="#" class="inline-flex items-center gap-2 text-sky-600 font-semibold hover:text-blue-700 transition">
                                Baca Selengkapnya 
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
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
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-white shadow-lg rounded-xl overflow-hidden hover-lift group">
                        <div class="relative overflow-hidden">
                            <img src="https://gorontalo.brmp.pertanian.go.id/storage/assets/uploads/images/berita/o0ZRooU1CdnhHJQ5BTUFgozGiP7PilsBNeVLTMet.png" 
                                 class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute top-3 left-3">
                                <span class="bg-sky-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    Kegiatan
                                </span>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-2 mb-3 text-xs text-gray-500">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                09 Oktober 2025
                            </div>
                            <h4 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-sky-600 transition cursor-pointer line-clamp-2">
                                DPD RI Serap Aspirasi Pelaku UMKM, Dorong Peningkatan Daya Saing Produk Lokal Minyak Kelapa
                            </h4>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                Dalam rangka menjalankan agenda reses, salah satu Anggota Dewan Perwakilan Daerah Republik Indonesia (DPD RI) di Daerah Pemilihan Provinsi Gorontalo Hj. Rahmijati Jahja,  melakukan kunjungan kerja ke salah satu pelaku Usaha Mikro Kecil dan Menengah (UMKM) Helco Melati pengolah minyak kelapa yang berlokasi di Desa Huidu Kecamatan Limboto Barat Kabupaten Gorontalo.
                            </p>
                            <a href="https://gorontalo.brmp.pertanian.go.id/berita/dpd-ri-serap-aspirasi-pelaku-umkm-dorong-peningkatan-daya-saing-produk-lokal-minyak-kelapa#:~:text=09%20Oktober%202025-,DPD%20RI%20Serap%20Aspirasi%20Pelaku%20UMKM%2C%20Dorong%20Peningkatan%20Daya%20Saing,mengedepankan%20syarat%2Dsayarat%20ketentuan%20pengolahan." class="inline-flex items-center gap-1 text-sky-600 text-sm font-semibold hover:gap-2 transition-all">
                                Selengkapnya 
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-xl overflow-hidden hover-lift group">
                        <div class="relative overflow-hidden">
                            <img src="https://www.dpd.go.id/media/WhatsApp%20Image%202025-10-03%20at%2017.37.56.jpeg" 
                                 class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute top-3 left-3">
                                <span class="bg-purple-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    Agenda
                                </span>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-2 mb-3 text-xs text-gray-500">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                03 Oktober 2025
                            </div>
                            <h4 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-sky-600 transition cursor-pointer line-clamp-2">
                                Kantor DPD RI Provinsi Gorontalo Rayakan HUT ke-21 dengan Bakti Sosial dan Beragam Kreativitas
                            </h4>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                DPD RI mengumumkan jadwal kunjungan kerja ke berbagai daerah untuk mendengar aspirasi masyarakat dan meninjau pelaksanaan program pembangunan.
                            </p>
                            <a href="#" class="inline-flex items-center gap-1 text-sky-600 text-sm font-semibold hover:gap-2 transition-all">
                                Selengkapnya 
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-xl overflow-hidden hover-lift group">
                        <div class="relative overflow-hidden">
                            <img src="https://www.dpd.go.id/media/WhatsApp%20Image%202025-05-14%20at%2020.01.30.jpeg" 
                                 class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute top-3 left-3">
                                <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    Publikasi
                                </span>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-2 mb-3 text-xs text-gray-500">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                14 Mei 2025
                            </div>
                            <h4 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-sky-600 transition cursor-pointer line-clamp-2">
                                Komite I DPD RI Bahas Pentingnya Peta Wilayah dalam RUU Kabupaten/Kota
                            </h4>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                               dpd.go.id, Jakarta- Komite I Dewan Perwakilan Daerah RI menerima masukan dan usulan Pemerintah Provinsi Sulawesi Tenggara, Sulawesi Utara dan Gorontalo terkait penyempurnaan dasar hukum, karakteristik daerah, hari jadi atau pembentukan daerah, batas daerah, cakupan wilayah, dan pencantuman wilayah serta titik koordinat ke dalam RUU Kabupaten/Kota untuk mencegah potensi sengketa wilayah. Hal ini disampaikan dalam rapat dengar pendapat umum (RDPU) Komite I DPD RI dengan Gubernur Sulawesi Tenggara, Sulawesi Utara dan Gorontalo di Ruang Rapat Komite I, Rabu, 14 Mei 2025.
                            </p>
                            <a href="#" class="inline-flex items-center gap-1 text-sky-600 text-sm font-semibold hover:gap-2 transition-all">
                                Selengkapnya 
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-xl overflow-hidden hover-lift group">
                        <div class="relative overflow-hidden">
                            <img src="https://www.dpd.go.id/media/Terbitan/WhatsApp%20Image%202024-04-02%20at%2020.02.29%20%281%29.jpeg" 
                                 class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute top-3 left-3">
                                <span class="bg-orange-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    Berita
                                </span>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-2 mb-3 text-xs text-gray-500">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                02 April 2024 
                            </div>
                            <h4 class="font-bold text-lg text-gray-800 mb-2 group-hover:text-sky-600 transition cursor-pointer line-clamp-2">
                                Ketua DPD RI Berbuka Puasa dengan Senator Terpilih 2024
                            </h4>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                               dpd.go.id - KETUA DPD RI, AA LaNyalla Mahmud Mattalitti berbuka puasa dengan sejumlah Senator terpilih pada Pemilu 14 Februari 2024 lalu di Pelataran Hutan Kota, Jakarta, Selasa (2/4/2024).
                            </p>
                            <a href="#" class="inline-flex items-center gap-1 text-sky-600 text-sm font-semibold hover:gap-2 transition-all">
                                Selengkapnya 
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="text-center mt-10">
                    <button class="bg-sky-600 text-white px-10 py-3 rounded-lg font-semibold hover:bg-blue-700 transition shadow-lg hover:shadow-xl">
                        Muat Berita Lainnya
                    </button>
                </div>

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
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="flex justify-between items-center p-3 rounded-lg hover:bg-blue-50 transition group">
                                <span class="text-gray-700 group-hover:text-sky-600 font-medium">Berita Utama</span>
                                <span class="bg-blue-100 text-sky-700 text-xs px-3 py-1 rounded-full font-semibold">1</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center p-3 rounded-lg hover:bg-blue-50 transition group">
                                <span class="text-gray-700 group-hover:text-sky-600 font-medium">Kegiatan</span>
                                <span class="bg-blue-100 text-sky-700 text-xs px-3 py-1 rounded-full font-semibold">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center p-3 rounded-lg hover:bg-blue-50 transition group">
                                <span class="text-gray-700 group-hover:text-sky-600 font-medium">Agenda</span>
                                <span class="bg-blue-100 text-sky-700 text-xs px-3 py-1 rounded-full font-semibold">8</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex justify-between items-center p-3 rounded-lg hover:bg-blue-50 transition group">
                                <span class="text-gray-700 group-hover:text-sky-600 font-medium">Publikasi</span>
                                <span class="bg-blue-100 text-sky-700 text-xs px-3 py-1 rounded-full font-semibold">8</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bg-gradient-to-br from-sky-600 to-blue-500 text-white shadow-lg rounded-xl p-6">
                    <h4 class="font-bold text-lg mb-5 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Agenda Mendatang
                    </h4>
                    <ul class="space-y-4">
                        <li class="border-l-4 border-white pl-4 py-2 hover:bg-sky-500 rounded-r-lg transition cursor-pointer">
                            <p class="font-semibold text-sm mb-1">DPD RI Konferensi Runtutan Waralaba Dasari</p>
                            <p class="text-xs text-blue-100 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                2 Desember
                            </p>
                        </li>
                        <li class="border-l-4 border-white pl-4 py-2 hover:bg-sky-500 rounded-r-lg transition cursor-pointer">
                            <p class="font-semibold text-sm mb-1">Rapal Resesan Khawasi Ahmad Daendi</p>
                            <p class="text-xs text-blue-100 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                3 Desember
                            </p>
                        </li>
                        <li class="border-l-4 border-white pl-4 py-2 hover:bg-sky-500 rounded-r-lg transition cursor-pointer">
                            <p class="font-semibold text-sm mb-1">Rapal serabitan pada Pubitelasiega S088</p>
                            <p class="text-xs text-blue-100 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                3 Desember
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="bg-white shadow-lg rounded-xl p-6">
                    <h4 class="font-bold text-lg mb-5 text-gray-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-sky-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        Berita Populer
                    </h4>
                    <ul class="space-y-4">
                        <li class="flex gap-3 group cursor-pointer">
                            <img src="https://nasdemdprri.id/storage/app/media/gobel%20melon.jpg" 
                                 class="w-20 h-20 object-cover rounded-lg flex-shrink-0">
                            <div class="flex-1">
                                <h5 class="text-sm font-semibold text-gray-800 group-hover:text-sky-600 transition line-clamp-2 mb-1">
                                    Gobel Prakarsai Kerja Sama Pertanian Hokota-Gorontalo, Kirim Petani Muda ke Jepang
                                </h5>
                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                    15 OKTOBER 2025
                                </div>
                            </div>
                        </li>
                        <li class="flex gap-3 group cursor-pointer">
                            <img src="https://cdn.rri.co.id/berita/Gorontalo/o/1753610912564-IMG-20250727-WA0083/a9iybptz8ig0jaq.jpeg" 
                                 class="w-20 h-20 object-cover rounded-lg flex-shrink-0">
                            <div class="flex-1">
                                <h5 class="text-sm font-semibold text-gray-800 group-hover:text-sky-600 transition line-clamp-2 mb-1">
                                    DPD Golkar Gorontalo Salah Satu Terbaik di Indonesia
                                </h5>
                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                    27 Jul 2025
                                </div>
                            </div>
                        </li>
                        <li class="flex gap-3 group cursor-pointer">
                            <img src="https://asset.tribunnews.com/7R-K64_PpxomGpOdvcveWXU9XaE=/1200x675/filters:upscale():quality(30):format(webp):focal(0.5x0.5:0.5x0.5)/gorontalo/foto/bank/originals/DPD-PDI-Perjuangan-Provinsi-Gorontalo-menggelar-konferensi-pers.jpg" 
                                 class="w-20 h-20 object-cover rounded-lg flex-shrink-0">
                            <div class="flex-1">
                                <h5 class="text-sm font-semibold text-gray-800 group-hover:text-sky-600 transition line-clamp-2 mb-1">
                                    Dinamika Jelang Musda, Persaingan Ketat Perebutan Ketua DPD PDIP Gorontalo
                                </h5>
                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                    Senin, 22 September 2025
                                </div>
                            </div>
                        </li>
                    </ul>
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
                <div class="md:col-span-2">
                    <h4 class="font-bold text-white mb-4 text-sm">Tautan Cepat</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-sky-400 transition flex items-center gap-2">
                            <span class="text-sky-500">›</span> Profil DPD RI
                        </a></li>
                        <li><a href="#" class="hover:text-sky-400 transition flex items-center gap-2">
                            <span class="text-sky-500">›</span> Anggota DPD
                        </a></li>
                        <li><a href="#" class="hover:text-sky-400 transition flex items-center gap-2">
                            <span class="text-sky-500">›</span> Struktur Organisasi
                        </a></li>
                        <li><a href="#" class="hover:text-sky-400 transition flex items-center gap-2">
                            <span class="text-sky-500">›</span> Alat Kelengkapan
                        </a></li>
                    </ul>
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
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-sky-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                            <span class="text-gray-400">unknowndeveloper@gmail.com</span>
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

</body>
</html>