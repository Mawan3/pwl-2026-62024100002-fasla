<?php
namespace Database\Seeders;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        Patient::create([
            'medical_record_number' => 'RM0001',
            'name' => 'Luxy',
            'gender' => 'L',
            'birth_date' => '2000-05-10',
            'address' => 'Kudus',
            'phone' => '081234567890',
        ]);
        Patient::create([
            'medical_record_number' => 'RM0002',
            'name' => 'Jacob',
            'gender' => 'L',
            'birth_date' => '2001-08-15',
            'address' => 'Jepara',
            'phone' => '081234567891',
        ]);
        Patient::create([
            'medical_record_number' => 'RM0003',
            'name' => 'Alexander',
            'gender' => 'P',
            'birth_date' => '1945-05-15',
            'address' => 'Nganjuk',
            'phone' => '0812345435891',
        ]);
        Patient::create([
            'medical_record_number' => 'RM0004',
            'name' => 'Peter',
            'gender' => 'L',
            'birth_date' => '2001-08-15',
            'address' => 'Kudus',
            'phone' => '0812394067891',
        ]);
        Patient::create([
            'medical_record_number' => 'RM0005',
            'name' => 'Billy',
            'gender' => 'P',
            'birth_date' => '2006-04-17',
            'address' => 'Pati',
            'phone' => '0899994567891',
        ]);
    }
}
