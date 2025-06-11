<?php

namespace Database\Seeders;

use App\Models\Destinasi;
use App\Models\Ratings;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(6)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => '123',
            'role' => 'user',
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'test@gmail.com',
            'password' => '123',
            'role' => 'user',
        ]);
        User::factory()->create([
            'name' => 'Admins',
            'email' => 'admin@gmail.com',
            'password' => '123',
            'role' => 'admin',
        ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Destinasi::insert([
        //     [
        //         'name' => 'Pantai Nambo',
        //         'description' => 'Pantai yang indah di Kendari.',
        //         'latitude' => -3.9912345,
        //         'longitude' => 122.5123456,
        //         'region' => 'Kendari',
        //         'image' => 'nambo.jpg',
        //     ],
        //     [
        //         'name' => 'Wakatobi',
        //         'description' => 'Taman laut terkenal di dunia.',
        //         'latitude' => -5.319999,
        //         'longitude' => 123.583333,
        //         'region' => 'Wakatobi',
        //         'image' => 'wakatobi.jpg',
        //     ],
        // ]);
        // Destinasi::factory(19)->create();

        // Ratings::insert([
        //     ['user_id' => 1, 'destinasis_id' => 1, 'rating' => 5],
        //     ['user_id' => 1, 'destinasis_id' => 2, 'rating' => 4],
        //     ['user_id' => 2, 'destinasis_id' => 1, 'rating' => 4],
        //     ['user_id' => 2, 'destinasis_id' => 2, 'rating' => 5],
        // ]);



        $this->call([
            // RatingSeeders::class,
        ]);
        // $users = User::all();
        // $destinations = Destinasi::all();

        // Pastikan ada data user dan destinasi terlebih dahulu
        // if ($users->count() === 0 || $destinations->count() === 0) {
        //     $this->command->warn('Isi dulu tabel users dan destinations.');
        //     return;
        // }

        // foreach ($users as $user) {
        //     // Tiap user memberi rating ke 5-8 destinasi secara acak
        //     $ratedDestinations = $destinations->random(rand(5, 8));

        //     foreach ($ratedDestinations as $destination) {
        //         Ratings::create([
        //             'user_id' => $user->id,
        //             'destinasi_id' => $destination->id,
        //             'rating' => rand(3, 5), // Rating antara 3–5 agar tidak terlalu negatif
        //         ]);
        //     }
        // }

    }
}
