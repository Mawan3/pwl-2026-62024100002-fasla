<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'doctor_code',
        'name',
        'specialization',
        'phone',
        'is_active',
        'poli_id',
    ];


    // Tambahkan method relasi ini
    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}