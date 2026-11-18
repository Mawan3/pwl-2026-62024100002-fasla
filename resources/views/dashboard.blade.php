@extends('layouts.app')
@section('title', 'Dashboard Klinik')

@section('content')
<div class="row">
    <!-- Card Pasien -->
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-primary">
            <div class="inner">
                <h3>{{ $jumlahPasien }}</h3>
                <p>Total Pasien</p>
            </div>
            <div class="small-box-icon">
                <i class="bi bi-people-fill"></i>
            </div>
            <a href="{{ route('pasien.index') }}" class="small-box-footer link-light link-underline-opacity-0">
                Lihat Data <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>

    <!-- Card Dokter -->
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-success">
            <div class="inner">
                <h3>{{ $jumlahDokter }}</h3>
                <p>Dokter Tersedia</p>
            </div>
            <div class="small-box-icon">
                <i class="bi bi-person-badge-fill"></i>
            </div>
            <a href="{{ route('dokter.index') }}" class="small-box-footer link-light link-underline-opacity-0">
                Lihat Data <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>

    <!-- Card Poli -->
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-warning">
            <div class="inner">
                <h3>{{ $jumlahPoli }}</h3>
                <p>Poliklinik</p>
            </div>
            <div class="small-box-icon">
                <i class="bi bi-hospital-fill"></i>
            </div>
            <a href="{{ route('poli.index') }}" class="small-box-footer link-dark link-underline-opacity-0">
                Lihat Data <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>

    <!-- Card Pendaftaran -->
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-danger">
            <div class="inner">
                <h3>{{ $jumlahPendaftaran }}</h3>
                <p>Pendaftaran</p>
            </div>
            <div class="small-box-icon">
                <i class="bi bi-clipboard2-pulse-fill"></i>
            </div>
            <a href="{{ route('pendaftaran.index') }}" class="small-box-footer link-light link-underline-opacity-0">
                Lihat Data <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>
</div>

<!-- Tabel Ringkasan Pendaftaran Terbaru -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h3 class="card-title fw-bold">
                    <i class="bi bi-clock-history me-1"></i> Pendaftaran Pasien Terbaru
                </h3>
            </div>
            <div class="card-body p-0 table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Pasien</th>
                            <th>Dokter Tujuan</th>
                            <th>Keluhan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pendaftaranTerbaru as $reg)
                            <tr>
                                <td>{{ $reg->registration_date }}</td>
                                <td class="fw-semibold">{{ $reg->patient?->name ?? '-' }}</td>
                                <td>{{ $reg->doctor?->name ?? '-' }}</td>
                                <td>{{ $reg->complaint ?? '-' }}</td>
                                <td>
                                    @if ($reg->status === 'completed')
                                        <span class="badge bg-success">Selesai</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-3 text-muted">Belum ada aktivitas pendaftaran terbaru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection