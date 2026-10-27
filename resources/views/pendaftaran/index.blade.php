@extends('layouts.app')
@section('title', 'Data Pendaftaran')
@section('content')

<!-- Form Pencarian dan Filter Terpadu -->
<form method="GET" action="{{ route('pendaftaran.index') }}" class="mb-3">
    <div class="row g-2">
        <!-- Search Nama Pasien -->
        <div class="col-md-3">
            <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Cari Nama Pasien">
        </div>
        
        <!-- Filter Dokter -->
        <div class="col-md-2">
            <select name="doctor_id" class="form-control">
                <option value="">Semua Dokter</option>
                @foreach($doctors as $d)
                    <option value="{{ $d->id }}" @selected(request('doctor_id') == $d->id)>{{ $d->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Filter Status -->
        <div class="col-md-2">
            <select name="status" class="form-control">
                <option value="">Semua Status</option>
                <option value="waiting" @selected(request('status') === 'waiting')>Menunggu</option>
                <option value="completed" @selected(request('status') === 'completed')>Selesai</option>
            </select>
        </div>

        <!-- Filter Tanggal -->
        <div class="col-md-2">
            <input type="date" name="registration_date" class="form-control" value="{{ request('registration_date') }}">
        </div>

        <!-- Sorting Tanggal -->
        <div class="col-md-2">
            <select name="direction" class="form-control">
                <option value="desc" @selected(request('direction') === 'desc')>Terbaru</option>
                <option value="asc" @selected(request('direction') === 'asc')>Terlama</option>
            </select>
        </div>

        <div class="col-md-1">
            <button type="submit" class="btn btn-primary w-100">Cari</button>
        </div>
    </div>
    <div class="mt-2">
        <!-- Tombol Reset Filter -->
        <a href="{{ route('pendaftaran.index') }}" class="btn btn-sm btn-secondary">Reset Filter</a>
    </div>
</form>

<p class="text-muted">Menampilkan {{ $registrations->count() }} dari {{ $registrations->total() }} pendaftaran.</p>

<div class="card">
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Nama Pasien</th>
                    <th>Dokter (Poli)</th>
                    <th>Keluhan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($registrations as $reg)
                <tr>
                    <td>{{ $registrations->firstItem() + $loop->index }}</td>
                    <td>{{ \Carbon\Carbon::parse($reg->registration_date)->format('d/m/Y') }}</td>
                    <td>{{ $reg->patient?->name }}</td>
                    <td>{{ $reg->doctor?->name }} ({{ $reg->doctor?->poli?->name }})</td>
                    <td>{{ $reg->complaint ?? '-' }}</td>
                    <td>
                        @if($reg->status === 'waiting')
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @else
                            <span class="badge bg-success">Selesai</span>
                        @endif
                    </td>
                </tr>
                @empty
                <!-- Empty State -->
                <tr><td colspan="6" class="text-center">Tidak ada data pendaftaran yang sesuai kriteria.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<div class="mt-3">
    {{ $registrations->links() }}
</div>

@endsection