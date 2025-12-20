<nav class="text-sm mb-6">
    <ol class="inline-flex items-center">
        <li><a href="{{ route('admin.dashboard') }}" class="text-red-700 hover:text-red-900 font-medium">Dashboard</a></li>
        <li class="flex items-center">
            <svg class="w-3 h-3 mx-2 text-gray-400" viewBox="0 0 320 512">
                <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
            </svg>
            <span class="text-gray-500">Data Admin</span>
        </li>
    </ol>
</nav>

<h2 class="text-2xl font-bold text-gray-800 mb-8">Manajemen Data Akun Admin</h2>

<div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100" 
     x-data="adminManager" 
     x-init="init()">
    
    <div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-6 pb-4 ">
        <div>
            <h3 class="text-xl font-semibold text-gray-800">Daftar Akun Admin Aktif</h3>
            <p class="text-gray-500 text-sm mt-1">Kelola akun-akun yang memiliki akses ke dashboard.</p>
        </div>

        <div class="flex flex-col md:flex-row items-center gap-4">
            <button id="openAddAdminModal" class="w-full sm:w-auto px-4 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-normal rounded-lg flex items-center justify-center gap-2 transition duration-150 transform hover:scale-[1.02]">
                <i class="fas fa-plus w-4 h-4"></i> Tambah Admin
            </button>

            <div class="relative w-full md:w-80">
                <input type="text" id="searchInputAdmin" placeholder="Cari nama admin..."
                    class="w-full px-3 py-2.25 pl-9 border border-gray-400 rounded-lg shadow-sm focus:outline-none focus:ring-1 focus:ring-gray-400 text-sm"
                    x-model.debounce.300ms="searchQuery"><i class="fas fa-search w-4 h-4 absolute top-1/2 left-3 -translate-y-1/2 text-gray-500"></i>

                <svg class="w-4 h-4 absolute top-1/2 left-3 -translate-y-1/2 text-gray-500" ...>
                    <path ... />
                </svg>
            </div>
        </div>
    </div>

    <template x-if="!loading && adminData.data.length === 0">
        <div class="p-10 text-center bg-red-50 rounded-xl border border-red-100">
            <h3 class="text-xl font-normal text-red-600 mb-2">Data Tidak Ditemukan</h3>
            <p class="text-sm text-gray-600">Tidak ada admin yang cocok dengan kata kunci tersebut.</p>
        </div>
    </template>

    <template x-if="!loading && adminData.data.length > 0">
        <div>
            <div class="overflow-x-auto rounded-xl border border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-normal text-gray-700 uppercase">No</th>
                            <th class="px-6 py-3 text-left text-xs font-normal text-gray-700 uppercase">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-normal text-gray-700 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-normal text-gray-700 uppercase">Dibuat</th>
                            <th class="px-6 py-3 text-center text-xs font-normal text-gray-700 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        <template x-for="(admin, key) in adminData.data" :key="admin.id">
                            <tr class="hover:bg-red-50/50 transition">
                                <td class="px-6 py-4 text-sm" x-text="adminData.from + key"></td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800" x-text="admin.username"></td>
                                <td class="px-6 py-4 text-sm text-gray-800" x-text="admin.email"></td>
                                <td class="px-6 py-4 text-sm text-gray-600" x-text="formatDate(admin.created_at)"></td>
                                <td class="px-6 py-4 text-sm flex justify-center gap-2">
                                    <button class="btnEditAdmin p-2 bg-blue-100 text-blue-500 rounded-lg hover:bg-blue-200 transition duration-150" :data-id="admin.id">
                                        <i class="fas fa-edit w-4 h-4"></i>
                                    </button>
                                    <button class="btnDeleteAdmin p-2 bg-red-100 text-red-500 rounded-lg hover:bg-red-200" :data-id="admin.id">
                                        <i class="fas fa-trash-alt w-4 h-4"></i>
                                    </button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-8 px-4 py-4 bg-gray-50 rounded-xl border border-gray-100">
    <p class="text-sm text-gray-600 order-2 sm:order-1">
        Menampilkan 
        <span class="font-normal text-gray-800" x-text="adminData.from || 0"></span> 
        sampai 
        <span class="font-normal text-gray-800" x-text="adminData.to || 0"></span> 
        dari 
        <span class="font-normal text-red-600" x-text="adminData.total || 0"></span> 
        admin
    </p>

    <div class="flex items-center gap-1 order-1 sm:order-2">
        <button @click="changePage(currentPage - 1)" 
                :disabled="currentPage === 1" 
                class="flex items-center gap-1 px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-normal text-gray-700 transition-all duration-200 hover:bg-red-50 hover:text-red-700 hover:border-red-200 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-white disabled:hover:text-gray-700 shadow-sm active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <div class="flex items-center justify-center min-w-[40px] h-9 px-3 bg-red-600 text-white rounded-lg shadow-md shadow-red-200 mx-1">
            <span class="text-sm font-normal" x-text="currentPage"></span>
        </div>

        <button @click="changePage(currentPage + 1)" 
                :disabled="currentPage === adminData.last_page" 
                class="flex items-center gap-1 px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-normal text-gray-700 transition-all duration-200 hover:bg-red-50 hover:text-red-700 hover:border-red-200 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-white disabled:hover:text-gray-700 shadow-sm active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>
</div>
        </div>
    </template>
</div>

@include('admin.components.admin.tambah-admin-modal')
@include('admin.components.admin.edit-admin-modal')
@include('admin.components.admin.delete-admin-modal')