<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients'); // Relasi ke pasien
            $table->foreignId('doctor_id')->constrained('doctors');   // Relasi ke dokter
            $table->date('registration_date');
            $table->string('complaint')->nullable();
            $table->string('status')->default('waiting');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrations');
    }
};