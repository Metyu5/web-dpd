import Alpine from 'alpinejs'
import './bootstrap';
import { Notyf } from 'notyf';
import 'notyf/notyf.min.css';
import Swal from 'sweetalert2';

window.Alpine = Alpine

const initializedComponents = new WeakSet();

document.addEventListener('alpine:init', () => {
    
    Alpine.data('berandaData', () => ({
        loading: true,
        beritaUtama: null,
        beritaTerkini: [],
        beritaPopuler: [],
        kategoriCount: {},
        _initialized: false, 
        
        get validBeritaTerkini() {
            return Array.isArray(this.beritaTerkini) ? this.beritaTerkini.filter(i => i && i.id_berita) : [];
        },
        get validBeritaPopuler() {
            return Array.isArray(this.beritaPopuler) ? this.beritaPopuler.filter(i => i && i.id_berita) : [];
        },
        get showBeritaTerkini() {
            return !this.loading && this.validBeritaTerkini.length > 0;
        },
        get showBeritaPopuler() {
            return !this.loading && this.validBeritaPopuler.length > 0;
        },
        
        init() {
            if (this._initialized) {
                return;
            }
            
            this._initialized = true;
            
            if (this.$el) {
                if (initializedComponents.has(this.$el)) {
                    return;
                }
                initializedComponents.add(this.$el);
            }
            
            this.fetchData();
        },
        
        async fetchData() {
            if (this.loading === false && this.beritaUtama !== null) {
                return;
            }
            
            try {
                this.loading = true;
                
                const response = await fetch('/api/beranda-data');
                
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                }
                
                const result = await response.json();
                
                if (result.success) {
                    this.$nextTick(() => {
                        this.beritaUtama = result.data.beritaUtama || null;
                        this.beritaTerkini = Array.isArray(result.data.beritaTerkini) ? result.data.beritaTerkini : [];
                        this.beritaPopuler = Array.isArray(result.data.beritaPopuler) ? result.data.beritaPopuler : [];
                        this.kategoriCount = result.data.kategoriCount || {};
                    });
                }
            } catch (error) {
                window.notyf?.error('Gagal memuat data berita');
            } finally {
                setTimeout(() => {
                    this.loading = false;
                }, 100);
            }
        },
        
        getCategoryColor(kategori) {
            if (!kategori) return 'bg-gray-600';
            
            const colors = {
                'kegiatan': 'bg-sky-600',
                'agenda': 'bg-purple-600',
                'publikasi': 'bg-blue-600',
                'berita': 'bg-orange-600',
                'utama': 'bg-sky-600'
            };
            return colors[kategori.toLowerCase()] || 'bg-gray-600';
        },
        
        getCategoryLabel(kategori) {
            if (!kategori) return 'Berita';
            
            const labels = {
                'kegiatan': 'Kegiatan',
                'agenda': 'Agenda',
                'publikasi': 'Publikasi',
                'berita': 'Berita',
                'utama': 'Utama'
            };
            return labels[kategori.toLowerCase()] || kategori;
        }
    }));
    
    Alpine.data('newsModal', () => ({
        show: false,
        loading: false,
        error: null,
        data: {
            id: null,
            judul_berita: '',
            isi_berita: '',
            foto_url: '',
            tanggal: '',
            keterangan: '',
            view_count: '0'
        },
        _initialized: false,

        openModal(initialData) {
            if (!initialData?.id) {
                return;
            }
            
            this.show = true;
            document.body.classList.add('overflow-hidden');

            this.loading = true;
            this.error = null;
            
            const storageKey = `berita_view_${initialData.id}`;
            let currentViews = parseInt(localStorage.getItem(storageKey) || '0');
            currentViews += 1;
            localStorage.setItem(storageKey, currentViews.toString());
            
            window.dispatchEvent(new CustomEvent('berita-view-updated', {
                detail: { id: initialData.id, views: currentViews }
            }));
            
            this.data = {
                id: initialData.id,
                tanggal: initialData.tanggal || '',
                keterangan: initialData.keterangan || '',
                judul_berita: 'Memuat...',
                isi_berita: '',
                foto_url: '',
                view_count: currentViews.toLocaleString('id-ID')
            };

            fetch(`/berita/${initialData.id}`)
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP ${response.status}`);
                    return response.json();
                })
                .then(response => {
                    
                    if (response.success && response.data) {
                        this.$nextTick(() => {
                            this.data.judul_berita = response.data.judul_berita || 'Tidak ada judul';
                            this.data.isi_berita = response.data.isi_berita || 'Tidak ada konten';
                            this.data.foto_url = response.data.foto_url || '';
                            
                            this.loading = false;
                            
                            if (this.$refs.scrollContainer) {
                                this.$refs.scrollContainer.scrollTop = 0;
                            }
                        });
                    } else {
                        throw new Error(response.message || 'Data tidak valid');
                    }
                })
                .catch(error => {
                    this.loading = false;
                    this.error = error.message;
                });
        },
        
        closeModal() {
            this.show = false;
            document.body.classList.remove('overflow-hidden');
        },
        
        init() {
            if (this._initialized) {
                return;
            }
            
            this._initialized = true;
            
            this.$watch('show', (value) => {
                if (!value) {
                    document.body.classList.remove('overflow-hidden');
                }
            });
            
            document.addEventListener('open-modal', (event) => {
                this.openModal(event.detail);
            });
        }
    }));

    Alpine.data('adminManager', () => ({
    loading: false,
    searchQuery: '',
    currentPage: 1,
    adminData: {
        data: [],
        current_page: 1,
        last_page: 1,
        from: 0,
        to: 0,
        total: 0
    },

    init() {
        this.fetchAdmins();

        this.$watch('searchQuery', (newQuery) => {
            this.currentPage = 1; 
            this.fetchAdmins();
        });
    },
    

    async fetchAdmins() {
        this.loading = true;
        const searchParam = encodeURIComponent(this.searchQuery.trim());
        
        // Memanggil route yang sama dengan index tapi via AJAX
        const url = `/admin/data-admin/content?page=${this.currentPage}&search=${searchParam}`;

        try {
            const response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest', // Penting agar Laravel mendeteksi AJAX
                    'Accept': 'application/json'
                }
            });

            if (!response.ok) throw new Error(`HTTP ${response.status}`);
            
            const result = await response.json();

            if (result.success) {
                this.adminData = result.data;
            }
        } catch (error) {
            window.notyf?.error('Gagal memuat data admin');
            console.error(error);
        } finally {
            this.loading = false;
        }
    },

    

    changePage(page) {
        if (page >= 1 && page <= this.adminData.last_page) {
            this.currentPage = page;
            this.fetchAdmins();
        }
    },

    formatDate(dateString) {
        if (!dateString) return '-';
        const date = new Date(dateString);
        return date.toLocaleDateString('id-ID', {
            day: '2-digit',
            month: 'short',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    }
}));
    
    Alpine.data('newsManager', () => ({
        loading: true,
        searchQuery: '',
        currentPage: 1,
        newsData: {
            data: [],
            current_page: 1,
            last_page: 1,
            from: 0,
            to: 0,
            total: 0
        },
        
        init() {
            this.fetchNews(); 

            this.$watch('searchQuery', (newQuery) => {
                this.currentPage = 1;
                this.fetchNews();
            });
        },

        
        
        async fetchNews() {
            this.loading = true;
            
            const searchParam = encodeURIComponent(this.searchQuery.trim());
            
            const url = `/admin/api/data-berita?page=${this.currentPage}&search=${searchParam}`;
            
            try {
                const response = await fetch(url);
                
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                }
                
                const result = await response.json();
                
                if (result.success && result.data) {
                    this.$nextTick(() => {
                        this.newsData = result.data;
                    });
                } else {
                    this.newsData.data = [];
                    this.newsData.total = 0;
                }
            } catch (error) {
                window.notyf?.error('Gagal memuat data berita: ' + error.message);
                this.newsData.data = []; 
                this.newsData.total = 0;
            } finally {
                this.loading = false;
            }
        },
        
        changePage(page) {
            if (page >= 1 && page <= this.newsData.last_page) {
                this.currentPage = page;
                this.fetchNews();
            }
        },

        getCategoryColorClass(keterangan) {
            if (!keterangan) return 'bg-gray-100 text-gray-800';
            
            const colorMap = {
                'utama': 'bg-yellow-100 text-yellow-800',
                'agenda': 'bg-blue-100 text-blue-800',
                'publikasi': 'bg-green-100 text-green-800',
                'berita': 'bg-red-100 text-red-800',
                'kegiatan': 'bg-purple-100 text-purple-800',
                'berita_populer': 'bg-indigo-100 text-indigo-800',
            };
            return colorMap[keterangan.toLowerCase()] || 'bg-gray-100 text-gray-800';
        },

        getCategoryLabel(keterangan) {
            if (!keterangan) return 'Lainnya';
            return keterangan.split('_').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
        },
        
        truncateHtml(html, length) {
            const strippedString = html.replace(/(<([^>]+)>)/ig, '');
            
            if (strippedString.length <= length) {
                return strippedString;
            }
            return strippedString.substring(0, length) + '...';
        },

        assetUrl(path) {
            return path && path.startsWith('storage/') ? `/${path}` : (path ? path : '/images/default.jpg');
        }
    }));
    
});


Alpine.start()

window.Swal = Swal;
window.notyf = new Notyf({
    position: { x: 'right', y: 'bottom' },
    duration: 3000,
    dismissible: true
});