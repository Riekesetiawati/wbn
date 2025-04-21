<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Coaching Program - Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-white font-sans">
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
                <a href="#home" class="block md:inline text-gray-600 hover:text-blue-600 py-2 md:py-0">Beranda</a>
                <a href="#about" class="block md:inline text-gray-600 hover:text-blue-600 py-2 md:py-0">Tentang Kami</a>
                <a href="#articles" class="block md:inline text-gray-600 hover:text-blue-600 py-2 md:py-0">Artikel</a>
                <a href="#contact" class="block md:inline text-gray-600 hover:text-blue-600 py-2 md:py-0">Kontak</a>
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

    <!-- Hero Section with Alpine.js Carousel (Full Width) -->
    <section id="home" x-data="carousel()" x-init="startAutoSlide()" class="relative overflow-hidden w-full ">
        <div class="w-full px-12 py-32 md:py-64 flex flex-col md:flex-row items-center relative h-[600px]">
            <div class="relative w-full overflow-hidden">
                <div class="flex transform-gpu transition-transform duration-[1000ms] ease-in-out" :style="`transform: translateX(-${activeSlide * 100}%);`">
                    <template x-for="(slide, index) in slides" :key="index">
                        <div class="min-w-full flex flex-col md:flex-row items-center gap-8 px-4 md:px-8">
                            <div class="md:w-1/2 z-10">
                                <h1 class="text-4xl md:text-6xl font-bold text-gray-800 leading-tight" x-html="slide.title"></h1>
                                <p class="mt-4 text-gray-600 max-w-md" x-text="slide.desc"></p>
                                <a href="/login" class="inline-block mt-6 bg-blue-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-blue-700 transition duration-300">
                                    Login
                                </a>
                            </div>
                            <div class="w-full md:w-1/2">
                                <img :src="slide.image" alt="Slide Image" class="object-contain w-full h-[300px] md:h-[400px] rounded-xl">
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <!-- Alpine.js Script for Hero Carousel -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('carousel', () => ({
                activeSlide: 0,
                slides: [
                    {
                        title: 'Selamat Datang di Export Coaching Program',
                        desc: 'Dorong UMKM Indonesia menuju pasar global dengan pendampingan intensif dan strategi ekspor yang berkelanjutan.',
                        image: 'assets/image_hero.png'
                    },
                    {
                        title: 'Kembangkan Bisnis Anda ke Pasar Internasional',
                        desc: 'Dapatkan bimbingan dari ahli untuk memperluas jaringan dan menjangkau pasar global.',
                        image: 'assets/image_hero.png'
                    },
                    {
                        title: 'Jadi Eksportir Mandiri Bersama ECP',
                        desc: 'Ikuti program kami untuk menjadi eksportir yang kompetitif dan berkelanjutan.',
                        image: 'assets/image_hero.png'
                    }
                ],
                startAutoSlide() {
                    setInterval(() => {
                        this.nextSlide();
                    }, 5000);
                },
                nextSlide() {
                    this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                },
                prevSlide() {
                    this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
                }
            }));
        });
    </script>

    <!-- About Us Section -->
    <section id="about" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-8">Tentang Kami</h2>
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-6 md:mb-0">
                    <img src="assets/image_hero.png" alt="About Us" class="w-full h-64 object-cover rounded-lg shadow-md">
                </div>
                <div class="md:w-1/2 md:pl-8">
                    <p class="text-base md:text-lg text-gray-600">
                        Export Coaching Program (ECP) adalah inisiatif dari PPEJP Kemenperin untuk membimbing UMKM Indonesia menjadi eksportir mandiri. Kami menyediakan pendampingan intensif, pelatihan, dan akses ke pasar global untuk memastikan keberlanjutan ekspor UMKM. Dengan pengalaman mendampingi ribuan peserta, ECP berkomitmen untuk memperkuat perekonomian Indonesia melalui peningkatan daya saing UMKM di kancah internasional.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Events Section -->
    <section id="events" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-12">Acara Mendatang</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                    <img src="assets/image_hero.png" alt="Event 1" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Workshop Ekspor 101</h3>
                    <p class="text-gray-600 mb-4">Pelajari dasar-dasar ekspor dan strategi masuk pasar global.</p>
                    <p class="text-blue-600 font-semibold">10 Mei 2025 | Jakarta</p>
                    <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">Daftar Sekarang</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                    <img src="assets/image_hero.png" alt="Event 2" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Seminar Digital Marketing</h3>
                    <p class="text-gray-600 mb-4">Kuasai strategi pemasaran digital untuk menjangkau pasar internasional.</p>
                    <p class="text-blue-600 font-semibold">15 Juni 2025 | Surabaya</p>
                    <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">Daftar Sekarang</a>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300">
                    <img src="assets/image_hero.png" alt="Event 3" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Pameran Produk UMKM</h3>
                    <p class="text-gray-600 mb-4">Pamerkan produk Anda kepada pembeli internasional.</p>
                    <p class="text-blue-600 font-semibold">20 Juli 2025 | Bali</p>
                    <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles Carousel Section -->
    <section id="articles" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-12">Artikel Terbaru</h2>
            <div class="relative overflow-hidden">
                <div class="carousel flex transition-transform duration-500 ease-in-out" id="articles-carousel">
                    <div class="carousel-item flex-shrink-0 w-full px-3">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <img src="assets/image_hero.png" alt="Article 1" class="w-full h-48 object-cover rounded-lg mb-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Tips Sukses Ekspor untuk UMKM</h3>
                            <p class="text-gray-600">Pelajari strategi kunci untuk memulai ekspor dengan sukses.</p>
                            <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">Baca Selengkapnya</a>
                        </div>
                    </div>
                    <div class="carousel-item flex-shrink-0 w-full px-3">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <img src="assets/image_hero.png" alt="Article 2" class="w-full h-48 object-cover rounded-lg mb-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Peluang Pasar di ASEAN</h3>
                            <p class="text-gray-600">Temukan peluang ekspor di pasar ASEAN yang berkembang pesat.</p>
                            <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">Baca Selengkapnya</a>
                        </div>
                    </div>
                    <div class="carousel-item flex-shrink-0 w-full px-3">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <img src="assets/image_hero.png" alt="Article 3" class="w-full h-48 object-cover rounded-lg mb-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Manfaat Sertifikasi Ekspor</h3>
                            <p class="text-gray-600">Pahami pentingnya sertifikasi untuk keberlanjutan ekspor.</p>
                            <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- Carousel Controls -->
                <button id="prev-slide" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="next-slide" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-gradient-to-r from-blue-700 to-blue-500 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-8">Hubungi Kami</h2>
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-6 md:mb-0">
                    <p class="text-base md:text-lg">
                        Pusat Pembinaan SDM Ekspor dan Jasa Perdagangan<br>
                        Pertambahan, Kota Jakarta Barat 11460<br>
                        Email: pusatpembinaansdm@kemendag.go.id<br>
                        Telepon: +62 21 1234 5678
                    </p>
                </div>
                <div class="md:w-1/2">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Kirim Pesan</h3>
                        <div class="space-y-4">
                            <input type="text" placeholder="Nama" class="w-full p-3 border rounded-lg">
                            <input type="email" placeholder="Email" class="w-full p-3 border rounded-lg">
                            <textarea placeholder="Pesan" class="w-full p-3 border rounded-lg h-32"></textarea>
                            <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300">Kirim</button>
                        </div>
                    </div>
                </div>
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

    <!-- JavaScript for Articles Carousel -->
    <script>
        const slides = document.querySelectorAll('#articles-carousel .carousel-item');
        const carousel = document.getElementById('articles-carousel');
        const prevButton = document.getElementById('prev-slide');
        const nextButton = document.getElementById('next-slide');
        let currentSlide = 0;

        function showSlide(index) {
            if (index >= slides.length) {
                currentSlide = 0;
            } else if (index < 0) {
                currentSlide = slides.length - 1;
            } else {
                currentSlide = index;
            }
            const slideWidth = slides[0].offsetWidth;
            carousel.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
        }

        prevButton.addEventListener('click', () => {
            showSlide(currentSlide - 1);
        });

        nextButton.addEventListener('click', () => {
            showSlide(currentSlide + 1);
        });

        // Auto-slide for articles carousel
        setInterval(() => {
            showSlide(currentSlide + 1);
        }, 5000);

        window.addEventListener('resize', () => {
            showSlide(currentSlide);
        });

        window.addEventListener('load', () => {
            showSlide(0);
        });
    </script>