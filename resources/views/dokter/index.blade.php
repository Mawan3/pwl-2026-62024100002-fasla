@extends('layouts.app')
@section('title', 'Data Dokter')
@section('content')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('dokter.create') }}" class="btn btn-primary mb-3">Tambah Dokter</a>

<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- Header Kartu -->
            <div class="card-header">
                <h3 class="card-title">Daftar Dokter Klinik</h3>
            </div>
            
            <!-- Isi Kartu (Tabel) -->
            <div class="card-body table-responsive p-0">
                <!-- Tambahkan class Bootstrap pada tabel -->
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Dokter</th>
                            <th>Nama</th>
                            <th>Spesialisasi</th>
                            <th>Poli</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($doctors as $doctor)
                        <tr>
                            <!-- 1. Nomor Urut -->
                            <td>{{ $loop->iteration }}</td>
                            
                            <!-- 2. Kode Dokter -->
                            <td>{{ $doctor->doctor_code }}</td>
                            
                            <!-- 3. Nama -->
                            <td>{{ $doctor->name }}</td>
                            
                            <!-- 4. Spesialisasi -->
                            <td>{{ $doctor->specialization }}</td>

                            <!-- 5. POSISI YANG BENAR UNTUK KOLOM POLI -->
                            <td>{{ $doctor->poli?->name ?? 'Belum ada Poli' }}</td>

                            <!-- 6. Status -->
                            <td class="align-middle">
                                @if($doctor->is_active)
                                    <span class="badge bg-success">Aktif Melayani</span>
                                @else
                                    <span class="badge bg-danger">Sedang Cuti</span>
                                @endif
                            </td>

                            <!-- 7. Aksi -->
                            <td class="align-middle">
                                <a href="{{ route('dokter.edit', $doctor->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                
                                <form action="{{ route('dokter.destroy', $doctor->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data Dokter ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr><td colspan="7" class="text-center">Belum ada data Dokter.</td></tr>
                        @endforelse
                    </tbody>
                    <table class="table table-hover text-nowrap"></table>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection