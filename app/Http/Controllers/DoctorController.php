<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = [
            ['nama' => 'dr. Budi', 'spesialisasi' => 'Umum', 'status' => 'aktif'],
            ['nama' => 'dr. Ratna', 'spesialisasi' => 'Gigi', 'status' => 'cuti'],
            ['nama' => 'dr. Anton', 'spesialisasi' => 'Anak', 'status' => 'aktif'],
            ['nama' => 'dr. Maya', 'spesialisasi' => 'Kandungan', 'status' => 'aktif'],
            ['nama' => 'dr. Surya', 'spesialisasi' => 'Penyakit Dalam', 'status' => 'cuti'],
        ];

        return view('dokter.index', compact('doctors'));
    }
}
