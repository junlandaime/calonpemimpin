<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\DaerahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\AdminCalonController;
use App\Http\Controllers\AdminDaerahController;

// Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('tentang-kami');
Route::get('/kontak', [HomeController::class, 'contact'])->name('kontak');
Route::get('/infografis', [HomeController::class, 'infografis'])->name('infografis');
Route::get('/jadwal', [HomeController::class, 'jadwal'])->name('jadwal');
Route::get('/pelajari', [HomeController::class, 'pelajari'])->name('pelajari');

// Rute untuk Calon
Route::prefix('calon')->group(function () {
    Route::get('/', [CalonController::class, 'index'])->name('daftar-calon');
    Route::get('/search', [CalonController::class, 'search'])->name('search-calon');
    Route::get('/{id}/profil-singkat', [CalonController::class, 'profilSingkat'])->name('profil-singkat');
    Route::get('/{id}/profil-lengkap', [CalonController::class, 'profilLengkap'])->name('profil-lengkap');
    Route::post('/{id}/komentar', [KomentarController::class, 'store'])->name('add-komentar');
});

// Rute untuk Daerah
Route::prefix('daerah')->group(function () {
    Route::get('/', [DaerahController::class, 'index'])->name('daftar-daerah');
    Route::get('/{id}', [DaerahController::class, 'show'])->name('detail-daerah');
});



// Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/admin/calon', [AdminController::class, 'calonIndex'])->middleware(['auth', 'verified'])->name('calon.index');

Route::get('/candidate', [CandidateController::class, 'index'])->name('candidate.index');
Route::get('/candidate/{id}', [CandidateController::class, 'show'])->name('candidates.show');

Route::middleware('auth')->name('admin.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute untuk Admin Panel (jika diperlukan)
    Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        // Route::get('/calon', [AdminController::class, 'calonIndex'])->name('calon.index');
        // Route::resource('calon', AdminController::class);
        // Route::resource('daerah', AdminController::class);
        Route::resource('komentar', AdminController::class);
        Route::resource('user', AdminController::class);
        Route::resource('calon', AdminCalonController::class);
        Route::resource('daerah', AdminDaerahController::class);
        // Tambahkan rute admin lainnya di sini
    });
});

require __DIR__ . '/auth.php';
