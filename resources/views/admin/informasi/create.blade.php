@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h2><i class="bi bi-plus-circle"></i> Tambah Informasi</h2>
                <p>Buat informasi baru untuk website sekolah</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Form Informasi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.informasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Informasi</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi Singkat</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="content" class="form-label">Konten Lengkap</label>
                            <textarea class="form-control" id="content" name="content" rows="8"></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Kategori</label>
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="">Pilih Kategori</option>
                                        <option value="news">Berita</option>
                                        <option value="announcement">Pengumuman</option>
                                        <option value="academic">Akademik</option>
                                        <option value="event">Event</option>
                                        <option value="other">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="published_at" class="form-label">Tanggal Publikasi</label>
                                    <input type="date" class="form-control" id="published_at" name="published_at" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="author" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="author" name="author" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar (Opsional)</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 2MB.</small>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="status" name="status" checked>
                                <label class="form-check-label" for="status">
                                    Publikasikan
                                </label>
                            </div>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan Informasi
                            </button>
                            <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">
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
                    <h6 class="mb-0">Panduan</h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            <small>Judul harus jelas dan menarik</small>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            <small>Pilih kategori yang sesuai</small>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            <small>Isi konten dengan informasi lengkap</small>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            <small>Tambahkan gambar untuk visual yang menarik</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 