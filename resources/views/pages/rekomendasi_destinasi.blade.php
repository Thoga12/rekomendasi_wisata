@extends('layouts.apps')

@section('title', 'Rekomendasi Destinasi - Wisata Sulawesi Tenggara')

@section('content')


    <!-- Header Section -->
    <section class="container mx-auto px-6 py-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h1 class="text-4xl font-bold mb-2">Rekomendasi Destinasi Wisata</h1>
                <p class="text-gray-600">Destinasi - desatinasi wisata yang di sulawesi tenggara</p>
            </div>
            <div class="mt-4 md:mt-0">
                <img src="{{ asset('build/assets/images/touristIcons.png') }}" alt="Tourism Icon" class="h-24 w-auto">
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="container mx-auto px-6 py-4">
        <div class="flex flex-wrap justify-between items-center">
            {{-- <div class="flex space-x-2 mb-4 md:mb-0">
                <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded-md text-sm">Kategori</button>
                <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded-md text-sm">Kategori</button>
                <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded-md text-sm">Kategori</button>
            </div> --}}
            <div class="flex space-x-2">
                {{-- <div class="relative">
                    <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md text-sm flex items-center">
                        Harga
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div> --}}
                <div class="relative">
                    <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md text-sm flex items-center">
                        Rating
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Destination Cards -->
    {{-- @if(count($rekomedasis) > 0) --}}
    @if(count($recommendations) > 0)
        <section class="container mx-auto px-6 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                @foreach($recommendations as $item)
                <a href="/deskripsi-destinasi/{{ $item['destination']->id }}">
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset($item['destination']->image) }}" alt="{{ $item['destination']->name }}" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">{{ $item['destination']->name }}</h3>
                        <p class="text-gray-600 text-sm mt-1">{{ $item['destination']->description }}</p>
                        <div class="flex items-center mt-2">
                            <div class="flex text-yellow-400">
                                @php
                                    $avgRating = $item['destination']->ratings_avg_rating ?? 0;
                                    $fullStars = floor($avgRating);
                                    $hasHalfStar = ($avgRating - $fullStars) >= 0.5;
                                    $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                                @endphp

                                 <!-- Bintang Penuh -->
                                 @for ($i = 0; $i < $fullStars; $i++)
                                     <i class="fas fa-star"></i>
                                 @endfor

                                <!-- Bintang Setengah (Opsional) -->
                                @if($hasHalfStar)
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
                                <i class="far fa-star text-gray-300"></i> --}}
                            </div>
                            <span class="text-gray-500 text-sm ml-1">({{ number_format($avgRating, 1)  }}), Rekomdasi Score {{ $item['score'] }}</span>
                        </div>
                    </div>
                </div>
                </a>
                @endforeach
                <!-- Card 2 -->
                {{-- <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <div class="h-48 overflow-hidden">
                        <img src="/api/placeholder/400/300" alt="Gunung Indah" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Gunung Indah</h3>
                        <p class="text-gray-600 text-sm mt-1">Pantai dengan pasir putih dan air biru jernih</p>
                        <div class="flex items-center mt-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star text-gray-300"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-1">(5.0)</span>
                        </div>
                    </div>
                </div> --}}

                <!-- Card 3 -->
                {{-- <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <div class="h-48 overflow-hidden">
                        <img src="/api/placeholder/400/300" alt="Taman Bunga" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Taman Bunga</h3>
                        <p class="text-gray-600 text-sm mt-1">Pantai dengan pasir putih dan air biru jernih</p>
                        <div class="flex items-center mt-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star text-gray-300"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-1">(5.0)</span>
                        </div>
                    </div>
                </div> --}}

                <!-- Card 4 -->
                {{-- <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <div class="h-48 overflow-hidden">
                        <img src="/api/placeholder/400/300" alt="Rumah Adat" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Rumah Adat</h3>
                        <p class="text-gray-600 text-sm mt-1">Arsitektur tradisional dengan dekorasi khas</p>
                        <div class="flex items-center mt-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star text-gray-300"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-1">(5.0)</span>
                        </div>
                    </div>
                </div> --}}

                <!-- Card 5 -->
                {{-- <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <div class="h-48 overflow-hidden">
                        <img src="/api/placeholder/400/300" alt="Kota Kendari" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Kota Kendari</h3>
                        <p class="text-gray-600 text-sm mt-1">Pusat kota dengan pemandangan indah</p>
                        <div class="flex items-center mt-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star text-gray-300"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-1">(5.0)</span>
                        </div>
                    </div>
                </div> --}}

                <!-- Card 6 -->
                {{-- <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <div class="h-48 overflow-hidden">
                        <img src="/api/placeholder/400/300" alt="Rumah Tongkonan" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">Perahu Tradisional</h3>
                        <p class="text-gray-600 text-sm mt-1">Perahu khas dengan pemandangan sunset</p>
                        <div class="flex items-center mt-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star text-gray-300"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-1">(5.0)</span>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
    @else
        <p class="text-center">Belum ada rekomendasi tersedia. Silahkan Rating Beberapa Tempat Yang Pernah Dikunjungi Terlebih Dahulu</p>
    @endif
@endsection

{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Destinasi - Wisata Sulawesi Tenggara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero-heading {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navigation Bar -->

    <!-- Header Section -->
    <section class="container mx-auto px-6 py-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h1 class="text-4xl font-bold mb-2">Rekomendasi Destinasi Wisata</h1>
                <p class="text-gray-600">Destinasi - desatinasi wisata yang di sulawesi tenggara</p>
            </div>
            <div class="mt-4 md:mt-0">
                <img src="{{ asset('build/assets/images/touristIcons.png') }}" alt="Tourism Icon" class="h-24 w-auto">
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="container mx-auto px-6 py-4">
        <div class="flex flex-wrap justify-between items-center">
            <div class="flex space-x-2 mb-4 md:mb-0">
                <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded-md text-sm">Kategori</button>
                <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded-md text-sm">Kategori</button>
                <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded-md text-sm">Kategori</button>
            </div>
            <div class="flex space-x-2">
                <div class="relative">
                    <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md text-sm flex items-center">
                        Harga
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>
                <div class="relative">
                    <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md text-sm flex items-center">
                        Rating
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Destination Cards -->
    <section class="container mx-auto px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('build/assets/images/backgrounds.png') }}" alt="Pantai Indah" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-semibold">Pantai Indah</h3>
                    <p class="text-gray-600 text-sm mt-1">Pantai dengan pasir putih dan air biru jernih</p>
                    <div class="flex items-center mt-2">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star text-gray-300"></i>
                        </div>
                        <span class="text-gray-500 text-sm ml-1">(5.0)</span>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <div class="h-48 overflow-hidden">
                    <img src="/api/placeholder/400/300" alt="Gunung Indah" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-semibold">Gunung Indah</h3>
                    <p class="text-gray-600 text-sm mt-1">Pantai dengan pasir putih dan air biru jernih</p>
                    <div class="flex items-center mt-2">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star text-gray-300"></i>
                        </div>
                        <span class="text-gray-500 text-sm ml-1">(5.0)</span>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <div class="h-48 overflow-hidden">
                    <img src="/api/placeholder/400/300" alt="Taman Bunga" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-semibold">Taman Bunga</h3>
                    <p class="text-gray-600 text-sm mt-1">Pantai dengan pasir putih dan air biru jernih</p>
                    <div class="flex items-center mt-2">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star text-gray-300"></i>
                        </div>
                        <span class="text-gray-500 text-sm ml-1">(5.0)</span>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <div class="h-48 overflow-hidden">
                    <img src="/api/placeholder/400/300" alt="Rumah Adat" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-semibold">Rumah Adat</h3>
                    <p class="text-gray-600 text-sm mt-1">Arsitektur tradisional dengan dekorasi khas</p>
                    <div class="flex items-center mt-2">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star text-gray-300"></i>
                        </div>
                        <span class="text-gray-500 text-sm ml-1">(5.0)</span>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <div class="h-48 overflow-hidden">
                    <img src="/api/placeholder/400/300" alt="Kota Kendari" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-semibold">Kota Kendari</h3>
                    <p class="text-gray-600 text-sm mt-1">Pusat kota dengan pemandangan indah</p>
                    <div class="flex items-center mt-2">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star text-gray-300"></i>
                        </div>
                        <span class="text-gray-500 text-sm ml-1">(5.0)</span>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <div class="h-48 overflow-hidden">
                    <img src="/api/placeholder/400/300" alt="Rumah Tongkonan" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-semibold">Perahu Tradisional</h3>
                    <p class="text-gray-600 text-sm mt-1">Perahu khas dengan pemandangan sunset</p>
                    <div class="flex items-center mt-2">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star text-gray-300"></i>
                        </div>
                        <span class="text-gray-500 text-sm ml-1">(5.0)</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html> --}}
