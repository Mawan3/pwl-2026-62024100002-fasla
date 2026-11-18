<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Poli; // <-- Tambahkan ini
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    public function index(Request $request)
{
    // 1. Query bertahap dengan Eager Loading
    $query = Doctor::with('poli');

    // 2. Search berdasarkan nama atau kode dokter
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('doctor_code', 'like', "%{$search}%");
        });
    }

    // 3. Filter berdasarkan Poli
    if ($request->filled('poli_id')) {
        $query->where('poli_id', $request->poli_id);
    }

    // 4. Filter berdasarkan Status Aktif
    if ($request->filled('is_active')) {
        $query->where('is_active', $request->is_active);
    }

    // 5. Sorting berdasarkan Nama Dokter
    $direction = $request->direction === 'desc' ? 'desc' : 'asc';
    $query->orderBy('name', $direction);

    // 6. Pagination 10 data dengan Query String
    $doctors = $query->paginate(10)->withQueryString();

    // Data Poli untuk dropdown filter
    $polis = Poli::where('is_active', true)->orderBy('name')->get();

    return view('dokter.index', compact('doctors', 'polis'));
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