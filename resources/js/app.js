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
                console.log('⚠️ berandaData already initialized, skipping...');
                return;
            }
            
            this._initialized = true;
            
            if (this.$el) {
                if (initializedComponents.has(this.$el)) {
                    console.log('⚠️ Element already tracked, aborting init');
                    return;
                }
                initializedComponents.add(this.$el);
            }
            
            console.log('🚀 berandaData component initialized');
            this.fetchData();
        },
        
        async fetchData() {
            if (this.loading === false && this.beritaUtama !== null) {
                console.log('📊 Data already loaded, skipping fetch');
                return;
            }
            
            try {
                this.loading = true;
                console.log('📡 Fetching beranda data...');
                
                const response = await fetch('/api/beranda-data');
                
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                }
                
                const result = await response.json();
                console.log('✅ Data received:', {
                    beritaUtama: !!result.data?.beritaUtama,
                    beritaTerkini: result.data?.beritaTerkini?.length || 0,
                    beritaPopuler: result.data?.beritaPopuler?.length || 0
                });
                
                if (result.success) {
                    this.$nextTick(() => {
                        this.beritaUtama = result.data.beritaUtama || null;
                        this.beritaTerkini = Array.isArray(result.data.beritaTerkini) ? result.data.beritaTerkini : [];
                        this.beritaPopuler = Array.isArray(result.data.beritaPopuler) ? result.data.beritaPopuler : [];
                        this.kategoriCount = result.data.kategoriCount || {};
                        
                        console.log('✅ State updated successfully');
                    });
                }
            } catch (error) {
                console.error('❌ Error fetching beranda data:', error);
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
                console.error('❌ Invalid modal data:', initialData);
                return;
            }
            
            console.log('🚀 Opening modal with ID:', initialData.id);
            
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
                    console.log('✅ Modal data loaded');
                    
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
                    console.error('❌ Modal fetch error:', error);
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
                console.log('⚠️ newsModal already initialized');
                return;
            }
            
            this._initialized = true;
            console.log('🚀 newsModal component initialized');
            
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
    
});

Alpine.start()

// Global Variables
window.Swal = Swal;
window.notyf = new Notyf({
    position: { x: 'right', y: 'bottom' },
    duration: 3000,
    dismissible: true
});