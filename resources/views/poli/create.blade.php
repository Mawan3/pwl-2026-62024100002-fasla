@extends('layouts.app')
@section('title', 'Tambah Poli')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('poli.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label>Kode Poli</label>
                <input type="text" name="code" class="form-control" value="{{ old('code') }}">
                @error('code') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Nama Poli</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                @error('description') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @error('is_active') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('poli.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection