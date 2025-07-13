<?php

namespace Database\Seeders;

use App\Models\Destinasi;
use App\Models\Ratings;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeders extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('ratings')->truncate();

        $users = User::all();
        $destinations = Destinasi::all();

        // Pastikan ada data user dan destinasi terlebih dahulu
        if ($users->count() === 0 || $destinations->count() === 0) {
            $this->command->warn('Isi dulu tabel users dan destinations.');
            return;
        }

        foreach ($users as $user) {
            // Tiap user memberi rating ke 5-8 destinasi secara acak
            $ratedDestinations = $destinations->random(rand(5, 8));

            foreach ($ratedDestinations as $destination) {
                Ratings::create([
                    'user_id' => $user->id,
                    'destinasi_id' => $destination->id,
                    'rating' => rand(3, 5), // Rating antara 3–5 agar tidak terlalu negatif
                    'comment' => "Wah Tempatnya Sangat Bagus Rekomendasi Bagus Banget Kalau Mau Liburan Ditemapat ini"
                ]);
            }
        }

    }
}
