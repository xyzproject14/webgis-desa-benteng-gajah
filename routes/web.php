<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemerintahController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\Visit_Controller;
use App\Http\Controllers\SuperAdminController;
use App\Http\Middleware\adminMiddleware;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



// Route::get('/welcome', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });

Route::get('/', [BerandaController::class, 'index'])->name('home');

// === NAVIGATION BAR ===
Route::get('/pemerintah', [PemerintahController::class, 'index']);
Route::get('/pemerintahdata', [PemerintahController::class, 'data_umum'])->name('data pemerintah');

Route::get('kepdes', [PemerintahController::class, 'testing']);

Route::get('/visit', function () {
    return view('skripsi.visit', ['title' => 'Visit Benteng Gajah']);
});
Route::get('visit_data', [Visit_Controller::class, 'visit_data']);
Route::get('quick-search/{value}', [Visit_Controller::class, 'quickSearch']);
Route::get('hasil-pencarian', [Visit_Controller::class, 'hasil_pencarian']);

Route::get('/pemetaan', [PotensiController::class, 'index']);
Route::get('/data-potensi', [PotensiController::class, 'data_potensi'])->name('data-potensi');

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/berita', [BeritaController::class, 'index']);

Route::get('/testing', function () {
    return view('sementara.testing', ['title' => 'Potensi Desa']);
});
Route::get('/testing/sebaran-kabupaten', [TestingController::class, 'sebaranKabupaten'])->name('sebaran-kabupaten');
Route::get('/testing2', [TestingController::class, 'testing2']);
// ===== NAVIGATION BAR =====

// ===== HALAMAN LOGIN =====
Route::post('/login', [LoginController::class, 'authenticate']);
// ===== HALAMAN LOGIN =====


// ===== ADMIN AREA =====
Route::middleware('adminMiddleware')->group(function () {
    // Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('kelola-home');
    Route::post('/update-beranda', [AdminController::class, 'update_beranda'])->name('update-beranda');
    // Route::get('/testing2', [TestingController::class, 'testing2']);

    // pemerintah admin
    Route::get('/kelola-pemerintah', [AdminController::class, 'kelola_pemerintah'])->name('kelola-pemerintah');
    Route::post('/update-pemerintah', [AdminController::class, 'update_pemerintah'])->name('update-pemerintah');

    // visit admin
    Route::get('/kelola-visit', [AdminController::class, 'kelola_visit'])->name('kelola-visit');
    Route::post('/tambahkan-data-visit', [AdminController::class, 'tambahkanDataVisit'])->name('tambahkan-data-visit-baru');
    Route::get('getDataUpdate/{id}', [AdminController::class, 'getDataUpdate']);
    Route::post('/update', [AdminController::class, 'update'])->name('update-data-visit');
    Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('delete-data-visit');

    // potensi admin
    Route::get('/kelola-potensi', [AdminController::class, 'kelola_potensi'])->name('kelola-potensi');
    Route::post('/tambahkan-data-potensi', [AdminController::class, 'tambahkanDataPotensi'])->name('tambahkan-data-potensi-baru');
    Route::get('get-data-potensi/{params}', [AdminController::class, 'getDataPotensi']);
    Route::post('update-potensi', [AdminController::class, 'updatePotensi'])->name('update-data-potensi');

    // berita admin
    Route::get('/kelola-berita', [AdminController::class, 'kelola_berita'])->name('kelola-berita');
    Route::post('/simpan-berita', [AdminController::class, 'simpan_berita'])->name('simpan-berita');


    // contact admin
    Route::get('/kelola-contact', [AdminController::class, 'kelola_contact'])->name('kelola-contact');
    Route::post('/tambahkan-data-contact', [AdminController::class, 'tambahkanDataContact'])->name('tambahkan-data-contact-baru');
    Route::get('get-data-contact/{id}', [AdminController::class, 'getDataContact']);

    // berita desa

    // log out
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::middleware('superAdminMiddleware')->group(function () {
    Route::get('/kelola-admin', [SuperAdminController::class, 'index'])->name('kelola-admin');
    Route::post('/tambahkan-admin', [SuperAdminController::class, 'create_admin'])->name('tambahkan-admin');
    Route::get('get-data-admin/{id}', [SuperAdminController::class, 'getAdminData']);
    Route::delete('delete-admin/{id}', [SuperAdminController::class, 'delete'])->name('delete-data-admin');
    Route::post('/update-admin', [SuperAdminController::class, 'update'])->name('update-data-admin');
    // Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    //     Route::get('/testing2', [TestingController::class, 'testing2']);
    //     Route::get('/logout', [LoginController::class, 'logout']);
});






// ===== ADMIN AREA =====



// ===== HALAMAN VISIT =====

// ===== HALAMAN VISIT =====


// ===== TESTING AREA =====
Route::post('/upload', [TestingController::class, 'upload'])->name('upload-file');
Route::get('panggil', [TestingController::class, 'panggil']);
Route::get('potensi', function () {
    return view('skripsi/potensi', ['title' => 'pemetaan']);
});
Route::get('app', function(){
    return view('app');
});
Route::get('berita-kita', [BeritaController::class, 'berita']);
// ===== TESTING AREA =====