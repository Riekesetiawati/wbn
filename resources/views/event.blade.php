<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Coaching Program</title>
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


    <!-- Hero Section -->
    <section class="">
        <img src="assets/image_hero.png" alt="Hero Image" class="w-full h-96 object-cover">
    </section>

    <!-- Welcome Section -->
    <section class="py-10 bg-white">
        <div class="container mx-auto text-center px-4">
            <h1 class="text-2xl md:text-3xl font-bold mb-4">Selamat datang di website Export Coaching Program</h1>
            <p class="text-base md:text-lg">
                Sebagai salah satu motor penggerak perekonomian Indonesia, UMKM Indonesia perlu didorong untuk lebih berperan serta<br>
                secara lokal maupun di pasar global. PPEJP Kemenperin konsisten dalam melaksanakan program-program dalam<br>
                membimbing UMKM memperoleh akses ke pasar global. Salah satu langkah konkritnya adalah melalui pelaksanaan<br>
                Export Coaching Program (ECP) yang memberikan pendampingan kepada UMKM secara intensif untuk menjadi eksportir<br>
                mandiri serta mempertahankan eksistensi ekspor secara berkelanjutan di pasar global.
            </p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-10 bg-white">
        <div class="container mx-auto text-center px-4">
            <h2 class="text-xl md:text-2xl font-bold mb-6 bg-blue-900 text-white py-2 px-4 rounded-lg inline-block">Data Export Coaching Program PPEJP</h2>
            <div class="flex flex-col md:flex-row justify-around space-y-6 md:space-y-0">
                <div>
                    <h3 class="text-4xl md:text-5xl font-bold text-blue-900">74</h3>
                    <p>Angkatan ECP</p>
                </div>
                <div>
                    <h3 class="text-4xl md:text-5xl font-bold text-blue-900">2169</h3>
                    <p>Peserta ECP</p>
                </div>
                <div>
                    <h3 class="text-4xl md:text-5xl font-bold text-blue-900">562</h3>
                    <p>Jumlah Berhasil Ekspor</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class=" bg-white px-12 py-10 ">
        <div class="relative w-full">
            <img src="assets/proses-bisnis.png" alt="" class="w-full block">
        </div>
    </section>



    <!-- Criteria Section -->
    <section class="bg-white py-10">
        <div class="container mx-auto px-4">
            <h2 class="text-xl md:text-2xl font-bold text-center mb-6">Kriteria Peserta</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-6">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-bold">Nilai & Budaya Sehat (UK, CO, PT)</h3>
                    <p>Koperasi yang sehat secara organisasi dan finansial.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-bold">Kapasitas Produksi</h3>
                    <p>Memiliki kapasitas produksi yang mendukung.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-bold">Komitmen Tahunan</h3>
                    <p>Memiliki komitmen untuk mengikuti program selama 1 tahun.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-bold">Pengalaman Bisnis</h3>
                    <p>Memiliki pengalaman bisnis minimal 1 tahun.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-bold">Kemampuan</h3>
                    <p>Memiliki kemampuan berbahasa Inggris dan mengoperasikan komputer.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Section -->
    <section class="py-16 bg-gradient-to-r from-blue-500 to-blue-700 text-white">
        <div class="container mx-auto text-center px-4">
            <h2 class="text-2xl md:text-4xl font-bold mb-4">Daftar Sekarang untuk Export Coaching Program</h2>
            <p class="text-base md:text-lg mb-8">
                Bergabunglah dengan program kami untuk mendapatkan pendampingan intensif dan menjadi eksportir mandiri.
                Jangan lewatkan kesempatan ini untuk mengembangkan bisnis Anda ke pasar global!
            </p>
            <a href="#" class="inline-block bg-white text-blue-700 font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-gray-100 transition duration-300">
                Daftar Sekarang
            </a>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-4xl font-bold text-center mb-12 text-gray-800">Manfaat Bergabung dengan ECP</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center transform hover:scale-105 transition duration-300">
                    <div class="mb-4">
                        <svg class="h-12 w-12 mx-auto text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3v2h6v-2c0-1.657-1.343-3-3-3zm0-4a7 7 0 00-7 7v2a7 7 0 007 7 7 7 0 007-7v-2a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Pendampingan Intensif</h3>
                    <p class="text-gray-600">
                        Dapatkan bimbingan langsung dari para ahli untuk membantu bisnis Anda berkembang di pasar global.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center transform hover:scale-105 transition duration-300">
                    <div class="mb-4">
                        <svg class="h-12 w-12 mx-auto text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v6a2 2 0 002 2h2a2 2 0 002-2v-6m-7-7v14"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Akses Pasar Global</h3>
                    <p class="text-gray-600">
                        Peluang untuk memperluas jaringan dan menjangkau pasar internasional dengan strategi yang tepat.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center transform hover:scale-105 transition duration-300">
                    <div class="mb-4">
                        <svg class="h-12 w-12 mx-auto text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Sertifikasi dan Dukungan</h3>
                    <p class="text-gray-600">
                        Dapatkan sertifikasi resmi dan dukungan berkelanjutan untuk keberlanjutan ekspor Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Carousel Section -->
    <section class="py-10 bg-white">
        <div class="container mx-auto px-4 bg-white">
            <h2 class="text-xl md:text-2xl font-bold text-center mb-6">Dokumentasi Kegiatan ECP</h2>
            <div class="relative overflow-hidden">
                <div class="carousel flex transition-transform duration-500 ease-in-out" id="carousel">
                    <div class="carousel-item flex-shrink-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-3">
                        <img src="assets/doc.png" alt="Documentation 1" class="w-full h-48 object-cover rounded-lg">
                    </div>
                    <div class="carousel-item flex-shrink-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-3">
                        <img src="assets/doc.png" alt="Documentation 2" class="w-full h-48 object-cover rounded-lg">
                    </div>
                    <div class="carousel-item flex-shrink-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-3">
                        <img src="assets/doc.png" alt="Documentation 3" class="w-full h-48 object-cover rounded-lg">
                    </div>
                    <div class="carousel-item flex-shrink-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-3">
                        <img src="assets/doc.png" alt="Documentation 4" class="w-full h-48 object-cover rounded-lg">
                    </div>
                    <div class="carousel-item flex-shrink-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-3">
                        <img src="assets/doc.png" alt="Documentation 5" class="w-full h-48 object-cover rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Map Section -->
    <section class="bg-blue-900 text-white py-10">
        <div class="container mx-auto px-4">
            <h2 class="text-xl md:text-2xl font-bold text-center mb-6">Sebaran Wilayah ECP (Export Coaching Program)</h2>
            <div class="w-full h-64 bg-gray-300 rounded-lg flex items-center justify-center">
                <p>Map Placeholder (Leaflet.js integration can be added here)</p>
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

    <style>
        .carousel {
            display: flex;
            overflow-x: hidden;
        }

        .carousel-item {
            transition: transform 0.5s ease-in-out;
        }
    </style>
    <script>
        const slides = document.querySelectorAll('.carousel-item');
        const carousel = document.getElementById('carousel');
        let currentSlide = 0;

        function getVisibleSlides() {
            if (window.innerWidth >= 1024) return 4; // lg
            if (window.innerWidth >= 768) return 3; // md
            if (window.innerWidth >= 640) return 2; // sm
            return 1; // default
        }

        function showSlide(index) {
            const visibleSlides = getVisibleSlides();
            if (index > slides.length - visibleSlides) {
                currentSlide = 0;
            } else if (index < 0) {
                currentSlide = slides.length - visibleSlides;
            } else {
                currentSlide = index;
            }
            const slideWidth = slides[0].offsetWidth;
            carousel.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        setInterval(() => {
            nextSlide();
        }, 3000);

        window.addEventListener('resize', () => {
            showSlide(currentSlide);
        });

        window.addEventListener('load', () => {
            showSlide(0);
        });
    </script>