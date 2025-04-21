<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Artikel - Export Coaching Program</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Link untuk Font Awesome -->
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

    <!-- Article Hero Section -->
    <section class="">
        <img src="assets/image_hero.png" alt="Article Hero Image" class="w-full h-96 object-cover">
    </section>

    <!-- Article Detail Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Tips Sukses Ekspor untuk UMKM</h1>
                <div class="flex items-center text-gray-600 mb-6">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>22 April 2025</span>
                    <span class="mx-4">|</span>
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>John Doe</span>
                </div>
                <div class="prose prose-lg text-gray-600">
                    <p>
                        Memulai ekspor sebagai Usaha Mikro, Kecil, dan Menengah (UMKM) mungkin terasa menantang, tetapi dengan strategi yang tepat, Anda dapat menembus pasar global. Berikut adalah beberapa tips sukses untuk membantu UMKM memulai perjalanan ekspor mereka.
                    </p>
                    <h2>1. Pahami Pasar Target</h2>
                    <p>
                        Sebelum memulai ekspor, lakukan riset mendalam tentang pasar target Anda. Pelajari preferensi konsumen, tren pasar, dan peraturan perdagangan di negara tujuan. Misalnya, jika Anda mengekspor produk makanan, pastikan Anda memahami standar keamanan pangan yang berlaku.
                    </p>
                    <h2>2. Bangun Jaringan yang Kuat</h2>
                    <p>
                        Jaringan adalah kunci dalam ekspor. Hadiri pameran dagang internasional, bergabung dengan asosiasi bisnis, atau manfaatkan platform B2B online untuk terhubung dengan pembeli potensial. Program seperti Export Coaching Program (ECP) juga dapat membantu Anda membangun koneksi dengan pelaku bisnis global.
                    </p>
                    <h2>3. Pastikan Kualitas Produk</h2>
                    <p>
                        Kualitas adalah faktor utama dalam mempertahankan kepercayaan pembeli internasional. Pastikan produk Anda memenuhi standar internasional, baik dari segi kualitas, kemasan, maupun pelabelan. Sertifikasi seperti ISO atau HACCP dapat meningkatkan kredibilitas produk Anda.
                    </p>
                    <h2>4. Manfaatkan Teknologi</h2>
                    <p>
                        Gunakan teknologi untuk mempermudah proses ekspor. Platform e-commerce, media sosial, dan alat analitik dapat membantu Anda menjangkau pelanggan dan mengelola operasi dengan lebih efisien. Pastikan website bisnis Anda mendukung bahasa Inggris untuk menarik pembeli internasional.
                    </p>
                    <h2>5. Ikuti Program Pendampingan</h2>
                    <p>
                        Program seperti ECP dari PPEJP Kemenperin menawarkan pendampingan intensif untuk UMKM yang ingin menjadi eksportir mandiri. Dari pelatihan hingga akses pasar, program ini membantu Anda memahami seluk-beluk ekspor dan membangun strategi yang berkelanjutan.
                    </p>
                    <p>
                        Dengan langkah-langkah ini, UMKM dapat memulai perjalanan ekspor mereka dengan percaya diri. Jangan ragu untuk memanfaatkan sumber daya yang tersedia dan terus belajar dari pengalaman. Pasar global menanti produk unggulan Anda!
                    </p>
                </div>
                <div class="mt-8">
                    <a href="{{ url('/#articles') }}" class="inline-flex items-center text-blue-600 hover:underline">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Kembali ke Daftar Artikel
                    </a>
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