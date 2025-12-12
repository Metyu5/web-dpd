<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Admin DPD Gorontalo</title>
    @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js', 'resources/js/admin.js'])
    <link rel="icon" href="{{ asset('DPD-RI.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
                        <a href="{{ route('admin.dashboard') }}" data-url="{{ route('admin.dashboard.content') }}" class="spa-link active-link flex items-center p-3 text-sm font-semibold rounded-lg bg-red-700 shadow-inner hover:bg-red-600 transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Dashboard
                        </a>
                        <a href="{{ route('admin.berita.index') }}" data-url="{{ route('admin.berita.content') }}" class="spa-link flex items-center p-3 text-sm font-medium rounded-lg hover:bg-red-700 transition duration-150 ease-in-out">
                             <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            Data Berita
                        </a>
                        <a href="{{ route('admin.data-admin.index') }}" data-url="{{ route('admin.data-admin.content') }}" class="spa-link flex items-center p-3 text-sm font-medium rounded-lg hover:bg-red-700 transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20v-2h2m-4.5 0a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM17 14v6m-6-6v6"></path>
                            </svg>
                            Data Admin
                        </a>
                    </nav>
                </div>
                <div class="p-6 border-t border-red-700 mt-auto flex-shrink-0">
                    <button
                        id="logout-mobile"
                        class="flex items-center w-full p-3 text-sm font-medium rounded-lg hover:bg-red-700 transition duration-150 ease-in-out text-left">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Keluar
                    </button>
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
                                <a href="#" id="logout-desktop"
                                    class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-b-lg">
                                    Keluar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main id="page-content" class="flex-1 overflow-x-hidden overflow-y-auto p-6 md:p-8">
                @include('admin.dashboard-content')
            </main>
        </div>
    </div>
    <!-- Logout Modal -->
<div id="logout-modal" class="fixed inset-0 bg-black/40 hidden justify-center items-center z-[999]">
    <div class="bg-white rounded-xl shadow-xl p-6 w-80">
        <h2 class="text-lg font-semibold text-gray-800">Konfirmasi</h2>
        <p class="mt-2 text-gray-600">Yakin ingin keluar?</p>

        <div class="flex justify-end gap-3 mt-6">
            <button id="cancel-logout" class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200">
                Tidak
            </button>
            <button id="confirm-logout" class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">
                Ya
            </button>
        </div>
    </div>
</div>

</body>

</html>