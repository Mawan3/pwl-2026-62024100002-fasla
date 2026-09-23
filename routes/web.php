<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/pasien', [PatientController::class, 'index']);
Route::get('/pasien/{id}', [PatientController::class, 'show']);

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PoliController;

Route::get('/dokter', [DoctorController::class, 'index'])->name('dokter.index');
Route::get('/poli', [PoliController::class, 'index'])->name('poli.index');



Route::get('/jadwal', [ScheduleController::class, 'index'])->name('jadwal.index');
Route::get('/jadwal/{hari}', [ScheduleController::class, 'show']);