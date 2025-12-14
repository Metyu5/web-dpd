document.addEventListener("DOMContentLoaded", () => {
    
    const pageContent = document.getElementById("page-content");
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
            <div class="w-12 h-12 border-4 border-blue-300 border-t-blue-600 rounded-full animate-spin"></div>
            
            <p class="text-gray-700 font-semibold text-lg animate-pulse">Memuat...</p>
            
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
                initAdminCrud(); 
            })
            .catch(err => {
                pageContent.innerHTML = `<p class="text-red-600 text-center py-20">${err}</p>`;
            });
    }


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
    
    function initAdminCrud() {
        initAddAdminModal();
        initEditAdminModal();
        initAdminEditFormHandler();
        initDeleteAdminModal();
        initAdminDeleteFormHandler();
    }


    function initAddAdminModal() {
        const modal = document.getElementById('addAdminModal');
        const openBtn = document.getElementById('openAddAdminModal');
        const closeBtn = document.getElementById('closeAddAdminModal');
        const cancelBtn = document.getElementById('closeAddAdminModal2');
        const form = document.getElementById('addAdminForm');

        if (!modal) return;

        function toggleModal(show) {
            modal.classList.toggle('hidden', !show);
            modal.classList.toggle('flex', show);
        }

        if (openBtn) openBtn.onclick = () => toggleModal(true);
        if (closeBtn) closeBtn.onclick = () => toggleModal(false);
        if (cancelBtn) cancelBtn.onclick = () => toggleModal(false);

        modal.onclick = e => {
            if (e.target === modal) {
                toggleModal(false);
            }
        };

        form.onsubmit = async function (e) {
            e.preventDefault();
            const formData = new FormData(form);

            try {
                const res = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: formData
                });
                
                if (!res.ok) {
                    const errorData = await res.json();
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Menambahkan Admin!',
                        text: errorData.message || 'Cek kembali isian Anda. Username/Email mungkin sudah terdaftar.',
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

                toggleModal(false);
                form.reset(); 
                const activeLink = document.querySelector(".spa-link.bg-red-700");
                if (activeLink) {
                        const contentUrl = activeLink.getAttribute("data-url");
                        loadContent(contentUrl, activeLink.href, activeLink);
                }
            } catch (err) {
                console.error('Error:', err);
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan jaringan atau server!',
                });
            }
        };
    }
    
    function initEditAdminModal() {
        const modal = document.getElementById('editAdminModal');
        const closeBtn = document.getElementById('closeEditAdminModal');
        const cancelBtn = document.getElementById('closeEditAdminModal2');
        const form = document.getElementById('editAdminForm');

        if (!modal) return;

        function toggleModal(show) {
            modal.classList.toggle('hidden', !show);
            modal.classList.toggle('flex', show);
        }
        
        if (closeBtn) closeBtn.onclick = () => toggleModal(false);
        if (cancelBtn) cancelBtn.onclick = () => toggleModal(false);

        modal.onclick = e => {
            if (e.target === modal) {
                toggleModal(false);
            }
        };
        document.addEventListener('click', function(e) {
            if (e.target.closest('.btnEditAdmin')) {
                e.preventDefault();
                const btn = e.target.closest('.btnEditAdmin');
                const adminId = btn.getAttribute('data-id');
                fetch(`/admin/admin/get/${adminId}`) 
                    .then(r => r.json())
                    .then(data => {
                        if (data.error) {
                            Swal.fire({ icon: 'error', title: 'Error', text: data.error });
                            return;
                        }
                        document.getElementById('edit_admin_id').value = data.id;
                        document.getElementById('edit_admin_username').value = data.username;
                        document.getElementById('edit_admin_email').value = data.email;
                        form.action = `/admin/admin/update/${data.id}`;
                        
                        toggleModal(true);
                    })
                    .catch(error => {
                        console.error('Error fetching admin:', error);
                        Swal.fire({ icon: 'error', title: 'Gagal', text: 'Gagal mengambil data admin.' });
                    });
            }
        });
    }
    function initAdminEditFormHandler() {
        const form = document.getElementById('editAdminForm');
        const modal = document.getElementById('editAdminModal');

        if (!form) return;

        form.onsubmit = async function (e) {
            e.preventDefault();
            const formData = new FormData(form);
            formData.append('_method', 'PUT');

            try {
                const res = await fetch(form.action, { 
                    method: 'POST', 
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: formData
                });
                
                if (!res.ok) {
                    const errorData = await res.json();
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Memperbarui Admin!',
                        text: errorData.message || 'Cek kembali isian Anda.',
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

                modal.classList.add('hidden');
                modal.classList.remove('flex');
                
                const activeLink = document.querySelector(".spa-link.bg-red-700");
                if (activeLink) {
                        const contentUrl = activeLink.getAttribute("data-url");
                        loadContent(contentUrl, activeLink.href, activeLink);
                }
            } catch (err) {
                console.error('Error updating admin:', err);
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan jaringan atau server!',
                });
            }
        };
    }
    function initDeleteAdminModal() {
        const modal = document.getElementById('deleteAdminModal');
        const closeBtn = document.getElementById('closeDeleteAdminModal');
        const cancelBtn = document.getElementById('cancelDeleteAdmin');
        const form = document.getElementById('deleteAdminForm');

        if (!modal) return;

        function toggleModal(show) {
            modal.classList.toggle('hidden', !show);
            modal.classList.toggle('flex', show);
        }
        
        if (closeBtn) closeBtn.onclick = () => toggleModal(false);
        if (cancelBtn) cancelBtn.onclick = () => toggleModal(false);

         modal.onclick = e => {
            if (e.target === modal) {
                toggleModal(false);
            }
        };

        document.addEventListener('click', function(e) {
            if (e.target.closest('.btnDeleteAdmin')) {
                e.preventDefault();
                const btn = e.target.closest('.btnDeleteAdmin');
                const adminId = btn.getAttribute('data-id');
                const usernameCell = btn.closest('tr').querySelector('td:nth-child(2)');
                const username = usernameCell ? usernameCell.textContent.trim() : 'Admin ini';

                document.getElementById('delete_admin_username_text').textContent = username;
                form.action = `/admin/admin/delete/${adminId}`;
                toggleModal(true);
            }
        });
    }

    function initAdminDeleteFormHandler() {
        const form = document.getElementById('deleteAdminForm');
        const modal = document.getElementById('deleteAdminModal');

        if (!form) return;

        form.onsubmit = async function (e) {
            e.preventDefault();
            
            try {
                const res = await fetch(form.action, {
                    method: 'POST', 
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: '_method=DELETE'
                });

                if (!res.ok) throw new Error("Gagal menghapus data!");

                const data = await res.json();
                
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: data.message,
                    timer: 1800,
                    showConfirmButton: false
                });
                
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                
                const activeLink = document.querySelector(".spa-link.bg-red-700");
                if (activeLink) {
                        const contentUrl = activeLink.getAttribute("data-url");
                        loadContent(contentUrl, activeLink.href, activeLink);
                }
            } catch (err) {
                console.error('Error deleting admin:', err);
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan jaringan atau server!',
                });
            }
        };
    }

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

    function initInitialLoad() {
        const currentUrl = window.location.href;
        const activeLink = document.querySelector(`.spa-link[href="${currentUrl}"]`);

        if (activeLink) {
            const contentUrl = activeLink.getAttribute("data-url");
            
            if (contentUrl) {
                loadContent(contentUrl, currentUrl, activeLink);
            }
        }
    }
    
    initInitialLoad();

});