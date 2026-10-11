@extends('layouts.app')

@section('title', 'Data Dokter')

@section('content')
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
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($doctors as $doctor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $doctor->doctor_code }}</td>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->specialization }}</td>
                            <td>
                                <!-- Menggunakan Badge/Label warna warni dari Bootstrap -->
                                @if($doctor->is_active)
                                    <span class="badge bg-success">Aktif Melayani</span>
                                @else
                                    <span class="badge bg-danger">Sedang Cuti</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data dokter.</td>
                        </tr>
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