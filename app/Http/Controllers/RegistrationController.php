<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Doctor;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        // 1 & 11. Memulai query dengan Eager Loading relasi 'patient' dan 'doctor'
        $query = Registration::with(['patient', 'doctor']);

        // 2. Search berdasarkan nama pasien (mencari ke tabel relasi)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('patient', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        // 3. Filter berdasarkan Dokter
        if ($request->filled('doctor_id')) {
            $query->where('doctor_id', $request->doctor_id);
        }

        // 4. Filter berdasarkan Status pendaftaran
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 5. Filter berdasarkan Tanggal Pendaftaran
        if ($request->filled('registration_date')) {
            $query->whereDate('registration_date', $request->registration_date);
        }

        // 6. Sorting berdasarkan tanggal (Terbaru/Terlama)
        $direction = $request->direction === 'asc' ? 'asc' : 'desc'; // Default Terbaru (desc)
        $query->orderBy('registration_date', $direction);

        // 7 & 8. Pagination 10 data per halaman dan pertahankan query string
        $registrations = $query->paginate(10)->withQueryString();

        // Ambil data dokter aktif untuk dropdown filter
        $doctors = Doctor::where('is_active', true)->orderBy('name')->get();

        return view('pendaftaran.index', compact('registrations', 'doctors'));
    }
}