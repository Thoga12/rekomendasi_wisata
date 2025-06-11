@extends('layouts.apps')

@section('title', 'Daftar Destinasi - Wisata Sulawesi Tenggara')

@section('content')
    <!-- Header Section -->
    <section class="container mx-auto px-6 py-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h1 class="text-4xl font-bold mb-2">Daftar Destinasi</h1>
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
                <div class="relative">
                    {{-- <input type="text" placeholder="Serach Destinasi Wisata"> --}}
                    {{-- <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md text-sm flex items-center">
                        Harga
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button> --}}
                </div>
                <div class="relative">
                    <form action="{{ route('destinasi') }}" id="filterForm" method="GET">
                        {{-- <label for="min_rating">Rating Minimal:</label> --}}
                        <select name="min_rating" id="min_rating" onchange="document.getElementById('filterForm').submit();" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md text-sm flex items-center">
                            <option value="0" {{ request('min_rating') == '0' ? 'selected' : '' }}>Semua Rating</option>
                            <option value="1" {{ request('min_rating') == '1' ? 'selected' : '' }}>1+ Bintang</option>
                            <option value="2" {{ request('min_rating') == '2' ? 'selected' : '' }}>2+ Bintang</option>
                            <option value="3" {{ request('min_rating') == '3' ? 'selected' : '' }}>3+ Bintang</option>
                            <option value="4" {{ request('min_rating') == '4' ? 'selected' : '' }}>4+ Bintang</option>
                            <option value="5" {{ request('min_rating') == '5' ? 'selected' : '' }}>5 Bintang</option>
                        </select>

                        {{-- <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-md text-sm flex items-center">
                            Rating
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button> --}}
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Destination Cards -->
    <section class="container mx-auto px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            @foreach ($destinasis as $destinasi)

            {{-- @endforeach --}}
            <a href="/deskripsi-destinasi/{{ $destinasi->id }}">
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <div class="h-48 overflow-hidden">
                        {{-- {{ asset('images/Pulau Labengki.jpg') }} --}}
                        <img src="{{ asset($destinasi->image) }}" alt="Pantai Indah" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        {{-- <img src="{{ asset('images/174904998_Data Pegawai.png') }}" alt="Pantai Indah" class="w-full h-full object-cover hover:scale-105 transition duration-300"> --}}
                    </div>
                    <div class="p-4">
                        <h3 class="text-xl font-semibold">{{ $destinasi->name }}</h3>
                        <p class="text-gray-600 text-sm mt-1">{{ $destinasi->description }}</p>
                        <div class="flex items-center mt-2">
                            <div class="flex text-yellow-400">
                                @php
                                    $avgRating = $destinasi->ratings_avg_rating ?? 0;
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
                            <span class="text-gray-500 text-sm ml-1">({{ number_format($avgRating, 1) }})</span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            {{-- @endforeach --}}



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

@endsection

