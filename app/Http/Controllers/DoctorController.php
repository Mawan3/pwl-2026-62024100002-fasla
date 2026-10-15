<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor; // <-- 1. PASTIKAN YANG DI-IMPORT ADALAH MODEL DOCTOR
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    public function index()
    {
        // 2. PASTIKAN MENGAMBIL DATA MENGGUNAKAN Doctor::all()
        $doctors = Doctor::all(); 
        return view('dokter.index', compact('doctors'));
    }
    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_code' => 'required|unique:doctors,doctor_code',
            'name' => 'required|max:255',
            'specialization' => 'required|string',
            'phone' => 'nullable|max:20',
            'is_active' => 'required|boolean', // 1 untuk Aktif, 0 untuk Cuti
        ]);

        Doctor::create($validated);
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function edit(Doctor $dokter)
    {
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Doctor $dokter)
    {
        $validated = $request->validate([
            'doctor_code' => [
                'required',
                Rule::unique('doctors', 'doctor_code')->ignore($dokter->id),
            ],
            'name' => 'required|max:255',
            'specialization' => 'required|string',
            'phone' => 'nullable|max:20',
            'is_active' => 'required|boolean',
        ]);

        $dokter->update($validated);
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy(Doctor $dokter)
    {
        $dokter->delete();
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus.');
    }
}
