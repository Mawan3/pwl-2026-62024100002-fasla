@extends('layouts.app')
@section('title', 'Tambah Pasien')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('pasien.store') }}" method="POST">
            @csrf <!-- Wajib untuk keamanan form POST[cite: 47] -->
            
            <div class="mb-3">
                <label>No. Rekam Medis</label>
                <input type="text" name="medical_record_number" class="form-control" value="{{ old('medical_record_number') }}">
                @error('medical_record_number') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Nama Pasien</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Jenis Kelamin (L/P)</label>
                <input type="text" name="gender" class="form-control" value="{{ old('gender') }}">
                @error('gender') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date') }}">
                @error('birth_date') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="address" class="form-control">{{ old('address') }}</textarea>
            </div>

            <div class="mb-3">
                <label>No. Telepon</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection