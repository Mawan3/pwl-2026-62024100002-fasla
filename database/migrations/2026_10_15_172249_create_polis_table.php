<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('polis', function (Blueprint $table) {
        $table->id();
        $table->string('code')->unique(); // Kode unik Poli[cite: 12]
        $table->string('name'); // Nama Poli[cite: 12]
        $table->text('description')->nullable(); // Deskripsi boleh kosong[cite: 12]
        $table->boolean('is_active')->default(true); // Status aktif[cite: 12]
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polis');
    }
};
