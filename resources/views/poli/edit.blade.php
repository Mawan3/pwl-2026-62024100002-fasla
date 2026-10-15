@extends('layouts.app')
@section('title', 'Edit Poli')
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

        <form action="{{ route('poli.update', $poli->id) }}" method="POST">
            @csrf
            @method('PUT') 
            
            <div class="mb-3">
                <label>Kode Poli</label>
                <input type="text" name="code" class="form-control" value="{{ old('code', $poli->code) }}">
                @error('code') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Nama Poli</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $poli->name) }}">
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control">{{ old('description', $poli->description) }}</textarea>
                @error('description') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ old('is_active', $poli->is_active) == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('is_active', $poli->is_active) == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @error('is_active') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('poli.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection