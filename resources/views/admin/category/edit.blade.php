@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h2><i class="bi bi-tags"></i> Edit Kategori</h2>
                <p>Ubah informasi kategori</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Form Edit Kategori</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                   id="nama" name="nama" value="{{ old('nama', $category->nama) }}" 
                                   placeholder="Masukkan nama kategori" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" name="deskripsi" rows="4" 
                                      placeholder="Masukkan deskripsi kategori (opsional)">{{ old('deskripsi', $category->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Update Kategori
                            </button>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Informasi Kategori</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Slug:</strong><br>
                        <code>{{ $category->slug }}</code>
                    </div>
                    <div class="mb-3">
                        <strong>Dibuat:</strong><br>
                        {{ $category->created_at->format('d F Y, H:i') }}
                    </div>
                    <div class="mb-3">
                        <strong>Diupdate:</strong><br>
                        {{ $category->updated_at->format('d F Y, H:i') }}
                    </div>
                    
                    <div class="alert alert-warning">
                        <h6><i class="bi bi-exclamation-triangle"></i> Perhatian:</h6>
                        <ul class="mb-0">
                            <li>Mengubah nama akan mengubah slug</li>
                            <li>Slug yang berubah dapat mempengaruhi URL</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

