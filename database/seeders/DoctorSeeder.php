<?php
namespace Database\Seeders;
use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        Doctor::create([
            'doctor_code' => 'DOC001',
            'name' => 'Dr. Sely',
            'specialization' => 'Poli Gigi',
            'phone' => '08111222333',
            'is_active' => true,
        ]);
        Doctor::create([
            'doctor_code' => 'DOC002',
            'name' => 'Dr. Toni',
            'specialization' => 'Poli Umum',
            'phone' => '08444222333',
            'is_active' => true,
        ]);
        Doctor::create([
            'doctor_code' => 'DOC003',
            'name' => 'Dr. Putri',
            'specialization' => 'Poli THT',
            'phone' => '0884809433',
            'is_active' => true,
        ]);
        Doctor::create([
            'doctor_code' => 'DOC004',
            'name' => 'Dr. April',
            'specialization' => 'Poli Umum',
            'phone' => '0811376782333',
            'is_active' => true,
        ]);
        Doctor::create([
            'doctor_code' => 'DOC005',
            'name' => 'Dr. Andy',
            'specialization' => 'Poli Gigi',
            'phone' => '081112234345',
            'is_active' => true,
        ]);
        Doctor::create([
            'doctor_code' => 'DOC006',
            'name' => 'Dr. Gigi',
            'specialization' => 'Poli Penyakit Dalam',
            'phone' => '081112909933',
            'is_active' => true,
        ]);
        Doctor::create([
            'doctor_code' => 'DOC007',
            'name' => 'Dr. Fandy',
            'specialization' => 'Poli Umum',
            'phone' => '081116977333',
            'is_active' => true,
        ]);
        Doctor::create([
            'doctor_code' => 'DOC008',
            'name' => 'Dr. Ery',
            'specialization' => 'Poli Gigi',
            'phone' => '08111222333',
            'is_active' => true,
        ]);
    }
}
