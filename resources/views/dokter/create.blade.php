@extends('layouts.app')
@section('title', 'Tambah Dokter')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('dokter.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label>Kode Dokter</label>
                <input type="text" name="doctor_code" class="form-control" value="{{ old('doctor_code') }}">
                @error('doctor_code') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Nama Dokter</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Spesialisasi</label>
                <input type="text" name="specialization" class="form-control" value="{{ old('specialization') }}">
                @error('specialization') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>No. Telepon</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Aktif Melayani</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Sedang Cuti</option>
                </select>
                @error('is_active') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection