<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor; // <-- 1. PASTIKAN YANG DI-IMPORT ADALAH MODEL DOCTOR

class DoctorController extends Controller
{
    public function index()
    {
        // 2. PASTIKAN MENGAMBIL DATA MENGGUNAKAN Doctor::all()
        $doctors = Doctor::all(); 
        
        return view('dokter.index', compact('doctors'));
    }
}