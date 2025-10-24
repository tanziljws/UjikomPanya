@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">🖼️ Galeri Foto Sekolah</h2>
            
            @if($galeri->count() > 0)
                <div class="row">
                    @foreach($galeri as $item)
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card gallery-card h-100">
                                <div class="gallery-image-container">
                                    <img src="{{ asset($item->gambar) }}" 
                                         class="card-img-top gallery-image" 
                                         alt="{{ $item->judul }}"
                                         data-bs-toggle="modal" 
                                         data-bs-target="#imageModal{{ $item->id }}">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">{{ $item->judul }}</h6>
                                    @if($item->deskripsi)
                                        <p class="card-text text-muted">{{ Str::limit($item->deskripsi, 100) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal for each image -->
                        <div class="modal fade" id="imageModal{{ $item->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="imageModalLabel{{ $item->id }}">{{ $item->judul }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset($item->gambar) }}" 
                                             class="img-fluid modal-image" 
                                             alt="{{ $item->judul }}">
                                        @if($item->deskripsi)
                                            <div class="mt-3">
                                                <p class="text-muted">{{ $item->deskripsi }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <a href="{{ asset($item->gambar) }}" 
                                           class="btn btn-primary" 
                                           target="_blank" 
                                           download>
                                            📥 Download
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Gallery Stats -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card gallery-stats-card">
                            <div class="card-body text-center">
                                <h6 class="mb-0">
                                    📊 Total Foto: {{ $galeri->count() }} | 
                                    📅 Terakhir diperbarui: {{ $galeri->first() ? $galeri->first()->updated_at->format('d M Y') : 'Belum ada data' }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12">
                        <div class="card empty-gallery-card">
                            <div class="card-body text-center py-5">
                                <div class="mb-3">
                                    <h1 class="text-muted">📷</h1>
                                </div>
                                <h5 class="text-muted">Belum ada foto di galeri</h5>
                                <p class="text-muted">Galeri foto sekolah akan ditampilkan di sini</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Bootstrap JS for modals -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
.gallery-card {
    transition: all 0.3s ease;
    border: none;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    background: rgba(255, 255, 255, 0.9);
}

.gallery-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(30, 58, 138, 0.2);
}

.gallery-image-container {
    position: relative;
    overflow: hidden;
    height: 200px;
}

.gallery-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.3s ease;
    cursor: pointer;
}

.gallery-image:hover {
    transform: scale(1.05);
}

.card-title {
    color: #1e3a8a;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.card-text {
    color: #6c757d;
    font-size: 0.9rem;
    line-height: 1.4;
}

/* Modal styling */
.modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

.modal-header {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 15px 15px 0 0;
    padding: 15px 20px;
}

.modal-title {
    font-weight: 600;
}

.btn-close {
    filter: invert(1);
}

.modal-body {
    padding: 20px;
}

.modal-image {
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.modal-footer {
    border: none;
    padding: 15px 20px;
    background: #f8f9fa;
    border-radius: 0 0 15px 15px;
}

/* Button styling */
.btn-primary {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    border: none;
    border-radius: 8px;
    padding: 8px 16px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(30, 58, 138, 0.4);
}

.btn-secondary {
    background: #6c757d;
    border: none;
    border-radius: 8px;
    padding: 8px 16px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    background: #5a6268;
    transform: translateY(-2px);
}

/* Gallery stats card */
.gallery-stats-card {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 2px solid #1e3a8a;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(30, 58, 138, 0.1);
}

.gallery-stats-card h6 {
    color: #1e3a8a;
    font-weight: 600;
}

/* Empty gallery card */
.empty-gallery-card {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 2px dashed #1e3a8a;
    border-radius: 12px;
}

.empty-gallery-card h1 {
    font-size: 4rem;
    opacity: 0.5;
}

.empty-gallery-card h5 {
    color: #1e3a8a;
    font-weight: 600;
}

/* Responsive design */
@media (max-width: 768px) {
    .gallery-image-container {
        height: 150px;
    }
    
    .modal-dialog {
        margin: 10px;
    }
    
    .modal-body {
        padding: 15px;
    }
}

/* Animation for cards */
.gallery-card {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Loading animation for images */
.gallery-image {
    position: relative;
}

.gallery-image::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    transition: left 0.5s;
}

.gallery-card:hover .gallery-image::before {
    left: 100%;
}
</style>
@endsection 