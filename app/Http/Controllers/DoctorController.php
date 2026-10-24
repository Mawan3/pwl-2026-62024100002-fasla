<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Poli; // <-- Tambahkan ini
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    public function index()
    {
        // Menggunakan Eager Loading (with('poli')) untuk menghindari masalah N+1[cite: 39, 40]
        $doctors = Doctor::with('poli')->get();
        return view('dokter.index', compact('doctors'));
    }

    public function create()
    {
        // Mengambil semua poli aktif untuk dropdown
        $polis = Poli::where('is_active', true)->orderBy('name')->get();
        return view('dokter.create', compact('polis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_code' => 'required|unique:doctors,doctor_code',
            'name' => 'required|max:255',
            'specialization' => 'required|string',
            'phone' => 'nullable|max:20',
            'is_active' => 'required|boolean',
            'poli_id' => 'required|exists:polis,id', // <-- Validasi exists[cite: 43]
        ]);

        Doctor::create($validated);
        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function edit(Doctor $dokter)
    {
        // Mengambil semua poli aktif untuk dropdown
        $polis = Poli::where('is_active', true)->orderBy('name')->get();
        return view('dokter.edit', compact('dokter', 'polis'));
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
            'poli_id' => 'required|exists:polis,id', // <-- Validasi exists[cite: 43]
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