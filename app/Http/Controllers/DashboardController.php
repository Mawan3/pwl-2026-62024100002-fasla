<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Poli;
use App\Models\Registration;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil total data riil dari database
        $jumlahPasien = Patient::count();
        $jumlahDokter = Doctor::count();
        $jumlahPoli   = Poli::count();
        $jumlahPendaftaran = Registration::count();

        // Mengambil 5 pendaftaran pasien terbaru untuk ditampilkan di dashboard
        $pendaftaranTerbaru = Registration::with(['patient', 'doctor'])
            ->latest('registration_date')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'jumlahPasien', 
            'jumlahDokter', 
            'jumlahPoli', 
            'jumlahPendaftaran',
            'pendaftaranTerbaru'
        ));
    }
}