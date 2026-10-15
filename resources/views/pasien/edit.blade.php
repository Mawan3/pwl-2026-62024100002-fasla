@extends('layouts.app')
@section('title', 'Edit Pasien')
@section('content')
<div class="card">
    <div class="card-body">
        
        <!-- Blok ini untuk melihat pesan error validasi di bagian atas form -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT') 
            
            <div class="mb-3">
                <label>No. Rekam Medis</label>
                <input type="text" name="medical_record_number" class="form-control" value="{{ old('medical_record_number', $pasien->medical_record_number) }}">
                @error('medical_record_number') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Nama Pasien</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $pasien->name) }}">
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <!-- Field Tambahan yang Sebelumnya Terlewat -->
            
            <div class="mb-3">
                <label>Jenis Kelamin (L/P)</label>
                <input type="text" name="gender" class="form-control" value="{{ old('gender', $pasien->gender) }}">
                @error('gender') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date', $pasien->birth_date) }}">
                @error('birth_date') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="address" class="form-control">{{ old('address', $pasien->address) }}</textarea>
                @error('address') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>No. Telepon</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $pasien->phone) }}">
                @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</div>
@endsection