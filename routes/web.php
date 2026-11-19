<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route Tamu (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

// Route Terautentikasi
Route::middleware('auth')->group(function () {
    // Semua role yang login boleh buka Dashboard
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    // Khusus Admin: Manajemen User & Data Master Dokter/Poli
    Route::middleware('role:admin')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::resource('dokter', DoctorController::class);
        Route::resource('poli', PoliController::class);
    });

    // Admin & Petugas Pendaftaran: Pasien & Pendaftaran
    Route::middleware('role:admin,registration')->group(function () {
        Route::resource('pasien', PatientController::class);
        Route::resource('pendaftaran', RegistrationController::class);
    });

    // Admin & Dokter: Jadwal / Pemeriksaan
    Route::middleware('role:admin,doctor')->group(function () {
        Route::get('/jadwal', [ScheduleController::class, 'index'])->name('jadwal.index');
        Route::get('/jadwal/{hari}', [ScheduleController::class, 'show'])->name('jadwal.show');
    });
});