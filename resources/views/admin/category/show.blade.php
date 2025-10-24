@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h2><i class="bi bi-tags"></i> Detail Kategori</h2>
                <p>Lihat detail kategori dan foto yang terkait</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Kategori</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Nama:</strong><br>
                        {{ $category->nama }}
                    </div>
                    <div class="mb-3">
                        <strong>Slug:</strong><br>
                        <code>{{ $category->slug }}</code>
                    </div>
                    <div class="mb-3">
                        <strong>Deskripsi:</strong><br>
                        {{ $category->deskripsi ?: 'Tidak ada deskripsi' }}
                    </div>
                    <div class="mb-3">
                        <strong>Jumlah Foto:</strong><br>
                        <span class="badge bg-primary">{{ $category->galeris->count() }} foto</span>
                    </div>
                    <div class="mb-3">
                        <strong>Dibuat:</strong><br>
                        {{ $category->created_at->format('d F Y, H:i') }}
                    </div>
                    <div class="mb-3">
                        <strong>Diupdate:</strong><br>
                        {{ $category->updated_at->format('d F Y, H:i') }}
                    </div>
                    
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Foto dalam Kategori Ini</h5>
                </div>
                <div class="card-body">
                    @if($category->galeris->count() > 0)
                        <div class="row">
                            @foreach($category->galeris as $galeri)
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <img src="{{ asset('images/' . $galeri->gambar) }}" 
                                         class="card-img-top" 
                                         alt="{{ $galeri->judul }}"
                                         style="height: 150px; object-fit: cover;">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $galeri->judul }}</h6>
                                        <p class="card-text">{{ Str::limit($galeri->deskripsi, 80) }}</p>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.galeri.edit', $galeri->id) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                            <small class="text-muted">
                                                {{ $galeri->created_at->format('d/m/Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-images text-muted mb-2" style="font-size: 2rem;"></i>
                            <h6 class="text-muted">Belum ada foto dalam kategori ini</h6>
                            <p class="text-muted">Foto yang ditambahkan dengan kategori ini akan muncul di sini</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

