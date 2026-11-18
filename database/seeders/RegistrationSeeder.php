<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registration;
use App\Models\Patient;
use App\Models\Doctor;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil beberapa data pasien dan dokter yang tersedia di database
        $patients = Patient::limit(3)->get();
        $doctors  = Doctor::limit(3)->get();

        if ($patients->count() >= 2 && $doctors->count() >= 2) {
            $data = [
                [
                    'patient_id'        => $patients[0]->id,
                    'doctor_id'         => $doctors[0]->id,
                    'registration_date' => '2026-10-25',
                    'complaint'         => 'Demam tinggi dan flu berat',
                    'status'            => 'completed',
                ],
                [
                    'patient_id'        => $patients[1]->id,
                    'doctor_id'         => $doctors[1]->id ?? $doctors[0]->id,
                    'registration_date' => '2026-10-26',
                    'complaint'         => 'Pemeriksaan rutin gigi',
                    'status'            => 'completed',
                ],
                [
                    'patient_id'        => $patients[2]->id ?? $patients[0]->id,
                    'doctor_id'         => $doctors[0]->id,
                    'registration_date' => '2026-10-27',
                    'complaint'         => 'Sakit kepala berulang dan pusing',
                    'status'            => 'waiting',
                ],
                [
                    'patient_id'        => $patients[0]->id,
                    'doctor_id'         => $doctors[1]->id ?? $doctors[0]->id,
                    'registration_date' => '2026-10-27',
                    'complaint'         => 'Nyeri pada persendian kaki',
                    'status'            => 'waiting',
                ],
            ];

            foreach ($data as $item) {
                Registration::create($item);
            }
        }
    }
}