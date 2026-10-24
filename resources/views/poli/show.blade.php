@extends('layouts.app')
@section('title', 'Detail Poli')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Informasi Poli: {{ $poli->name }}</h3>
    </div>
    <div class="card-body">
        <p><strong>Kode Poli:</strong> {{ $poli->code }}</p>
        <p><strong>Deskripsi:</strong> {{ $poli->description ?? '-' }}</p>
        <p><strong>Status:</strong> 
            @if($poli->is_active)
                <span class="badge bg-success">Aktif</span>
            @else
                <span class="badge bg-danger">Tidak Aktif</span>
            @endif
        </p>

        <h5 class="mt-4">Daftar Dokter di Poli Ini</h5>
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Dokter</th>
                    <th>Nama Dokter</th>
                    <th>Spesialisasi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Melakukan perulangan untuk data dokter yang berelasi dengan poli ini -->
                @forelse ($poli->doctors as $doctor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $doctor->doctor_code }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->specialization }}</td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center">Belum ada dokter yang terdaftar di poli ini.</td></tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('poli.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection