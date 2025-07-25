@extends('layouts.appsAdmins')

@section('title', 'Dashboard Admin')

@section('content')



    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>  --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head> --}}
{{-- <body class="bg-gray-100"> --}}
    <div class="min-h-screen">
        <!-- Header -->
        {{-- <header class="bg-white shadow-sm border-b">
            <div class="px-6 py-4">
                <div class="flex items-center justify-between">
                    <!-- Left side with hamburger menu and navigation -->
                    <div class="flex items-center space-x-8">
                        <button class="text-gray-600 hover:text-gray-900">
                            <i class="fas fa-bars text-xl"></i>
                        </button>

                        <!-- Navigation Tabs -->
                        <nav class="flex space-x-8">
                            <a href="/admin/dashboard" class="text-blue-600 border-b-2 border-blue-600 pb-2 font-medium">Dashboard</a>
                            <a href="/admin/destinasi" class="text-gray-600 hover:text-gray-900 pb-2">Wisata</a>
                            <a href="/admin/pengguna" class="text-gray-600 hover:text-gray-900 pb-2">Pengguna</a>
                        </nav>
                    </div>

                    <!-- Right side with profile -->
                    <div class="flex items-center">
                        <img src="/api/placeholder/40/40" alt="Profile" class="w-10 h-10 rounded-full">
                    </div>
                </div>
            </div>
        </header> --}}

        <!-- Main Content -->
        <main class="p-6">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Card 1 - Users -->
                <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user text-purple-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-2xl font-bold text-gray-900">{{ $users }}</h3>
                            <p class="text-gray-600 text-sm">Total Pengguna</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 - Wisata -->
                <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-map text-blue-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-2xl font-bold text-gray-900">{{ $destinasi }}</h3>
                            <p class="text-gray-600 text-sm">Total Wisata</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 - Kategori -->
                {{-- <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-folder text-green-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-2xl font-bold text-gray-900">10</h3>
                            <p class="text-gray-600 text-sm">Total Kategori</p>
                        </div>
                    </div>
                </div> --}}
            </div>

            <!-- Additional Content Area -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Aktivitas Terbaru</h2>
                <div class="space-y-4">
                @forelse ($histories as $history)
                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-plus text-blue-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ $history->activity }} </p>
                            <p class="text-xs text-gray-500">{{ $history->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    {{-- <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-user-plus text-green-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Pengguna baru mendaftar</p>
                            <p class="text-xs text-gray-500">5 jam yang lalu</p>
                        </div>
                    </div> --}}
                 @empty
        <p class="text-sm text-gray-500">Belum ada aktivitas.</p>
    @endforelse



                    {{-- <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-edit text-purple-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Kategori diperbarui</p>
                            <p class="text-xs text-gray-500">1 hari yang lalu</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </main>
    </div>
@endsection

{{-- </body> --}}
