<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Poli;

class PoliSeeder extends Seeder
{
    public function run()
    {
        Poli::insert([
            ['code' => 'POL-001', 'name' => 'Poli Umum', 'description' => 'Melayani pemeriksaan kesehatan umum', 'is_active' => true],
            ['code' => 'POL-002', 'name' => 'Poli Gigi', 'description' => 'Pemeriksaan dan perawatan gigi', 'is_active' => true],
            ['code' => 'POL-003', 'name' => 'Poli KIA', 'description' => 'Kesehatan Ibu dan Anak', 'is_active' => true],
            ['code' => 'POL-004', 'name' => 'Poli THT', 'description' => 'Telinga, Hidung, dan Tenggorokan', 'is_active' => true],
            ['code' => 'POL-005', 'name' => 'Poli Penyakit Dalam', 'description' => 'Khusus konsultasi penyakit dalam', 'is_active' => false],
        ]);
    }
}