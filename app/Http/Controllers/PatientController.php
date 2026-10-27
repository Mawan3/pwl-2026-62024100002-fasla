<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        // 1. Memulai query builder bertahap
        $query = Patient::query();

        // 2. Search berdasarkan nama atau Nomor RM
        if ($request->filled('search')) {
            $search = $request->search;
            // Gunakan closure agar kondisi OR dikelompokkan dengan benar
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('medical_record_number', 'like', "%{$search}%");
            });
        }

        // 3. Filter berdasarkan Jenis Kelamin
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // 4. Sorting data dengan Whitelist (untuk keamanan)
        $allowedSorts = ['name', 'created_at'];
        $sort = in_array($request->sort, $allowedSorts) ? $request->sort : 'name';
        
        $direction = $request->direction === 'desc' ? 'desc' : 'asc';

        // 5. Pagination & mempertahankan Query String di URL
        $patients = $query->orderBy($sort, $direction)
                          ->paginate(10)
                          ->withQueryString();

        return view('pasien.index', compact('patients'));
    }

    public function show($id)
    {
        return 'Menampilkan pasien dengan ID: ' . $id;
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        // Validasi data input dari form[cite: 47, 48]
        $validated = $request->validate([
            'medical_record_number' => 'required|unique:patients,medical_record_number',
            'name' => 'required|max:255',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'address' => 'nullable|string',
            'phone' => 'nullable|max:20',
        ]);

        // Simpan data dan redirect dengan flash message[cite: 48]
        Patient::create($validated);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }
    public function edit(Patient $pasien)
    {
        // Melakukan Route Model Binding[cite: 51]
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Patient $pasien)
    {
        $validated = $request->validate([
            'medical_record_number' => [
                'required',
                Rule::unique('patients', 'medical_record_number')->ignore($pasien->id),
            ],
            'name' => 'required|max:255',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'address' => 'nullable|string',
            'phone' => 'nullable|max:20',
        ]);

        $pasien->update($validated);

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Patient $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }

}
