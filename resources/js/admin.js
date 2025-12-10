document.addEventListener("DOMContentLoaded", () => {

    // ===================== SIDEBAR MOBILE =====================
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


    // ===================== SIDEBAR DESKTOP =====================
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


    // ===================== LOGOUT MODAL =====================
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


    // ===================== MODAL TAMBAH BERITA =====================
    function initAddModal() {
        const addModal = document.getElementById("addModal");
        const openAddModal = document.getElementById("openAddModal");
        const closeAddModal = document.getElementById("closeAddModal");
        const fotoInput = document.getElementById("fotoInput");
        const previewImage = document.getElementById("previewImage");

        console.log("Init modal tambah berita...");

        if (openAddModal) {
            openAddModal.onclick = () => {
                addModal.classList.remove("hidden");
                addModal.classList.add("flex");
            };
        }

        if (closeAddModal) {
            closeAddModal.onclick = () => {
                addModal.classList.add("hidden");
                addModal.classList.remove("flex");
            };
        }

        if (addModal) {
            addModal.onclick = (e) => {
                if (e.target === addModal) {
                    addModal.classList.add("hidden");
                    addModal.classList.remove("flex");
                }
            };
        }

        if (fotoInput) {
            fotoInput.onchange = function () {
                const file = this.files[0];
                if (!file) return;
                const url = URL.createObjectURL(file);
                previewImage.src = url;
                previewImage.classList.remove("hidden");
            };
        }
    }

    // jalankan modal pertama kali jika halaman awal punya modal
    initAddModal();


    // ===================== SPA CONTENT LOADER =====================
    const pageContent = document.getElementById("page-content");
    const spaLinks = document.querySelectorAll(".spa-link");

    function updateActiveLink(activeLink) {
        spaLinks.forEach(l => {
            l.classList.remove("bg-red-700", "shadow-inner", "font-semibold");
            l.classList.add("font-medium");
        });
        activeLink.classList.add("bg-red-700", "shadow-inner", "font-semibold");
        activeLink.classList.remove("font-medium");
    }

    function loadContent(contentUrl, pageUrl, activeLink) {
        pageContent.innerHTML = `
            <div class="flex items-center justify-center h-full min-h-[50vh]">
                <div class="text-center">
                    <svg class="animate-spin h-10 w-10 text-red-800 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <p class="mt-4 text-lg text-gray-600">Memuat Halaman...</p>
                </div>
            </div>
        `;

        fetch(contentUrl)
            .then(r => r.text())
            .then(html => {
                pageContent.innerHTML = html;

                history.pushState(null, "", pageUrl);
                pageContent.scrollTop = 0;

                if (activeLink) updateActiveLink(activeLink);

                // === JALANKAN ULANG SEMUA JS YANG MENGANDALKAN DOM BARU ===
                initAddModal();
                initLogout();
            })
            .catch(err => {
                pageContent.innerHTML = `
                    <div class="text-center py-20 text-red-600">
                        Error memuat halaman: ${err.message}
                    </div>`;
            });
    }

    spaLinks.forEach(link => {
        link.addEventListener("click", function (e) {
            const contentUrl = this.getAttribute("data-url");
            if (!contentUrl) return;

            e.preventDefault();
            const pageUrl = this.getAttribute("href");

            const sidebar = document.getElementById("sidebar");
            const overlay = document.getElementById("overlay");

            if (window.innerWidth < 768) {
                sidebar.classList.add("-translate-x-full");
                overlay.classList.add("hidden");
            }

            loadContent(contentUrl, pageUrl, this);
        });
    });

});
