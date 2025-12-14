// File: public/js/beranda.js (Harus diubah menjadi kode ini)

// Ini adalah komponen Alpine.js yang akan mendefinisikan newsModal()
document.addEventListener('alpine:init', () => {
    Alpine.data('newsModal', () => ({
        show: false,
        loading: false,
        error: null,
        data: {
            // Inisialisasi properti untuk mencegah error 'data not defined'
            id: null,
            judul_berita: 'Memuat...', 
            isi_berita: '',
            keterangan: '',
            foto_url: '',
            tanggal: '',
        },

        // Fungsi yang dipanggil oleh @open-news-modal.window
        openModal(initialData) {
            this.show = true;
            this.loading = true;
            this.error = null;
            
            // Set data awal/statis dari tombol
            this.data.id = initialData.id;
            this.data.tanggal = initialData.tanggal;
            this.data.keterangan = initialData.keterangan;
            this.data.judul_berita = 'Memuat...';
            this.data.isi_berita = '';
            this.data.foto_url = '';

            // Mencegah scroll body saat modal terbuka
            document.body.classList.add('overflow-hidden'); 
            
            this.fetchNewsDetail(initialData.id);
        },

        // Fungsi AJAX menggunakan jQuery
        fetchNewsDetail(id) {
            const url = `/berita/${id}`; 

            // ASUMSI jQuery masih dimuat melalui window.jQuery atau window.$
            // Jika tidak, ganti dengan fetch/axios
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                context: this, 
                success: function(response) {
                    this.loading = false;
                    
                    if (response.success && response.data) {
                        this.data.judul_berita = response.data.judul_berita;
                        this.data.isi_berita = response.data.isi_berita;
                        this.data.foto_url = response.data.foto_url;
                        this.data.tanggal = response.data.tanggal; 
                        this.data.keterangan = response.data.keterangan;

                        if (this.$refs.scrollContainer) {
                            this.$refs.scrollContainer.scrollTop = 0;
                        }
                    } else {
                        this.data.judul_berita = 'Gagal Memuat Berita';
                        this.error = response.message || 'Terjadi kesalahan.';
                    }
                },
                error: function(xhr, status, error) {
                    this.loading = false;
                    this.data.judul_berita = 'Kesalahan Koneksi';
                    this.error = 'Tidak dapat terhubung ke server.';
                    console.error("AJAX Error: ", status, error);
                }
            });
        },
        
        init() {
            // Mengaktifkan kembali scroll body saat 'show' menjadi false
            this.$watch('show', (value) => {
                if (!value) {
                    document.body.classList.remove('overflow-hidden');
                }
            });
        }
    }));
});