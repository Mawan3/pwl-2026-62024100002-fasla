@extends('layouts.app')
@section('title', 'Edit Dokter')
@section('content')
<div class="card">
    <div class="card-body">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
            @csrf
            @method('PUT') 
            
            <div class="mb-3">
                <label>Kode Dokter</label>
                <input type="text" name="doctor_code" class="form-control" value="{{ old('doctor_code', $dokter->doctor_code) }}">
            </div>

            <div class="mb-3">
                <label>Nama Dokter</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $dokter->name) }}">
            </div>

            <div class="mb-3">
                <label>Spesialisasi</label>
                <input type="text" name="specialization" class="form-control" value="{{ old('specialization', $dokter->specialization) }}">
            </div>

            <div class="mb-3">
                <label>No. Telepon</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $dokter->phone) }}">
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ old('is_active', $dokter->is_active) == '1' ? 'selected' : '' }}>Aktif Melayani</option>
                    <option value="0" {{ old('is_active', $dokter->is_active) == '0' ? 'selected' : '' }}>Sedang Cuti</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Poli</label>
                <select name="poli_id" class="form-control">
                    <option value="">-- Pilih Poli --</option>
                    @foreach ($polis as $poli)
                        <option value="{{ $poli->id }}" @selected(old('poli_id', $dokter->poli_id) == $poli->id)>
                            {{ $poli->name }}
                        </option>
                    @endforeach
                </select>
                @error('poli_id') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection