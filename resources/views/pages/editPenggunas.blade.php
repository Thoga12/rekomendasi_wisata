@extends('layouts.appsAdmins')

@section('title', 'Edit Pengguna')

@section('content')
    <div class="min-h-screen bg-gray-50">
        <!-- Main Content -->
        <main class="p-6">
            <div class="max-w-4xl mx-auto">
                <!-- Header Section -->
                <div class="bg-white rounded-lg shadow-sm mb-6">
                    <div class="px-6 py-4 border-b">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('users.index') }}" class="text-gray-600 hover:text-gray-900">
                                    <i class="fas fa-arrow-left text-xl"></i>
                                </a>
                                <div>
                                    <h1 class="text-2xl font-bold text-gray-900">Edit Pengguna</h1>
                                    <p class="text-sm text-gray-600 mt-1">Perbarui informasi pengguna</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2 text-sm text-gray-500">
                                <i class="fas fa-clock"></i>
                                <span>Terakhir diupdate: {{ $users->updated_at ?? 'Belum pernah' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Edit Wisata -->
                <div class="bg-white rounded-lg shadow-sm">
                    <form action="{{ route('users.update', $users->id ?? 1) }}" method="POST" enctype="multipart/form-data" id="formEditWisata">
                        @csrf
                        @method('PUT')

                        <div class="p-6 space-y-6">

                            <!-- Informasi Dasar -->
                            <div class="border-b pb-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                                    <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                                    Informasi Dasar
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Nama Destinasi -->
                                    <div class="md:col-span-2">
                                        <label for="nama_destinasi" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-map-marker-alt text-blue-600 mr-1"></i>
                                            Nama <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="nama_destinasi" name="name" required
                                               value="{{ old('name', $users->name ?? 'Nama') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                               placeholder="Masukkan nama destinasi wisata">
                                        @error('nama_destinasi')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-location-dot text-blue-600 mr-1"></i>
                                            Lokasi <span class="text-red-500">*</span>
                                        </label>
                                        <input type="email" id="email" name="email" required
                                               value="{{ old('email', $users->email ?? 'Email') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                               placeholder="Masukkan Email">
                                        @error('email')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>



                                    <!-- Kategori -->
                                    <div>
                                        <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-tags text-blue-600 mr-1"></i>
                                            Role
                                        </label>
                                        <select id="kategori" name="role" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                            <option value="">Pilih Role</option>
                                            <option value="user" {{ old('role', $users->role ?? "user") == "user" ? 'selected' : '' }}>Users</option>
                                            <option value="admin" {{ old('role', $users->role ?? 'admin') == "admin" ? 'selected' : '' }}>Admin</option>
                                            {{-- <option value="3" {{ old('kategori_id', $wisata->kategori_id ?? '') == 3 ? 'selected' : '' }}>Air Terjun</option>
                                            <option value="4" {{ old('kategori_id', $wisata->kategori_id ?? '') == 4 ? 'selected' : '' }}>Pulau</option>
                                            <option value="5" {{ old('kategori_id', $wisata->kategori_id ?? '') == 5 ? 'selected' : '' }}>Budaya</option>
                                            <option value="6" {{ old('kategori_id', $wisata->kategori_id ?? '') == 6 ? 'selected' : '' }}>Kuliner</option> --}}
                                        </select>
                                        @error('role')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Deskripsi -->
                                {{-- <div class="mt-6">
                                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-align-left text-blue-600 mr-1"></i>
                                        Deskripsi <span class="text-red-500">*</span>
                                    </label>
                                    <textarea id="deskripsi" name="description" rows="4" required
                                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                              placeholder="Deskripsikan destinasi wisata dengan detail...">{{ old('description', $destination->deskripsi ?? 'Pantai dengan pasir putih dan air jernih yang menawarkan pemandangan sunset yang indah') }}</textarea>
                                    @error('deskripsi')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div> --}}
                            </div>

                            <!-- Koordinat -->
                            <div class="border-b pb-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                                    <i class="fas fa-globe text-blue-600 mr-2"></i>
                                    Password
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                            Password <span class="text-red-500">*</span>
                                        </label>
                                        <input type="password" id="password" name="password" step="any"
                                               {{-- value="{{ old('password', $users->password ?? 'Password') }}" --}}
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                               placeholder="Password">
                                        @error('password')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                            Konfirmasi password <span class="text-red-500">*</span>
                                        </label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" step="any"
                                               {{-- value="{{ old('password_confirmation', $users->password_confirmation ?? 'Password Confirmation') }}" --}}
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                               placeholder="Konfirmasi Password">
                                        @error('password_confirmation')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Preview Map (Optional) -->
                                {{-- <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-map text-blue-600 mr-2"></i>
                                        <span>Koordinat akan ditampilkan di peta: </span>
                                        <span id="koordinatPreview" class="font-mono ml-2">{{ $destination->latitude ?? '-3.9778' }}, {{ $wisata->longitude ?? '122.5194' }}</span>
                                    </div>
                                </div> --}}
                            </div>

                            <!-- Gambar -->
                            {{-- <div class="border-b pb-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                                    <i class="fas fa-camera text-blue-600 mr-2"></i>
                                    Gambar Destinasi
                                </h3>

                                <!-- Gambar Saat Ini -->
                                @if(isset($destination->image) && $destination->image)
                                    {{-- <img src="{{ asset($destination->image) }}" alt="Gambar saat ini"> -

                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
                                        <div class="relative inline-block">
                                            <img src="{{ asset($destination->image) }}" alt="Gambar saat ini"
                                                class="w-32 h-32 object-cover rounded-lg border border-gray-300">
                                            <div class="absolute inset-0 bg-black/0 bg-opacity-0 hover:bg-opacity-20 transition-all duration-200 rounded-lg flex items-center justify-center">
                                                <i class="fas fa-eye text-white opacity-0 hover:opacity-100 transition-opacity duration-200"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Upload Gambar Baru -->
                                <div>
                                    <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">
                                        {{ isset($destination->image) && $destination->image ? 'Ganti Gambar (Opsional)' : 'Upload Gambar' }}
                                    </label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-blue-400 transition-colors duration-200">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="gambar" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                    <span>Upload gambar</span>
                                                    <input id="gambar" name="image" type="file" accept="image/*" class="sr-only">
                                                </label>
                                                <p class="pl-1">atau drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 10MB</p>
                                        </div>
                                    </div>
                                    <!-- Preview gambar baru -->
                                    <div id="previewContainer" class="mt-4 hidden">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Preview Gambar Baru</label>
                                        <img id="previewImage" class="w-32 h-32 object-cover rounded-lg border border-gray-300">
                                    </div>
                                    @error('image')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div> --}}

                            <!-- Fasilitas -->
                            {{-- <div class="border-b pb-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                                    <i class="fas fa-concierge-bell text-blue-600 mr-2"></i>
                                    Fasilitas yang Tersedia
                                </h3>

                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                    @php
                                        $fasilitasSekarang = old('fasilitas', $wisata->fasilitas ?? ['parking', 'toilet']);
                                        if(is_string($fasilitasSekarang)) {
                                            $fasilitasSekarang = json_decode($fasilitasSekarang, true) ?? [];
                                        }
                                    @endphp

                                    <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200">
                                        <input type="checkbox" name="fasilitas[]" value="parking"
                                               {{ in_array('parking', $fasilitasSekarang) ? 'checked' : '' }}
                                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <i class="fas fa-car ml-3 mr-2 text-gray-600"></i>
                                        <span class="text-sm text-gray-700">Parkir</span>
                                    </label>
                                    <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200">
                                        <input type="checkbox" name="fasilitas[]" value="toilet"
                                               {{ in_array('toilet', $fasilitasSekarang) ? 'checked' : '' }}
                                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <i class="fas fa-restroom ml-3 mr-2 text-gray-600"></i>
                                        <span class="text-sm text-gray-700">Toilet</span>
                                    </label>
                                    <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200">
                                        <input type="checkbox" name="fasilitas[]" value="restaurant"
                                               {{ in_array('restaurant', $fasilitasSekarang) ? 'checked' : '' }}
                                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <i class="fas fa-utensils ml-3 mr-2 text-gray-600"></i>
                                        <span class="text-sm text-gray-700">Restoran</span>
                                    </label>
                                    <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200">
                                        <input type="checkbox" name="fasilitas[]" value="guide"
                                               {{ in_array('guide', $fasilitasSekarang) ? 'checked' : '' }}
                                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <i class="fas fa-user-tie ml-3 mr-2 text-gray-600"></i>
                                        <span class="text-sm text-gray-700">Pemandu</span>
                                    </label>
                                    <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200">
                                        <input type="checkbox" name="fasilitas[]" value="wifi"
                                               {{ in_array('wifi', $fasilitasSekarang) ? 'checked' : '' }}
                                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <i class="fas fa-wifi ml-3 mr-2 text-gray-600"></i>
                                        <span class="text-sm text-gray-700">WiFi</span>
                                    </label>
                                    <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200">
                                        <input type="checkbox" name="fasilitas[]" value="souvenir"
                                               {{ in_array('souvenir', $fasilitasSekarang) ? 'checked' : '' }}
                                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <i class="fas fa-gift ml-3 mr-2 text-gray-600"></i>
                                        <span class="text-sm text-gray-700">Toko Souvenir</span>
                                    </label>
                                </div>
                            </div> --}}

                            <!-- Jam Operasional & Harga -->
                            {{-- <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                                    <i class="fas fa-business-time text-blue-600 mr-2"></i>
                                    Jam Operasional & Harga
                                </h3>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label for="jam_buka" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-clock text-blue-600 mr-1"></i>
                                            Jam Buka
                                        </label>
                                        <input type="time" id="jam_buka" name="jam_buka"
                                               value="{{ old('jam_buka', $wisata->jam_buka ?? '08:00') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                    </div>
                                    <div>
                                        <label for="jam_tutup" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-clock text-blue-600 mr-1"></i>
                                            Jam Tutup
                                        </label>
                                        <input type="time" id="jam_tutup" name="jam_tutup"
                                               value="{{ old('jam_tutup', $wisata->jam_tutup ?? '18:00') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
                                    </div>
                                    <div>
                                        <label for="harga_tiket" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-ticket-alt text-blue-600 mr-1"></i>
                                            Harga Tiket (Rp)
                                        </label>
                                        <input type="number" id="harga_tiket" name="harga_tiket" min="0"
                                               value="{{ old('harga_tiket', $wisata->harga_tiket ?? '0') }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                               placeholder="Masukkan harga tiket (0 jika gratis)">
                                    </div>
                                </div>
                            </div> --}}

                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between p-6 bg-gray-50 border-t">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-info-circle mr-2"></i>
                                Field bertanda <span class="text-red-500">*</span> wajib diisi
                            </div>
                            <div class="flex items-center space-x-4">
                                <a href="{{ route('users.index') }}" class="px-6 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                                    <i class="fas fa-times mr-1"></i>
                                    Batal
                                </a>
                                <button type="submit" class="px-6 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                                    <i class="fas fa-save mr-1"></i>
                                    Update Pengguna
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('formEditWisata');
            const latInput = document.getElementById('latitude');
            const lngInput = document.getElementById('longitude');
            const koordinatPreview = document.getElementById('koordinatPreview');
            const gambarInput = document.getElementById('gambar');
            const previewContainer = document.getElementById('previewContainer');
            const previewImage = document.getElementById('previewImage');

            // Update koordinat preview
            function updateKoordinatPreview() {
                const lat = latInput.value || '0';
                const lng = lngInput.value || '0';
                koordinatPreview.textContent = `${lat}, ${lng}`;
            }

            latInput.addEventListener('input', updateKoordinatPreview);
            lngInput.addEventListener('input', updateKoordinatPreview);

            // Preview gambar yang diupload
            gambarInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewContainer.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewContainer.classList.add('hidden');
                }
            });

            // Validasi form sebelum submit
            form.addEventListener('submit', function(e) {
                const requiredFields = ['nama_destinasi', 'lokasi', 'deskripsi', 'latitude', 'longitude'];
                let isValid = true;
                let firstInvalidField = null;

                requiredFields.forEach(function(fieldName) {
                    const field = document.getElementById(fieldName);
                    if (!field.value.trim()) {
                        field.classList.add('border-red-500', 'focus:border-red-500');
                        field.classList.remove('border-gray-300');
                        isValid = false;
                        if (!firstInvalidField) {
                            firstInvalidField = field;
                        }
                    } else {
                        field.classList.remove('border-red-500', 'focus:border-red-500');
                        field.classList.add('border-gray-300');
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    alert('Mohon lengkapi semua field yang wajib diisi!');
                    if (firstInvalidField) {
                        firstInvalidField.focus();
                        firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });

            // Auto-resize textarea
            const textarea = document.getElementById('deskripsi');
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });

            // Konfirmasi sebelum meninggalkan halaman jika ada perubahan
            let originalData = new FormData(form);
            window.addEventListener('beforeunload', function(e) {
                let currentData = new FormData(form);
                let hasChanges = false;

                for (let [key, value] of currentData.entries()) {
                    if (originalData.get(key) !== value) {
                        hasChanges = true;
                        break;
                    }
                }

                if (hasChanges) {
                    e.preventDefault();
                    e.returnValue = '';
                }
            });
        });
    </script>
@endsection
