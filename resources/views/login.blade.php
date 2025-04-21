<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Export Coaching Program</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">
    <!-- Header -->
    <header class="bg-white shadow-md py-4 fixed w-full z-10">
        <div class="container mx-auto flex justify-between items-center px-4">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <img src="assets/logo-kemendag.png" alt="Logo" class="h-10">
            </div>
            <!-- Hamburger Button -->
            <button id="hamburger" class="md:hidden focus:outline-none">
                <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <!-- Navigation Menu -->
            <nav id="nav-menu"
                class="hidden md:flex md:items-center md:space-x-4 absolute md:static top-16 left-0 w-full md:w-auto bg-white md:bg-transparent shadow-md md:shadow-none p-4 md:p-0">
                <a href="{{ url('/#home') }}" class="block md:inline text-gray-600 hover:text-blue-600 py-2 md:py-0">Beranda</a>
                <a href="{{ url('/#about') }}" class="block md:inline text-gray-600 hover:text-blue-600 py-2 md:py-0">Tentang Kami</a>
                <a href="{{ url('/#articles') }}" class="block md:inline text-gray-600 hover:text-blue-600 py-2 md:py-0">Artikel</a>
                <a href="{{ url('/#contact') }}" class="block md:inline text-gray-600 hover:text-blue-600 py-2 md:py-0">Kontak</a>
                <a href="/login"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white font-medium rounded-full shadow hover:bg-blue-700 hover:shadow-lg transition duration-300 ease-in-out">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Login
                </a>
            </nav>
        </div>
    </header>

    <!-- Script Toggle Hamburger -->
    <script>
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('nav-menu');

        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('hidden');
        });
    </script>

    <!-- Login Section -->
    <section class="pt-20 pb-16 bg-white min-h-screen flex items-center justify-center">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6 text-center">Masuk ke Akun Anda</h2>
                <div class="space-y-6">
                    <div>
                        <label for="email" class="block text-gray-600 mb-2">Email</label>
                        <input type="email" id="email" placeholder="Masukkan email Anda" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                    <div>
                        <label for="password" class="block text-gray-600 mb-2">Kata Sandi</label>
                        <input type="password" id="password" placeholder="Masukkan kata sandi Anda" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    </div>
                    <div class="flex justify-end">
                        <a href="#" class="text-blue-600 hover:underline text-sm">Lupa Kata Sandi?</a>
                    </div>
                    <button class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition duration-300">Masuk</button>
                </div>
                <p class="mt-6 text-center text-gray-600">
                    Belum punya akun? <a href="/regis" class="text-blue-600 hover:underline">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-6">
        <div class="container mx-auto px-4 sm:px-6 md:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <div>
                <h3 class="font-bold mb-3 text-lg">Pusat Pembinaan SDM Ekspor dan Jasa Perdagangan</h3>
                <p class="text-sm mb-2">Pertambahan, Kota Jakarta Barat 11460</p>
                <p class="text-sm">Email: <a href="mailto:pusatpembinaansdm@kemendag.go.id" class="hover:underline">pusatpembinaansdm@kemendag.go.id</a></p>
            </div>

            <div>
                <h3 class="font-bold mb-3 text-lg">Pusat Pembinaan SDM Ekspor dan Jasa Perdagangan</h3>
                <p class="text-sm mb-2">Pertambahan, Kota Jakarta Barat 11460</p>
                <p class="text-sm">Email: <a href="mailto:pusatpembinaansdm@kemendag.go.id" class="hover:underline">pusatpembinaansdm@kemendag.go.id</a></p>
            </div>

            <div>
                <h3 class="font-bold mb-3 text-lg">Navigation</h3>
                <ul class="space-y-2">
                    <li><a href="{{ url('/#home') }}" class="hover:underline text-sm">Beranda</a></li>
                    <li><a href="{{ url('/#about') }}" class="hover:underline text-sm">Tentang Kami</a></li>
                    <li><a href="{{ url('/#contact') }}" class="hover:underline text-sm">Kontak</a></li>
                    <li><a href="{{ url('/#articles') }}" class="hover:underline text-sm">Artikel</a></li>
                </ul>
            </div>

            <div class="flex flex-col justify-between">
                <h3 class="font-bold mb-3 text-lg">Social</h3>
                <div class="flex space-x-6 mb-4">
                    <a href="https://www.facebook.com/PPEJP.Kemendag" class="text-2xl text-white hover:text-blue-600">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/ppejp.kemendag/" class="text-2xl text-white hover:text-pink-600">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/@PPEJPKemendag" class="text-2xl text-white hover:text-red-600">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="https://www.tiktok.com/@ppejp.kemendag" class="text-2xl text-white hover:text-black">
                        <i class="fab fa-tiktok"></i>
                    </a>
                </div>
                <div class="mt-4 flex justify-start">
                    <a href="https://www.lapor.go.id" target="_blank">
                        <img src="assets/logo-lapor-white.png" alt="Lapor" class="h-10">
                    </a>
                </div>
            </div>
        </div>
    </footer>