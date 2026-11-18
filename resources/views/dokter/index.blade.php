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
            
            <!-- Form Pencarian dan Filter Dokter -->
            <form method="GET" action="{{ route('dokter.index') }}" class="mb-3">
                <div class="row g-2">
                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Cari Nama / Kode Dokter">
                    </div>
                    <div class="col-md-3">
                        <select name="poli_id" class="form-control">
                            <option value="">Semua Poli</option>
                            @foreach ($polis as $poli)
                                <option value="{{ $poli->id }}" @selected(request('poli_id') == $poli->id)>{{ $poli->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="is_active" class="form-control">
                            <option value="">Semua Status</option>
                            <option value="1" @selected(request('is_active') === '1')>Aktif Melayani</option>
                            <option value="0" @selected(request('is_active') === '0')>Sedang Cuti</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="direction" class="form-control">
                            <option value="asc" @selected(request('direction') === 'asc')>Nama A-Z</option>
                            <option value="desc" @selected(request('direction') === 'desc')>Nama Z-A</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Terapkan</button>
                    </div>
                </div>
                <div class="mt-2">
                    <a href="{{ route('dokter.index') }}" class="btn btn-sm btn-secondary">Reset Filter</a>
                </div>
            </form>

            <p class="text-muted">Menampilkan {{ $doctors->count() }} dari {{ $doctors->total() }} data dokter.</p>

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
                            <td>{{ $doctors->firstItem() + $loop->index }}</td>
                            
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
                    
                </table>
                <div class="mt-3">
                    {{ $doctors->links() }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection