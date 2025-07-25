<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\RecommendationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\UsersController;

// Route::get('/', function () {
//     return view('');
// });
// Route::get('admin/dashboard', function () {
//     return view('pages.dashboard');
// });
Route::get('admin/destinasi', function () {
    return view('pages.destinasiAdmins');
});
Route::get('admin/pengguna', function () {
    return view('pages.penggunasAdmins');
});

Route::get('/', [HomeUserController::class, 'home'] );
Route::get('admin/dashboard', [HomeAdminController::class, 'home'] )->middleware('auth');
Route::get('/ratingsss', [HomeAdminController::class, 'ratings'] )->middleware('auth');
Route::get('/destinasi', [HomeUserController::class, 'destinasi'] )->name('destinasi')->middleware('auth');
Route::get('/tentang', [HomeUserController::class, 'tentang'] )->name('tentang');
Route::get('/deskripsi-destinasi/{destId}', [HomeUserController::class, 'deskripsiDestinasi'] )->name('deskripsiDestinasi');
// Route::get('/destinasi', [HomeUserController::class, 'destinasi'] )->name('destinasi');
// Route::get('/destinasi', [HomeUserController::class, 'destinasi'] )->name('destinasi');
Route::get('/rekomedasi', [HomeUserController::class, 'rekomendasiDestinasi'] )->name('rekomedasi');


Route::get('/rekomendasi', [RecommendationController::class, 'getRecommendations']);
Route::get('/login', [AuthController::class, 'viewLogin'])->name('logins');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/login', [AuthController::class, 'viewLogin'])->name('logins');
Route::get('/register', [AuthController::class, 'viewRegister'] )->name('register');
Route::post('/register', [AuthController::class, 'register'] )->name('register');
// Route::get('/rekomedasi', [AuthController::class, 'register'] )->name('register');

Route::post('/destinations/{destination}/rate', [RatingsController::class, 'store'])->name('ratings.store');
// Route::prefix('admin')->name('admin.')->middleware('auth', 'admin')->group(function () {
    Route::resource('destinations', DestinasiController::class)->middleware('auth', 'admin');
    Route::resource('users', UsersController::class)->middleware('auth', 'admin');
// });



