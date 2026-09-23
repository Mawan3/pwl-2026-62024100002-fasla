<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $judul = 'Jadwal Dokter';
        

    return view('jadwal.index', compact('judul'));
    }
    public function show($hari)
{
    return 'Jadwal Dokter Hari: ' . $hari;
}
}
