@extends('layouts.app')
@section('title', 'Data Pasien')
@section('content')

<!-- Menampilkan Flash Message[cite: 51] -->
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>

<!-- Form Pencarian dan Filter -->
<form method="GET" action="{{ route('pasien.index') }}" class="mb-3">
    <div class="row g-2">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Cari Nama / No. RM">
        </div>
        <div class="col-md-3">
            <select name="gender" class="form-control">
                <option value="">Semua Gender</option>
                <option value="L" @selected(request('gender') === 'L')>Laki-laki</option>
                <option value="P" @selected(request('gender') === 'P')>Perempuan</option>
            </select>
        </div>
        <div class="col-md-3">
            <select name="sort" class="form-control">
                <option value="name" @selected(request('sort') === 'name')>Urutkan Nama</option>
                <option value="created_at" @selected(request('sort') === 'created_at')>Urutkan Tanggal Input</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Terapkan</button>
        </div>
    </div>
    <div class="mt-2">
        <a href="{{ route('pasien.index') }}" class="btn btn-sm btn-secondary">Reset Filter</a>
    </div>
</form>

<!-- Informasi Hasil Pencarian -->
<p class="text-muted">Menampilkan {{ $patients->count() }} dari {{ $patients->total() }} data pasien.</p>

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
                   <td>{{ $patients->firstItem() + $loop->index }}</td>
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
                <div class="mt-3">
            {{ $patients->links() }}
        </div>
    </div>
</div>
@endsection