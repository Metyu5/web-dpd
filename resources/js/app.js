import Alpine from 'alpinejs'
import './bootstrap';
import { Notyf } from 'notyf';
import 'notyf/notyf.min.css';
import Swal from 'sweetalert2';

window.Alpine = Alpine

// Definisi newsModal SEBELUM Alpine.start()
document.addEventListener('alpine:init', () => {
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

       openModal(initialData) {
    console.log('🚀 Opening modal with:', initialData);
    
    this.show = true;
    document.body.classList.add('overflow-hidden');

    this.loading = true;
    this.error = null;
    
    // 🔥 Increment view count di localStorage
    const storageKey = `berita_view_${initialData.id}`;
    let currentViews = parseInt(localStorage.getItem(storageKey) || '0');
    currentViews += 1;
    localStorage.setItem(storageKey, currentViews.toString());
    
    // 🔥 TAMBAHAN: Dispatch event untuk update card
    window.dispatchEvent(new CustomEvent('berita-view-updated', {
        detail: { id: initialData.id, views: currentViews }
    }));
    
    this.data = {
        id: initialData.id,
        tanggal: initialData.tanggal,
        keterangan: initialData.keterangan,
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
                    console.log('✅ API Response:', response);
                    
                    if (response.success && response.data) {
                        // Update semua data kecuali view_count
                        this.data.judul_berita = response.data.judul_berita;
                        this.data.isi_berita = response.data.isi_berita;
                        this.data.foto_url = response.data.foto_url;
                        
                        this.$nextTick(() => {
                            this.loading = false;
                            if (this.$refs.scrollContainer) {
                                this.$refs.scrollContainer.scrollTop = 0;
                            }
                            console.log('✅ Modal loaded successfully');
                        });
                    } else {
                        throw new Error(response.message || 'Data tidak valid');
                    }
                })
                .catch(error => {
                    console.error('❌ Fetch Error:', error);
                    this.loading = false;
                    this.error = error.message;
                });
        },
        
        init() {
            this.$watch('show', (value) => {
                console.log('Modal show state:', value);
                if (!value) {
                    document.body.classList.remove('overflow-hidden');
                }
            });
        }
    }));
});

Alpine.start()

window.Swal = Swal;
window.notyf = new Notyf({
    position: { x: 'right', y: 'bottom' }
});