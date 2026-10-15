@extends('layouts.app')
@section('title', 'Data Pasien')
@section('content')

<!-- Menampilkan Flash Message[cite: 51] -->
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>

<div class="card">
    <div class="card-body p-0 table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>No. RM</th>
                    <th>Nama</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
           <tbody>
                @forelse ($patients as $patient)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $patient->medical_record_number }}</td>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->phone }}</td> <!-- TAMBAHKAN DATA INI -->
                    <td>
                        <a href="{{ route('pasien.edit', $patient->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                        <form action="{{ route('pasien.destroy', $patient->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data pasien ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center">Belum ada data pasien.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection