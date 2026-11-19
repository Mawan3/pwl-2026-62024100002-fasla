<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

// Route untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

// Route terproteksi (wajib login)
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('pendaftaran', RegistrationController::class);
    Route::resource('pasien', PatientController::class);
    Route::resource('dokter', DoctorController::class);
    Route::resource('poli', PoliController::class);

    Route::get('/jadwal', [ScheduleController::class, 'index'])->name('jadwal.index');
    Route::get('/jadwal/{hari}', [ScheduleController::class, 'show'])->name('jadwal.show');

    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});