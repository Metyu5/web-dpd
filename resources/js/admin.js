document.addEventListener("DOMContentLoaded", () => {
    function initSidebarMobile() {
        const sidebar = document.getElementById("sidebar");
        const toggleBtn = document.getElementById("sidebar-toggle");
        const closeBtn = document.getElementById("close-sidebar");
        const overlay = document.getElementById("overlay");

        if (toggleBtn) {
            toggleBtn.onclick = () => {
                sidebar.classList.remove("-translate-x-full");
                overlay.classList.remove("hidden");
            };
        }

        if (closeBtn) {
            closeBtn.onclick = () => {
                sidebar.classList.add("-translate-x-full");
                overlay.classList.add("hidden");
            };
        }

        if (overlay) {
            overlay.onclick = () => {
                sidebar.classList.add("-translate-x-full");
                overlay.classList.add("hidden");
            };
        }
    }
    initSidebarMobile();
    function initSidebarDesktop() {
        const sidebar = document.getElementById("sidebar");
        const desktopToggle = document.getElementById("sidebarToggle");
        const mainContent = document.getElementById("main-content");

        if (!desktopToggle) return;

        desktopToggle.onclick = () => {
            sidebar.classList.toggle("sidebar-collapsed");
            mainContent.classList.toggle("content-expanded");
        };
    }
    initSidebarDesktop();
    function initLogout() {
        const logoutModal = document.getElementById("logout-modal");
        const mobileLogout = document.getElementById("logout-mobile");
        const desktopLogout = document.getElementById("logout-desktop");
        const cancelLogout = document.getElementById("cancel-logout");
        const confirmLogout = document.getElementById("confirm-logout");

        function openLogout() {
            logoutModal.classList.remove("hidden");
            logoutModal.classList.add("flex");
        }

        if (mobileLogout) mobileLogout.onclick = openLogout;
        if (desktopLogout) desktopLogout.onclick = openLogout;

        if (cancelLogout) {
            cancelLogout.onclick = () => {
                logoutModal.classList.add("hidden");
                logoutModal.classList.remove("flex");
            };
        }

        if (confirmLogout) {
            confirmLogout.onclick = () => {
                window.location.href = "/admin";
            };
        }
    }
    initLogout();
    function initAddModal() {
        const addModal = document.getElementById("addModal");
        const openAdd = document.getElementById("openAddModal");
        const closeAdd = document.getElementById("closeAddModal");
        const closeAdd2 = document.getElementById("closeAddModal2");
        const fotoInput = document.getElementById("fotoInput");
        const previewImage = document.getElementById("previewImage");
        const addForm = document.getElementById("addForm"); 

        if (openAdd) {
            openAdd.onclick = () => {
                addModal.classList.remove("hidden");
                addModal.classList.add("flex");
            };
        }

        if (closeAdd) {
            closeAdd.onclick = () => {
                addModal.classList.add("hidden");
                addModal.classList.remove("flex");
            };
        }
        
        if (closeAdd2) {
            closeAdd2.onclick = () => {
                addModal.classList.add("hidden");
                addModal.classList.remove("flex");
            };
        }

        if (addModal) {
            addModal.onclick = e => {
                if (e.target === addModal) {
                    addModal.classList.add("hidden");
                    addModal.classList.remove("flex");
                }
            };
        }

        if (fotoInput) {
            fotoInput.onchange = () => {
                const file = fotoInput.files[0];
                if (!file) return;
                previewImage.src = URL.createObjectURL(file);
                previewImage.classList.remove("hidden");
            };
        }

        if (addForm) {
            addForm.addEventListener("submit", async function (e) {
                e.preventDefault(); 
                
                const formData = new FormData(this); 
                const actionUrl = this.action; 
                
                try {
                    const res = await fetch(actionUrl, {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest", 
                        },
                        body: formData,
                    });

                    if (!res.ok) {
                        const errorData = await res.json();
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal Menambahkan Berita!',
                            text: errorData.message || 'Terjadi kesalahan saat validasi atau server.',
                        });
                        return;
                    }
                    
                    const data = await res.json();
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: data.message,
                        timer: 1800,
                        showConfirmButton: false
                    });

                    addModal.classList.add("hidden");
                    addModal.classList.remove("flex");

                    this.reset(); 
                    if (previewImage) { 
                        previewImage.classList.add("hidden"); 
                        previewImage.src = '';
                    }
                    const activeLink = document.querySelector(".spa-link.bg-red-700");
                    if (activeLink) {
                        const contentUrl = activeLink.getAttribute("data-url");
                        loadContent(contentUrl, activeLink.href, activeLink);
                    }
                    
                } catch (err) {
                    console.error(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan jaringan atau server!',
                    });
                }
            });
        }
    }
    initAddModal();

    function initEditFormHandler() {
        const editForm = document.getElementById("editForm");
        const editModal = document.getElementById("editModal");
        
        if (!editForm) return;

        editForm.addEventListener("submit", async function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            formData.append("_method", "PUT"); 

            const actionUrl = this.action;

            try {
                const res = await fetch(actionUrl, {
                    method: "POST", 
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                    body: formData,
                });

                if (!res.ok) {
                    const errorData = await res.json();
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Memperbarui Berita!',
                        text: errorData.message || 'Terjadi kesalahan saat validasi atau server.',
                    });
                    return;
                }

                const data = await res.json();

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: data.message,
                    timer: 1800,
                    showConfirmButton: false
                });

                editModal.classList.add("hidden");

                const activeLink = document.querySelector(".spa-link.bg-red-700");
                if (activeLink) {
                    const contentUrl = activeLink.getAttribute("data-url");
                    loadContent(contentUrl, activeLink.href, activeLink);
                }
                
            } catch (err) {
                console.error(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan jaringan atau server!',
                });
            }
        });
    }
    initEditFormHandler();

    const pageContent = document.getElementById("page-content");

    document.addEventListener("click", async (e) => {
        if (e.target.closest(".btnEdit")) {
            const btn = e.target.closest(".btnEdit");
            const id = btn.dataset.id;
            try {
                const res = await fetch(`/admin/berita/get/${id}`);
                if (!res.ok) throw new Error("Gagal mengambil data");

                const data = await res.json();

                document.getElementById("edit_id").value = data.id_berita;
                document.getElementById("edit_judul").value = data.judul_berita;
                document.getElementById("edit_isi").value = data.isi_berita;
                document.getElementById("edit_keterangan").value = data.keterangan;
                document.getElementById("edit_preview").src = "/" + data.foto;

                document.getElementById("editForm").action =
                    `/admin/berita/update/${id}`;

                document.getElementById("editModal")
                    .classList.remove("hidden");

            } catch (err) {
                console.error(err);
                alert("Gagal memuat data!");
            }
        }

        if (e.target.closest(".btnDelete")) {
            const btn = e.target.closest(".btnDelete");
            const id = btn.dataset.id;
            const deleteUrl = `/admin/berita/delete/${id}`;
            // ... (Logic SweetAlert Delete) ...
            Swal.fire({
                title: "Hapus Berita?",
                text: "Data yang sudah dihapus tidak dapat dikembalikan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6b7280",
                confirmButtonText: "Ya, Hapus",
                cancelButtonText: "Batal"
            }).then(async (result) => { 
                if (result.isConfirmed) {
                    try {
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').content; 
                        
                        const res = await fetch(deleteUrl, {
                            method: "POST", 
                            headers: {
                                "X-Requested-With": "XMLHttpRequest", 
                                "X-CSRF-TOKEN": csrfToken,
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                _method: 'DELETE' 
                            })
                        });

                        if (!res.ok) throw new Error("Gagal menghapus data!");

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: "Berita berhasil dihapus!",
                            timer: 1800,
                            showConfirmButton: false
                        });

                        const activeLink = document.querySelector(".spa-link.bg-red-700");
                        if (activeLink) {
                            const contentUrl = activeLink.getAttribute("data-url");
                            loadContent(contentUrl, activeLink.href, activeLink);
                        } else {
                             const currentUrl = window.location.href;
                             const currentContentUrl = document.querySelector('.spa-link[href="' + currentUrl + '"]').getAttribute('data-url');
                             loadContent(currentContentUrl, currentUrl, document.querySelector('.spa-link[href="' + currentUrl + '"]'));
                        }

                    } catch (err) {
                        console.error(err);
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: err.message,
                        });
                    }
                }
            });
        }
        const clickedLink = e.target.closest('a[href]:not(.spa-link)');
        
        if (clickedLink && pageContent.contains(clickedLink) && clickedLink.href.includes('page=')) {
            e.preventDefault();
            const pageUrl = clickedLink.href;
            
            loadContent(pageUrl, pageUrl, null);
        }

    });


    function initEditModalCloser() {
        const close1 = document.getElementById("closeEditModal");
        const close2 = document.getElementById("closeEditModal2");

        if (close1) close1.onclick = () => {
            document.getElementById("editModal").classList.add("hidden");
        };

        if (close2) close2.onclick = () => {
            document.getElementById("editModal").classList.add("hidden");
        };
    }
    initEditModalCloser();
    const closeDelete = document.getElementById("closeDeleteModal");
    if (closeDelete) {
        closeDelete.onclick = () => {
            document.getElementById("deleteModal").classList.add("hidden");
        };
    }
    const spaLinks = document.querySelectorAll(".spa-link");

    function updateActiveLink(activeLink) {
        spaLinks.forEach(l => {
            l.classList.remove("bg-red-700", "shadow-inner", "font-semibold");
            l.classList.add("font-medium");
        });
        if (activeLink) {
            activeLink.classList.add("bg-red-700", "shadow-inner", "font-semibold");
            activeLink.classList.remove("font-medium");
        }
    }

    function loadContent(contentUrl, pageUrl, activeLink) {
        pageContent.innerHTML = `
            <div class="flex flex-col items-center justify-center h-full min-h-[50vh] gap-4">
            <!-- Spinner -->
            <div class="w-12 h-12 border-4 border-blue-300 border-t-blue-600 rounded-full animate-spin"></div>
            
            <!-- Text -->
            <p class="text-gray-700 font-semibold text-lg animate-pulse">Memuat...</p>
            
            <!-- Optional tips -->
            <p class="text-gray-400 text-sm">Harap tunggu sebentar, konten sedang dimuat.</p>
        </div>
        `;

        fetch(contentUrl)
            .then(r => r.text())
            .then(html => {
                pageContent.innerHTML = html;
                history.pushState(null, "", pageUrl);

                let finalActiveLink = activeLink;
                if (!finalActiveLink) {
                    finalActiveLink = document.querySelector(".spa-link.bg-red-700");
                }
                updateActiveLink(finalActiveLink);

                initAddModal();
                initLogout();
                initEditModalCloser();
                initEditFormHandler(); 
            })
            .catch(err => {
                pageContent.innerHTML = `<p class="text-red-600 text-center py-20">${err}</p>`;
            });
    }

    spaLinks.forEach(link => {
        link.addEventListener("click", function (e) {
            const contentUrl = this.getAttribute("data-url");
            if (!contentUrl) return;

            e.preventDefault();
            loadContent(contentUrl, this.href, this);
        });
    });
    function initInitialLoad() {
        const currentUrl = window.location.href;
        // Cari link sidebar yang href-nya cocok dengan URL saat ini
        const activeLink = document.querySelector(`.spa-link[href="${currentUrl}"]`);

        if (activeLink) {
            const contentUrl = activeLink.getAttribute("data-url");
            
            if (contentUrl) {
                // Panggil loadContent untuk mengisi #page-content
                loadContent(contentUrl, currentUrl, activeLink);
            }
        }
    }
    
    // Panggil fungsi setelah DOM dimuat
    initInitialLoad();

});