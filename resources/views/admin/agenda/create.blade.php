@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h2><i class="bi bi-plus-circle"></i> Tambah Agenda</h2>
                <p>Buat agenda baru untuk kegiatan sekolah</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Form Agenda</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.agenda.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Agenda</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="time" class="form-label">Waktu</label>
                                    <input type="time" class="form-control" id="time" name="time">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                        
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe Agenda</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="">Pilih Tipe</option>
                                <option value="academic">Akademik</option>
                                <option value="event">Event</option>
                                <option value="meeting">Rapat</option>
                                <option value="competition">Kompetisi</option>
                                <option value="other">Lainnya</option>
                            </select>
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
                                    Aktif
                                </label>
                            </div>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan Agenda
                            </button>
                            <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary">
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
                            <small>Pastikan judul agenda jelas dan informatif</small>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            <small>Pilih tipe agenda yang sesuai</small>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            <small>Isi tanggal dan waktu dengan benar</small>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            <small>Tambahkan lokasi jika diperlukan</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 