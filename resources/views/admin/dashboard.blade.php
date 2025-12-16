<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Admin DPD Gorontalo</title>
    @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js', 'resources/js/admin.js'])
    <link rel="icon" href="{{ asset('DPD-RI.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-ie6G9gH5X1b7i1E7A0nE8e3gR1/6aN9zO72f5P0g9S5zE2a4O3wD6eQ0eF3Q2o8F/QxR+K4Vf2eX/Kq8m8pQw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <style>
        /* Menggunakan custom class untuk scrollbar di sidebar agar lebih halus */
        .sidebar-scroll::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background-color: rgba(255, 255, 255, 0.5);
        }
        .sidebar-scroll {
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.3) transparent;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans antialiased text-gray-800">

    @php
        $request = app('request');
    @endphp

    <div class="flex h-screen overflow-hidden">

        <aside id="sidebar" 
               class="flex-shrink-0 w-64 bg-red-800 text-white shadow-2xl transform transition-all duration-300 ease-in-out 
                      -translate-x-full md:translate-x-0 overflow-y-auto sidebar-scroll z-50 fixed md:static inset-y-0">
            <div class="flex flex-col h-full">
                <div class="p-6 flex-shrink-0">
                    <div class="flex justify-between items-center mb-8">
                        <div class="text-center flex-1">
                            <img src="{{ asset('DPD-RI.png') }}" alt="Logo DPD RI" class="w-16 h-16 mx-auto mb-2 filter brightness-110 object-contain">
                            <span class="text-base font-semibold tracking-wider uppercase border-b border-white pb-2 block">DPD RI PROVINSI GORONTALO</span>
                        </div>
                        <button id="close-sidebar" class="text-white hover:text-gray-200 focus:outline-none md:hidden p-2 rounded-md hover:bg-red-700 transition duration-150">
                            <i class="fas fa-times w-5 h-5"></i>
                        </button>
                    </div>

                    <nav class="space-y-2">
                        <a href="{{ route('admin.dashboard') }}" 
                           data-url="{{ route('admin.dashboard.content') }}" 
                           class="spa-link flex items-center p-3 text-sm rounded-lg transition duration-150 ease-in-out 
                           {{ $request->routeIs('admin.dashboard*') ? 'bg-red-700 shadow-inner font-semibold active-link' : 'font-medium hover:bg-red-600' }}">
                            <i class="fas fa-home w-5 h-5 mr-3"></i>
                            Dashboard
                        </a>
                        
                        <a href="{{ route('admin.berita.index') }}" 
                           data-url="{{ route('admin.berita.content') }}" 
                           class="spa-link flex items-center p-3 text-sm rounded-lg transition duration-150 ease-in-out 
                           {{ $request->routeIs('admin.berita.*') ? 'bg-red-700 shadow-inner font-semibold active-link' : 'font-medium hover:bg-red-600' }}">
                             <i class="fas fa-newspaper w-5 h-5 mr-3"></i>
                            Data Berita
                        </a>
                        
                        <a href="{{ route('admin.data-admin.index') }}" 
                           data-url="{{ route('admin.data-admin.content') }}" 
                           class="spa-link flex items-center p-3 text-sm rounded-lg transition duration-150 ease-in-out 
                           {{ $request->routeIs('admin.data-admin.*') ? 'bg-red-700 shadow-inner font-semibold active-link' : 'font-medium hover:bg-red-600' }}">
                            <i class="fas fa-users-cog w-5 h-5 mr-3"></i>
                            Data Admin
                        </a>
                    </nav>
                </div>
                
                <div class="p-6 border-t border-red-700 mt-auto flex-shrink-0 bg-red-700/50">
                    <button
                        id="logout-mobile"
                        class="flex items-center w-full p-3 text-sm font-medium rounded-lg hover:bg-red-600 transition duration-150 ease-in-out text-left">
                        <i class="fas fa-sign-out-alt w-5 h-5 mr-3"></i>
                        Keluar
                    </button>
                </div>
            </div>
        </aside>

        <div id="overlay"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden z-40 md:hidden transition-opacity duration-300 opacity-0"></div>

        <div id="main-content" class="flex-1 flex flex-col overflow-hidden transition-all duration-300 ease-in-out bg-gray-100">

            <header class="flex items-center justify-between p-4 bg-white border-b border-gray-200 shadow-md sticky top-0 z-30">
                <div class="flex items-center">
                    <button id="sidebar-toggle" class="text-gray-500 hover:text-red-800 focus:outline-none md:hidden mr-4 p-2 rounded-md hover:bg-gray-100 transition duration-150">
                        <i class="fas fa-bars w-6 h-6"></i>
                    </button>
                    <button id="sidebarToggle" class="text-gray-700 p-2 mr-4 rounded-md hover:bg-gray-100 transition duration-150 hidden md:inline-flex">
                        <i class="fas fa-stream w-6 h-6"></i>
                    </button>

                    <h1 class="text-xl font-semibold text-gray-800 hidden xs:block">Dashboard Admin</h1>

                </div>

                <div class="flex items-center space-x-2 sm:space-x-4">
                    <button class="relative p-2 text-gray-500 hover:text-red-800 focus:outline-none rounded-full hover:bg-gray-100 transition duration-150">
                        <i class="fas fa-bell w-6 h-6"></i>
                        <span class="absolute top-1 right-1 block h-2 w-2 rounded-full bg-red-600 ring-2 ring-white"></span>
                    </button>

                    <div class="relative group">
                        <button class="flex items-center space-x-1 sm:space-x-2 p-1 rounded-full hover:bg-gray-100 transition duration-150">
                            <img class="w-8 h-8 sm:w-9 sm:h-9 rounded-full object-cover border border-gray-200" src="https://ui-avatars.com/api/?name=Admin+DPD&background=b91c1c&color=ffffff&size=128&bold=true" alt="User Avatar">
                            <span class="text-sm font-medium text-gray-700 hidden sm:inline">Admin DPD</span>
                            <i class="fas fa-chevron-down w-3 h-3 text-gray-400 hidden sm:inline"></i>
                        </button>

                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <div class="py-1">
                                <div class="border-t border-gray-100"></div>
                                <a href="#" id="logout-desktop"
                                    class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition duration-150 ease-in-out rounded-b-lg">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    Keluar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main id="page-content" class="flex-1 overflow-x-hidden overflow-y-auto p-4 sm:p-6 md:p-8">
                {{-- KONTEN AWAL TELAH DIHAPUS. Konten akan dimuat oleh admin.js melalui AJAX/SPA --}}
            </main>
        </div>
    </div>
    
    <div id="logout-modal" class="fixed inset-0 bg-black/40 hidden justify-center items-center z-[9999]">
        <div class="bg-white rounded-xl shadow-xl p-6 w-11/12 max-w-sm">
            <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Keluar</h2>
            <p class="mt-2 text-gray-600">Yakin ingin keluar dari sesi ini?</p>

            <div class="flex justify-end gap-3 mt-6">
                <button id="cancel-logout" class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                    Tidak
                </button>
                <button id="confirm-logout" class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition">
                    Ya, Keluar
                </button>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const closeSidebar = document.getElementById('close-sidebar');

            // Fungsi untuk membuka sidebar (mobile)
            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                overlay.classList.add('opacity-100');
                document.body.style.overflow = 'hidden'; // Mencegah scroll di body saat sidebar terbuka
            }

            // Fungsi untuk menutup sidebar (mobile)
            function closeSidebarFunc() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                overlay.classList.remove('opacity-100');
                document.body.style.overflow = 'auto'; // Mengaktifkan kembali scroll body
            }

            // Event listener untuk tombol toggle (mobile)
            sidebarToggle.addEventListener('click', openSidebar);
            // Event listener untuk tombol tutup di dalam sidebar
            closeSidebar.addEventListener('click', closeSidebarFunc);
            // Event listener untuk overlay
            overlay.addEventListener('click', closeSidebarFunc);

            // Handle SPA link click to close sidebar on mobile
            document.querySelectorAll('.spa-link').forEach(link => {
                link.addEventListener('click', () => {
                    // Check if it's a mobile view (or sidebar is currently overlaid)
                    if (window.innerWidth < 768) { // md: breakpoint is 768px
                        closeSidebarFunc();
                    }
                });
            });

            // Toggle Sidebar untuk Desktop (shrink/expand)
            const mainContent = document.getElementById('main-content');
            const desktopSidebarToggle = document.getElementById('sidebarToggle');

            desktopSidebarToggle.addEventListener('click', () => {
                if (window.innerWidth >= 768) { // Hanya berlaku di desktop
                    sidebar.classList.toggle('w-64');
                    sidebar.classList.toggle('w-20');
                    
                    // Toggle visibility of text in sidebar
                    const sidebarTitle = sidebar.querySelector('.text-xl.font-semibold');
                    const sidebarLinks = sidebar.querySelectorAll('a span');
                    
                    // Simple example, for full effect, adjust layout dynamically (JS and CSS)
                    // For this simple toggle, we focus on the sidebar width change.
                }
            });

            // Pastikan sidebar tertutup ketika resize dari desktop ke mobile
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 768) {
                    // Pastikan overlay hilang jika beralih ke desktop
                    if (!overlay.classList.contains('hidden')) {
                        closeSidebarFunc();
                    }
                }
            });
        });
        
        // Modal Logout
        document.getElementById('logout-mobile').addEventListener('click', function() {
            document.getElementById('logout-modal').style.display = 'flex';
        });
        document.getElementById('logout-desktop').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('logout-modal').style.display = 'flex';
        });
        document.getElementById('cancel-logout').addEventListener('click', function() {
            document.getElementById('logout-modal').style.display = 'none';
        });
        // Tambahkan logic untuk confirm-logout di file admin.js Anda
    </script>
</body>

</html>