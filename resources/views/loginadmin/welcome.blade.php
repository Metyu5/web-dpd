<!DOCTYPE html>
<html lang="id" class="h-full antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - DPD RI Kota Gorontalo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Disable scrolling completely */
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden !important;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.6s ease-out;
        }
        .animate-slideDown {
            animation: slideDown 0.5s ease-out;
        }
        .bg-pattern {
            background-color: #f8fafc;
            background-size: 80px 140px;
            background-position: 0 0, 0 0, 40px 70px, 40px 70px;
        }
        .input-focus:focus {
            border-color: #0284c7;
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.1);
        }
       
        .logo-shadow {
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
        }
    </style>
</head>
<body class="h-full bg-pattern overflow-hidden">
    
    <!-- Main Container -->
    <div class="h-full flex flex-col justify-center px-6 sm:px-6 lg:px-8 overflow-hidden -translate-y-10">
        
        <!-- Header Section -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md animate-slideDown">
            <!-- Logo & Title -->
            <div class="flex justify-center mb-4">
                <div class="logo-shadow">
                    <img src="{{ asset('DPD-RI.png') }}" class="w-16" alt="logoDPD">
                </div>
            </div>
            
            <h2 class="text-center text-2xl font-extrabold text-gray-900 mb-1">
                Portal Admin DPD RI
            </h2>
            <p class="text-center text-xs text-gray-600 mb-1">
                Dewan Perwakilan Daerah Kota Gorontalo
            </p>
            <div class="flex items-center justify-center gap-2 text-xs text-gray-500">
                <i class="fas fa-shield-alt text-sky-600"></i>
                <span>Sistem Terproteksi & Terenkripsi</span>
            </div>
        </div>

        <!-- Login Form Card -->
        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-md animate-fadeIn">
            <div class="bg-white py-6 px-6 shadow-2xl rounded-2xl sm:px-8 border border-gray-100">
                
                <!-- Alert Information -->
                <div class="mb-4 bg-blue-50 border-l-4 border-sky-500 p-3 rounded-r-lg">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-sky-500 text-sm mt-0.5"></i>
                        </div>
                        <div class="ml-2">
                            <p class="text-xs text-sky-800 font-medium">
                                Masuk dengan akun administrator resmi
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Login Form -->
                <form class="space-y-4" action="#" method="POST">
                    
                    <!-- Username/Email Field -->
                    <div>
                        <label for="username" class="block text-xs font-semibold text-gray-700 mb-1.5">
                            <i class="fas fa-user text-gray-400 mr-1"></i>Username / Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400 text-sm"></i>
                            </div>
                            <input 
                                id="username" 
                                name="username" 
                                type="text" 
                                required 
                                class="input-focus appearance-none block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none transition duration-200 text-gray-900 text-sm"
                                placeholder="Masukkan username atau email"
                            >
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-xs font-semibold text-gray-700 mb-1.5">
                            <i class="fas fa-lock text-gray-400 mr-1"></i>Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-key text-gray-400 text-sm"></i>
                            </div>
                            <input 
                                id="password" 
                                name="password" 
                                type="password" 
                                required 
                                class="input-focus appearance-none block w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none transition duration-200 text-gray-900 text-sm"
                                placeholder="Masukkan password"
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword()" 
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition"
                            >
                                <i id="toggleIcon" class="fas fa-eye text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input 
                                id="remember-me" 
                                name="remember-me" 
                                type="checkbox" 
                                class="h-3.5 w-3.5 text-sky-600 focus:ring-sky-500 border-gray-300 rounded cursor-pointer"
                            >
                            <label for="remember-me" class="ml-2 block text-xs text-gray-700 cursor-pointer">
                                Ingat saya
                            </label>
                        </div>

                        <div class="text-xs">
                            <a href="#" class="font-medium text-sky-600 hover:text-sky-500 transition">
                                Lupa password?
                            </a>
                        </div>
                    </div>

                    <!-- CAPTCHA Verification -->
                    <div class="bg-gray-50 p-3 rounded-lg border border-gray-200">
                        <div class="flex items-center justify-between mb-2">
                            <label class="block text-xs font-semibold text-gray-700">
                                <i class="fas fa-robot text-gray-400 mr-1"></i>Verifikasi Keamanan
                            </label>
                            <button type="button" onclick="refreshCaptcha()" class="text-sky-600 hover:text-sky-700 text-xs">
                                <i class="fas fa-sync-alt mr-1"></i>Muat Ulang
                            </button>
                        </div>
                        <div class="flex gap-2 items-center">
                            <div class="bg-gradient-to-br from-sky-100 to-blue-100 px-3 py-2 rounded-lg border-2 border-sky-300 font-mono text-xl font-bold text-sky-700 tracking-widest select-none" id="captchaCode">
                                A8K2X
                            </div>
                            <input 
                                type="text" 
                                placeholder="Ketik kode" 
                                class="input-focus flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none transition text-sm"
                                required
                            >
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button 
                            type="submit" 
                            class="btn-hover w-full flex justify-center items-center py-2.5 px-4 border border-transparent rounded-lg shadow-lg text-sm font-bold text-white bg-gradient-to-r from-sky-600 to-green-600 hover:from-sky-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transition-all duration-200"
                        >
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Masuk ke Dashboard
                        </button>
                    </div>
                </form>

                <!-- Contact Admin -->
                <div class="mt-4 grid grid-cols-2 gap-2">
                    <a href="tel:085256748481" class="flex items-center justify-center px-3 py-2 border border-gray-300 rounded-lg shadow-sm bg-white text-xs font-medium text-gray-700 hover:bg-gray-50 transition">
                        <i class="fas fa-phone text-green-600 mr-1.5"></i>
                        Telepon
                    </a>
                    <a href="mailto:info@dpd.go.id" class="flex items-center justify-center px-3 py-2 border border-gray-300 rounded-lg shadow-sm bg-white text-xs font-medium text-gray-700 hover:bg-gray-50 transition">
                        <i class="fas fa-envelope text-blue-600 mr-1.5"></i>
                        Email
                    </a>
                </div>

            </div>

            <!-- Footer Info -->
            <div class="mt-3 text-center">
                <p class="text-xs text-gray-500">
                    <i class="fas fa-lock text-gray-400 mr-1"></i>
                    Koneksi aman dan terenkripsi
                </p>
            </div>
        </div>
    </div>

    <!-- JavaScript Functions -->
    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Refresh CAPTCHA
        function refreshCaptcha() {
            const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
            let captcha = '';
            for (let i = 0; i < 5; i++) {
                captcha += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            document.getElementById('captchaCode').textContent = captcha;
            
            // Animation
            const captchaElement = document.getElementById('captchaCode');
            captchaElement.style.transform = 'rotate(360deg)';
            captchaElement.style.transition = 'transform 0.5s ease';
            setTimeout(() => {
                captchaElement.style.transform = 'rotate(0deg)';
            }, 500);
        }

        // Form Validation
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            if (username && password) {
                const submitBtn = e.target.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memverifikasi...';
                submitBtn.disabled = true;
                
                setTimeout(() => {
                    alert('Login berhasil! (Demo Mode)');
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            }
        });

        // Initialize CAPTCHA on load
        window.addEventListener('load', function() {
            refreshCaptcha();
        });
    </script>

</body>
</html>