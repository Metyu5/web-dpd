<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin DPD Gorontalo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('DPD-RI.png') }}" type="image/png">
    <style>
        .sidebar-scroll::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }
    @media (min-width: 768px) {
        .sidebar-collapsed {
            width: 0 !important;
            transform: translateX(-100%);
        }

        .content-expanded {
            margin-left: 0 !important;
        }
    }
    </style>
</head>
<body class="bg-white font-sans antialiased text-gray-800">

    <div class="flex h-screen overflow-hidden">
        
        <aside id="sidebar" class="flex-shrink-0 w-64 bg-red-800 text-white shadow-2xl transform transition-all duration-300 ease-in-out md:translate-x-0 -translate-x-full overflow-y-auto sidebar-scroll z-50 fixed md:static md:inset-y-0 inset-y-0">
            <div class="flex flex-col h-full">
                <div class="p-6 flex-shrink-0">
                    <div class="flex justify-between items-center mb-8">
                        <div class="text-center flex-1">
                            <img src="{{ asset('DPD-RI.png') }}" alt="Logo DPD RI" class="w-16 h-16 mx-auto mb-2 filter brightness-110">
                            <span class="text-xl font-semibold tracking-wider uppercase border-b border-red-700 pb-2 block">DPD RI PROVINSI GORONTALO</span>
                        </div>
                        <button id="close-sidebar" class="text-white hover:text-gray-200 focus:outline-none md:hidden p-2 rounded-md hover:bg-red-700 transition duration-150">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <nav class="space-y-2">
                        <a href="#" class="flex items-center p-3 text-sm font-semibold rounded-lg bg-red-700 shadow-inner hover:bg-red-600 transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Dashboard
                        </a>
                        <a href="#" class="flex items-center p-3 text-sm font-medium rounded-lg hover:bg-red-700 transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20v-2h2m-4.5 0a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM17 14v6m-6-6v6"></path>
                            </svg>
                            Data Berita
                        </a>
                        <a href="#" class="flex items-center p-3 text-sm font-medium rounded-lg hover:bg-red-700 transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20v-2h2m-4.5 0a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM17 14v6m-6-6v6"></path>
                            </svg>
                            Data Admin
                        </a>
                        <a href="#" class="flex items-center p-3 text-sm font-medium rounded-lg hover:bg-red-700 transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            Manajemen Berita
                        </a>
                    </nav>
                </div>
                
                <div class="p-6 border-t border-red-700 mt-auto flex-shrink-0">
                       <form action="/" method="POST">
                         @csrf
                         <button 
                        type="submit" 
                        class="flex items-center w-full p-3 text-sm font-medium rounded-lg hover:bg-red-700 transition duration-150 ease-in-out text-left">
                        
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>

                        Keluar
                    </button>
                    </form>
                </div>
            </div>
        </aside>
        <div id="overlay" 
         class="fixed inset-0 bg-black/30 backdrop-blur-sm hidden z-20 md:hidden"></div>

        <div id="main-content" class="flex-1 flex flex-col overflow-hidden transition-all duration-300 ease-in-out bg-gray-100">
            
            <header class="flex items-center justify-between p-4 bg-white border-b border-gray-200 shadow-md sticky top-0 z-40">
                <div class="flex items-center">
                    <button id="sidebar-toggle" class="text-gray-500 hover:text-red-800 focus:outline-none md:hidden mr-4 p-2 rounded-md hover:bg-gray-100 transition duration-150">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <button id="sidebarToggle" class="text-gray-700 text-2xl p-2 mr-4 rounded-md hover:bg-gray-100 transition duration-150 hidden md:inline-flex">
                        ☰
                    </button>

                    <h1 class="text-xl font-semibold text-gray-800 hidden sm:block">Dashboard Admin</h1>
                    
                </div>

                <div class="flex items-center space-x-4">
                    <button class="relative p-2 text-gray-500 hover:text-red-800 focus:outline-none rounded-full hover:bg-gray-100 transition duration-150">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        <span class="absolute top-1 right-1 block h-2 w-2 rounded-full bg-red-600 ring-2 ring-white"></span>
                    </button>

                    <div class="relative group">
                        <button class="flex items-center space-x-2 p-1 rounded-full hover:bg-gray-100 transition duration-150">
                            <img class="w-9 h-9 rounded-full object-cover border border-gray-200" src="https://ui-avatars.com/api/?name=Admin+DPD&background=b91c1c&color=ffffff&size=128&bold=true" alt="User Avatar">
                            <span class="text-sm font-medium text-gray-700 hidden sm:inline">Admin DPD</span>
                            <svg class="w-4 h-4 text-gray-400 hidden sm:inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-700">Profil</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-700">Pengaturan</a>
                                <div class="border-t border-gray-100"></div>
                                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-b-lg">Keluar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-8">

                <nav class="text-sm mb-6">
                    <ol class="inline-flex items-center">
                        <li>
                            <a href="#" class="text-red-700 hover:text-red-900 font-medium">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-3 h-3 mx-2 text-gray-400" viewBox="0 0 320 512">
                                <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
                            </svg>
                            <span class="text-gray-500">Ringkasan Data Berita</span>
                        </li>
                    </ol>
                </nav>

                <h2 class="text-3xl font-bold text-gray-800 mb-8">Ringkasan Data</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                    <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-red-600 hover:scale-[1.02] transition">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-gray-500 font-medium uppercase">Berita Aktif</p>
                                <p class="text-4xl font-bold text-gray-900 mt-1">136</p>
                            </div>
                            <div class="text-red-600 bg-red-100 p-3 rounded-full">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20v-2h2m-4.5 0a4.5 4.5 0 10-9 0 4.5 4.5 0 019 0zM17 14v6m-6-6v6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-yellow-500 hover:scale-[1.02] transition">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-sm text-gray-500 font-medium uppercase">Berita Dihapus</p>
                                <p class="text-4xl font-bold text-gray-900 mt-1">42</p>
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
                                <p class="text-sm text-gray-500 font-medium uppercase">Berita Baru</p>
                                <p class="text-4xl font-bold text-gray-900 mt-1">18</p>
                            </div>
                            <div class="text-blue-600 bg-blue-100 p-3 rounded-full">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                    <h3 class="text-xl font-semibold mb-4 border-b pb-3">Berita Terbaru (5 Teratas)</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-800 uppercase">Judul</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-800 uppercase">Foto</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-800 uppercase">Keterangan</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-800 uppercase">Kategori</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-800 uppercase">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-900 truncate max-w-xs">DPD Kota Gorontalo</td>
                                    <td class="px-4 py-4 text-sm text-gray-900 truncate">
                                        <img src="https://www.dpd.go.id/media/Terbitan/WhatsApp%20Image%202024-04-02%20at%2020.02.29%20%281%29.jpeg" class="w-14 h-14 object-cover rounded-md" alt="Foto DPD">
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500 max-w-sm">Dapatkan update terkini tentang kegiatan, program, dan kebijakan Dewan Perwakilan Daerah Kota Gorontalo.</td>
                                    <td class="px-4 py-4">
                                        <span class="px-2 inline-flex text-xs rounded-full bg-yellow-100 text-yellow-800">Utama</span>
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500">2025-12-05</td>
                                </tr>

                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-900 truncate">Revisi UU Otonomi Khusus</td>
                                     <td class="px-4 py-4 text-sm text-gray-900 truncate">
                                        <img src="https://gorontalo.brmp.pertanian.go.id/storage/assets/uploads/images/berita/o0ZRooU1CdnhHJQ5BTUFgozGiP7PilsBNeVLTMet.png" class="w-14 h-14 object-cover rounded-md" alt="Foto DPD">
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500 max-w-sm">DPD RI Serap Aspirasi Pelaku UMKM, Dorong Peningkatan Daya Saing Produk Lokal Minyak Kelapa</td>
                                    <td class="px-4 py-4">
                                        <span class="px-2 inline-flex text-xs rounded-full bg-red-100 text-red-800">Agenda</span>
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500">2025-12-04</td>
                                </tr>

                                <tr>
                                    <td class="px-4 py-4 text-sm text-gray-900 truncate">Kantor DPD RI Provinsi Gorontalo Rayakan HUT ke-21</td>
                                     <td class="px-4 py-4 text-sm text-gray-900 truncate">
                                        <img src="https://www.dpd.go.id/media/berita-lama/berita-20201118_052515-.jpg" class="w-14 h-14 object-cover rounded-md" alt="Foto DPD">
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500 max-w-sm">DPD RI mengumumkan jadwal kunjungan kerja ke berbagai daerah.</td>
                                    <td class="px-4 py-4">
                                        <span class="px-2 inline-flex text-xs rounded-full bg-green-100 text-green-800">Publikasi</span>
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500">2025-12-03</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script>
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("sidebar-toggle");
    const closeBtn = document.getElementById("close-sidebar");
    const overlay = document.getElementById("overlay");

    toggleBtn.addEventListener("click", () => {
        sidebar.classList.remove("-translate-x-full");
        overlay.classList.remove("hidden");
    });

    closeBtn.addEventListener("click", () => {
        sidebar.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
    });

    overlay.addEventListener("click", () => {
        sidebar.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
    });

    const desktopToggle = document.getElementById("sidebarToggle");
    const mainContent = document.getElementById("main-content");

    desktopToggle.addEventListener("click", () => {
        if (window.innerWidth >= 768) {  
            // di laptop / desktop
            sidebar.classList.toggle("sidebar-collapsed");
            mainContent.classList.toggle("content-expanded");
        }
    });
</script>


</body>
</html>
