<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }} - Export Coaching Program</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Header -->
    <header class="bg-white shadow-md py-4 fixed w-full z-10">
        <div class="container mx-auto flex justify-between items-center px-4">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('assets/logo-kemendag.png') }}" alt="Logo" class="h-10">
            </div>
            <button id="hamburger" class="md:hidden focus:outline-none">
                <svg class="h-6 w-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <nav id="nav-menu"
                class="hidden md:flex md:items-center md:space-x-4 absolute md:static top-16 left-0 w-full md:w-auto bg-white md:bg-transparent shadow-md md:shadow-none p-4 md:p-0">
                <a href="{{ url('/#home') }}" class="block md:inline text-gray-600 hover:text-blue-600 py-2 md:py-0">Beranda</a>
                <a href="{{ url('/#about') }}" class="block md:inline text-gray-600 hover:text-blue-600 py-2 md:py-0">Tentang Kami</a>
                <a href="{{ url('/#articles') }}" class="block md:inline text-gray-600 hover:text-blue-600 py-2 md:py-0">Artikel</a>
                <a href="{{ url('/#contact') }}" class="block md:inline text-gray-600 hover:text-blue-600 py-2 md:py-0">Kontak</a>
                @if (Auth::check())
                <a href="/logout"
                class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white font-medium rounded-full shadow hover:bg-red-700 hover:shadow-lg transition duration-300 ease-in-out">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Logout
            </a>
            @else
            <a href="/login"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white font-medium rounded-full shadow hover:bg-blue-700 hover:shadow-lg transition duration-300 ease-in-out">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Login
                </a>
                @endif
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

    <!-- Main Content Area with Padding for Fixed Header -->
    <main class="pt-20">
        <!-- Event Detail Section -->
        <section class="py-10 bg-white">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Event Image -->
                    <div class="md:w-1/2">
                        <img src="{{ asset('storage/' . $event->image) }}" class="w-full h-auto rounded-lg shadow-lg object-cover" alt="{{ $event->title }}">
                    </div>
                    
                    <!-- Event Details -->
                    <div class="md:w-1/2 bg-white p-6 rounded-lg shadow-md">
                        <h1 class="text-3xl font-bold text-blue-900 mb-4">{{ $event->title }}</h1>
                        
                        <div class="flex items-center mb-4 text-gray-600">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</span>
                        </div>
                        
                        <div class="flex items-center mb-6 text-gray-600">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>{{ $event->location }}</span>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-4">
                            <h2 class="text-xl font-semibold mb-3 text-blue-800">Deskripsi Event</h2>
                            <div class="prose max-w-none text-gray-700">
                                {!! nl2br(e($event->description)) !!}
                            </div>
                        </div>
                        
                        <div class="mt-8">
                            <form action="{{route('register.event')}}" method="POST" id="registerEventForm">
                                @csrf
                                <input type="hidden" name="event_id" value="{{$event->id}}" id="">
                                <button type="button" id="showConfirmButton" class="inline-block bg-blue-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:bg-blue-700 transition duration-300">Daftar Event</button>
                            </form>
                        </div>
            
                        <div id="successAlert" class="hidden fixed top-20 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-md z-50" role="alert">
                            <div class="flex items-center">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                <div>
                                    <p class="font-bold">Berhasil!</p>
                                    <p class="text-sm" id="successMessage"></p>
                                </div>
                                <span class="ml-auto cursor-pointer" onclick="closeAlert('successAlert')">×</span>
                            </div>
                        </div>
                        
                        <div id="errorAlert" class="hidden fixed top-20 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-md z-50" role="alert">
                            <div class="flex items-center">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                <div>
                                    <p class="font-bold">Error!</p>
                                    <p class="text-sm" id="errorMessage"></p>
                                </div>
                                <span class="ml-auto cursor-pointer" onclick="closeAlert('errorAlert')">×</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="confirmationModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="bg-white rounded-lg p-6 shadow-xl max-w-md w-full mx-4">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Konfirmasi Pendaftaran</h3>
                        <p class="text-gray-600 mb-6">Apakah Anda yakin ingin mendaftar pada event ini?</p>
                        <div class="flex justify-end space-x-4">
                            <button id="cancelButton" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition-colors">
                                Batal
                            </button>
                            <button id="confirmButton" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                                Ya, Daftar
                            </button>
                        </div>
                    </div>
                </div>
            
                <!-- Loading Spinner Modal -->
                <div id="loadingModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="bg-white rounded-lg p-8 shadow-xl flex flex-col items-center">
                        <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-blue-600 mb-4"></div>
                        <p class="text-gray-700">Sedang memproses pendaftaran...</p>
                    </div>
                </div>
                <!-- Location Map -->
                <!-- Location Map -->
<div class="mt-10">
    <h2 class="text-2xl font-semibold mb-5 text-blue-800">Lokasi Event</h2>
    <div id="map" class="w-full h-64 md:h-96 rounded-lg shadow-md overflow-hidden">
        @if($event->location_url)
            <iframe 
                src="{{ $event->location_url }}" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        @else
            <div class="flex items-center justify-center h-full bg-gray-200">
                <p class="text-gray-500">Lokasi event belum tersedia</p>
            </div>
        @endif
    </div>
</div>
        </section>
        
        <!-- Related Events Section -->
        <section class="py-10 bg-gray-100">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl font-bold text-center mb-8">Event Terkait Lainnya</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach($relatedEvents as $relatedEvent)
                    <!-- Event Card -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('storage/' . $relatedEvent->image) }}" alt="{{ $relatedEvent->title }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-2">{{ $relatedEvent->title }}</h3>
                            <div class="flex items-center text-sm text-gray-600 mb-2">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>{{ \Carbon\Carbon::parse($relatedEvent->date)->format('d F Y') }}</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600 mb-4">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ $relatedEvent->location }}</span>
                            </div>
                            <a href="{{ route('events.show', $relatedEvent->id) }}" class="text-blue-600 font-medium hover:underline">Lihat Detail →</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

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
                        <img src="{{ asset('assets/logo-lapor-white.png') }}" alt="Lapor" class="h-10">
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
<script>
     document.addEventListener('DOMContentLoaded', function() {
        // Display flash messages if they exist
        @if(session('success'))
            showAlert('successAlert', '{{ session('success') }}');
        @endif

        @if(session('error'))
            showAlert('errorAlert', '{{ session('error') }}');
        @endif

        // Get DOM elements
        const form = document.getElementById('registerEventForm');
        const showConfirmButton = document.getElementById('showConfirmButton');
        const confirmationModal = document.getElementById('confirmationModal');
        const confirmButton = document.getElementById('confirmButton');
        const cancelButton = document.getElementById('cancelButton');
        const loadingModal = document.getElementById('loadingModal');
        
        // Show confirmation modal
        showConfirmButton.addEventListener('click', function() {
            confirmationModal.classList.remove('hidden');
        });
        
        // Hide modal on cancel
        cancelButton.addEventListener('click', function() {
            confirmationModal.classList.add('hidden');
        });
        
        // Confirm and submit form
        confirmButton.addEventListener('click', function() {
            // Hide confirmation modal
            confirmationModal.classList.add('hidden');
            
            // Show loading spinner
            loadingModal.classList.remove('hidden');
            
            // Process form submission
            fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Hide loading spinner
                loadingModal.classList.add('hidden');
                
                // Show appropriate alert
                if (data.status === 'success') {
                    showAlert('successAlert', data.message);
                } else {
                    showAlert('errorAlert', data.message);
                }
            })
            .catch(error => {
                // Hide loading spinner
                loadingModal.classList.add('hidden');
                
                // Show error alert
                showAlert('errorAlert', 'Terjadi kesalahan. Silahkan coba lagi.');
                console.error('Error:', error);
            });
        });
    });

    function showAlert(alertId, message) {
        const alert = document.getElementById(alertId);
        const messageElement = document.getElementById(alertId === 'successAlert' ? 'successMessage' : 'errorMessage');
        
        messageElement.textContent = message;
        alert.classList.remove('hidden');
        
        // Hide alert after 5 seconds
        setTimeout(() => {
            closeAlert(alertId);
        }, 5000);
    }

    function closeAlert(alertId) {
        const alert = document.getElementById(alertId);
        alert.classList.add('hidden');
    }
    
    // Close modal if user clicks outside
    window.addEventListener('click', function(event) {
        if (event.target === confirmationModal) {
            confirmationModal.classList.add('hidden');
        }
    });
</script>
</html>