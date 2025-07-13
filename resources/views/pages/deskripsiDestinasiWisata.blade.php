@extends('layouts.apps')

@section('title', 'Detail Destinasi - ' . $destinasi->name )

@section('content')

    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Destinasi - Pantai Indah</title> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    {{-- </head> --}}

    <style>
        .star {
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .star:hover {
            transform: scale(1.1);
        }
        .star.filled {
            color: #fbbf24;
        }
        .star.empty {
            color: #d1d5db;
        }
    </style>
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->

        {{-- <nav class="bg-blue-600 p-4">
            <div class="container mx-auto flex justify-between items-center">
                <a href="#" class="text-white text-xl font-bold">Wisata Sulawesi Tenggara</a>
                <div class="space-x-4 hidden md:block">
                    <a href="#" class="text-white">Home</a>
                    <a href="#" class="text-white">Destinasi</a>
                    <a href="#" class="text-white">Rekomendasi</a>
                    <a href="#" class="text-white">Tentang</a>
                    <a href="#" class="text-white">Kontak</a>
                </div>
                <div class="space-x-2">
                    <a href="#" class="text-white">Login</a>
                    <a href="#" class="text-white">Register</a>
                </div>
            </div>
        </nav> --}}
        {{-- <div --}}
            {{-- class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white/20 backdrop-blur-md p-8 rounded-lg shadow-lg"> --}}
            @if (session('success'))
                <div class="fixed top-4 right-4 z-50 px-4 py-3 rounded shadow-lg bg-green-500 text-white flex items-center">
                    <span>{{ session('success') }}</span>
                    <button class="ml-4 text-xl" onclick="this.parentElement.remove()">&times;</button>
                </div>
            @endif
        {{-- </div> --}}
        <!-- Main Content -->
        <main class="flex-grow">
            <div class="container mx-auto p-6 bg-white text-black rounded-lg shadow-lg my-4">
                <!-- Hero Image -->
                <div class="mb-4 rounded-lg overflow-hidden">
                    <img src="{{ asset($destinasi->image) }}" alt="Pantai Indah"
                        class="w-full h-64 object-cover">
                </div>

                <!-- Destination Title and Rating -->
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-bold">{{ $destinasi->name }}</h1>
                    <div class="flex items-center">
                        <div class="flex text-yellow-400">
                            @php
                                $avgRating = $destinasi->ratings_avg_rating ?? 0;
                                $fullStars = floor($avgRating);
                                $hasHalfStar = $avgRating - $fullStars >= 0.5;
                                $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                            @endphp

                            <!-- Bintang Penuh -->
                            @for ($i = 0; $i < $fullStars; $i++)
                                <i class="fas fa-star"></i>
                            @endfor

                            <!-- Bintang Setengah (Opsional) -->
                            @if ($hasHalfStar)
                                <i class="fas fa-star-half-alt"></i>
                            @endif

                            <!-- Bintang Kosong -->
                            @for ($i = 0; $i < $emptyStars; $i++)
                                <i class="far fa-star"></i>
                            @endfor
                            {{-- <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i> --}}
                        </div>
                        <span class="ml-1 text-gray-600 mr-3">{{ number_format($avgRating, 1) }}</span>

                        @auth
                            <form action="{{ route('ratings.store', $destinasi->id) }}" method="POST"
                                class="flex gap-3 items-center justify-center ">
                                @csrf
                                <div class="mb-0">

                                    <select name="rating" id="rating" required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                        <option value="" disabled selected class="text-gray-400">Pilih rating...
                                        </option>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}" class="text-gray-900">
                                                {{ $i }} {{ $i == 1 ? 'Bintang' : 'Bintang' }}
                                                {{ str_repeat('★', $i) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <button type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-3 rounded-md transition duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Kirim Rating
                                </button>
                            </form>
                        @endauth
                    </div>
                    {{-- @auth
                        <form action="{{ route('ratings.store', $destinasi->id) }}" method="POST">
                            @csrf
                            <label for="rating">Beri Rating:</label>
                            <select name="rating" id="rating" required>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <button type="submit">Kirim</button>
                        </form>
                    @endauth --}}
                </div>

                <!-- Description -->
                <p class="text-sm mb-6">
                    {{ $destinasi->description }}Pantai dengan pasir putih dan air yang jernih. Berlokasi singkat
                    tentang destinasi wisata ini. Tempat ini menawarkan pemandangan yang indah, udara yang segar, dan
                    berbagai aktivitas menarik yang bisa dinikmati oleh pengunjung dari segala usia.
                </p>

                <!-- Two Column Layout for Map and Reviews -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Map Column -->
                    <div id="map" style="height: 400px;"></div>
                    {{-- <div>
                        <h2 class="text-lg font-bold mb-2">Lokasi Jalur GIS</h2>
                        <div class="border rounded-lg overflow-hidden">
                            <img src="{{ asset('build/assets/images/touristIcons.png') }}" alt="Peta Lokasi" class="w-full">
                        </div>
                    </div> --}}

                    <!-- Reviews Column -->
                    <div>
                        <h2 class="text-lg font-bold mb-2">Ulasan Dari Pengguna Lain</h2>

                        <!-- Review 1 -->
                        @foreach ($destinasi->ratings as $rating)
                            <div class="border rounded-lg p-3 mb-2">
                                <div class="flex items-center mb-1">
                                    <img src="{{ asset('build/assets/images/touristIcons.png') }}" alt="User"
                                        class="w-8 h-8 rounded-full mr-2">
                                    <p class="font-semibold">{{ $rating->user->name }}</p>
                                </div>
                                <div class="flex text-yellow-400 mb-1">
                                    @for ($i = 1; $i <= $rating->rating; $i++)
                                        <i class="fas fa-star"></i>
                                        {{-- <i class="fas fa-star"></i> --}}

                                    @endfor
                                    <span
                                        class="ml-1 text-gray-600 text-xs">({{ number_format($rating->rating) }})</span>
                                </div>
                                <p class="text-xs">
                                    {{-- Komentar tentang destinasi wisata ini, pemandangan yang indah, udara yang segar, dan
                                    berbagai aktivitas menarik yang bisa dinikmati oleh pengunjung dari segala usia. --}}
                                    {{ $rating->comment }}
                                </p>
                            </div>
                        @endforeach

                        <!-- Review 2 -->
                        {{-- <div class="border rounded-lg p-3 mb-2">
                            <div class="flex items-center mb-1">
                                <img src="/api/placeholder/40/40" alt="User" class="w-8 h-8 rounded-full mr-2">
                                <p class="font-semibold">Pengguna</p>
                            </div>
                            <div class="flex text-yellow-400 mb-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="ml-1 text-gray-600 text-xs">(5.0)</span>
                            </div>
                            <p class="text-xs">
                                Komentar tentang destinasi wisata ini, pemandangan yang indah, udara yang segar, dan berbagai aktivitas menarik yang bisa dinikmati oleh pengunjung dari segala usia.
                            </p>
                        </div> --}}

                        <!-- Review 3 -->
                        {{-- <div class="border rounded-lg p-3">
                            <div class="flex items-center mb-1">
                                <img src="/api/placeholder/40/40" alt="User" class="w-8 h-8 rounded-full mr-2">
                                <p class="font-semibold">User</p>
                            </div>
                            <div class="flex text-yellow-400 mb-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="ml-1 text-gray-600 text-xs">(5.0)</span>
                            </div>
                            <p class="text-xs">
                                Komentar tentang destinasi wisata ini, pemandangan yang indah, udara yang segar, dan berbagai aktivitas menarik yang bisa dinikmati oleh pengunjung dari segala usia.
                            </p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 py-4">
            <div class="container mx-auto text-center">
                <p>&copy; 2025 Wisata Sulawesi Tenggara. All rights reserved.</p>
            </div>
        </footer>
    </div>
@endsection
@push('scripts')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([{{ $destinasi->latitude }}, {{ $destinasi->longitude }}], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);
        L.marker([{{ $destinasi->latitude }}, {{ $destinasi->longitude }}]).addTo(map)
            .bindPopup('{{ $destinasi->name }}').openPopup();
    </script>
@endpush
