@extends('layouts.app')
@section('title', 'Data Poli')
@section('content')

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('poli.create') }}" class="btn btn-primary mb-3">Tambah Poli</a>

<div class="card">
    <div class="card-body p-0 table-responsive">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Poli</th>
                    <th>Nama Poli</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($polis as $poli)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $poli->code }}</td>
                    <td>{{ $poli->name }}</td>
                    <td>{{ $poli->description }}</td>
                    <td class="align-middle">
                        @if($poli->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td class="align-middle">
                        <a href="{{ route('poli.show', $poli->id) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('poli.edit', $poli->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                        <form action="{{ route('poli.destroy', $poli->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data Poli ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center">Belum ada data Poli.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection