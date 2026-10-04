@extends('layouts.app')
@section('title', 'Data Dokter')
@section('content')
    <h1>Data Dokter</h1>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Spesialisasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($doctors as $dokter)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dokter['nama'] }}</td>
                <td>{{ $dokter['spesialisasi'] }}</td>
                <td>
                    {{-- Menerapkan kondisi status --}}
                    @if ($dokter['status'] === 'aktif')
                        <span style="color: green;">Aktif Melayani</span>
                    @else
                        <span style="color: red;">Sedang Cuti</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Belum ada data dokter.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection