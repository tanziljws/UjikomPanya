@extends('layouts.app')

@section('title', 'Detail Konten')

@section('content')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h1 class="page-title">Detail Konten</h1>
            <p class="page-subtitle">Informasi lengkap konten</p>
        </div>
        <div class="col-auto">
            <div class="admin-info d-flex align-items-center">
                <div class="admin-avatar me-3">
                    <i class="bi bi-person-circle" style="font-size: 3rem; color: var(--primary-color);"></i>
                </div>
                <div class="admin-details">
                    <div class="admin-name fw-bold" style="color: var(--primary-color);">Administrator</div>
                    <div class="admin-role opacity-75" style="color: var(--gray-color);">Super Admin</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Section -->
<div class="content-section">
    <div class="card">
        <div class="card-header" style="background: linear-gradient(135deg, var(--primary-color), var(--primary-light)); color: white;">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-file-text me-2"></i>
                        Informasi Konten
                    </h5>
                    <p class="text-white-50 mb-0 mt-1">Detail lengkap konten {{ $content->judul }}</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.content.edit', $content->id) }}" class="btn btn-light me-2">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a href="{{ route('admin.content.index') }}" class="btn btn-outline-light">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="content-info">
                        <div class="info-section mb-4">
                            <h6 class="info-title">
                                <i class="bi bi-file-text me-2" style="color: var(--primary-color);"></i>
                                Informasi Dasar
                            </h6>
                            <div class="info-grid">
                                <div class="info-item">
                                    <label class="info-label">Judul</label>
                                    <div class="info-value">{{ $content->judul }}</div>
                                </div>
                                <div class="info-item">
                                    <label class="info-label">Tipe</label>
                                    <div class="info-value">
                                        <span class="badge bg-primary">{{ $content->tipe }}</span>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <label class="info-label">Status</label>
                                    <div class="info-value">
                                        @if($content->status === 'published')
                                            <span class="badge bg-success">Published</span>
                                        @elseif($content->status === 'draft')
                                            <span class="badge bg-warning">Draft</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $content->status }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="info-item">
                                    <label class="info-label">Kategori</label>
                                    <div class="info-value">{{ $content->kategori ?? 'Tidak ada kategori' }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="info-section mb-4">
                            <h6 class="info-title">
                                <i class="bi bi-text-paragraph me-2" style="color: var(--primary-color);"></i>
                                Deskripsi
                            </h6>
                            <div class="content-description">
                                {{ $content->deskripsi ?? 'Tidak ada deskripsi' }}
                            </div>
                        </div>

                        <div class="info-section mb-4">
                            <h6 class="info-title">
                                <i class="bi bi-calendar me-2" style="color: var(--primary-color);"></i>
                                Informasi Sistem
                            </h6>
                            <div class="info-grid">
                                <div class="info-item">
                                    <label class="info-label">ID Konten</label>
                                    <div class="info-value">{{ $content->id }}</div>
                                </div>
                                <div class="info-item">
                                    <label class="info-label">Tanggal Dibuat</label>
                                    <div class="info-value">{{ $content->created_at->format('d/m/Y H:i:s') }}</div>
                                </div>
                                <div class="info-item">
                                    <label class="info-label">Terakhir Update</label>
                                    <div class="info-value">{{ $content->updated_at->format('d/m/Y H:i:s') }}</div>
                                </div>
                                <div class="info-item">
                                    <label class="info-label">Dibuat Oleh</label>
                                    <div class="info-value">{{ $content->created_by ?? 'System' }}</div>
                                </div>
                            </div>
                        </div>

                        @if($content->gambar)
                        <div class="info-section mb-4">
                            <h6 class="info-title">
                                <i class="bi bi-image me-2" style="color: var(--primary-color);"></i>
                                Gambar Konten
                            </h6>
                            <div class="content-image">
                                <img src="{{ asset('images/' . $content->gambar) }}" 
                                     alt="{{ $content->judul }}" 
                                     class="img-fluid rounded" 
                                     style="max-width: 100%; height: auto;">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="content-actions">
                        <div class="action-card">
                            <h6 class="action-title">
                                <i class="bi bi-gear me-2" style="color: var(--primary-color);"></i>
                                Aksi
                            </h6>
                            <div class="action-buttons">
                                <a href="{{ route('admin.content.edit', $content->id) }}" class="btn btn-primary w-100 mb-2">
                                    <i class="bi bi-pencil me-2"></i>
                                    Edit Konten
                                </a>
                                
                                <form method="POST" action="{{ route('admin.content.destroy', $content->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Apakah Anda yakin ingin menghapus konten ini?')">
                                        <i class="bi bi-trash me-2"></i>
                                        Hapus Konten
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="action-card mt-3">
                            <h6 class="action-title">
                                <i class="bi bi-info-circle me-2" style="color: var(--primary-color);"></i>
                                Statistik
                            </h6>
                            <div class="stats-list">
                                <div class="stat-item">
                                    <span class="stat-label">Views</span>
                                    <span class="stat-value">{{ $content->views ?? 0 }}</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Likes</span>
                                    <span class="stat-value">{{ $content->likes ?? 0 }}</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-label">Comments</span>
                                    <span class="stat-value">{{ $content->comments ?? 0 }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
:root {
    --primary-color: #1e40af;
    --primary-dark: #1e3a8a;
    --primary-light: #3b82f6;
    --gray-color: #6b7280;
    --dark-color: #1f2937;
}

.page-header {
    background: white;
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: var(--shadow-lg);
    margin-bottom: 2rem;
    border: 1px solid var(--border-color);
}

.page-title {
    color: var(--primary-color);
    font-weight: 700;
    font-size: 2rem;
    margin: 0;
}

.page-subtitle {
    color: var(--gray-color);
    font-size: 1rem;
    margin: 0.5rem 0 0 0;
}

.admin-info {
    background: rgba(30, 64, 175, 0.05);
    padding: 1rem;
    border-radius: 0.75rem;
    border: 1px solid rgba(30, 64, 175, 0.1);
}

.admin-avatar {
    width: 3rem;
    height: 3rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.admin-name {
    font-size: 1rem;
    font-weight: 600;
}

.admin-role {
    font-size: 0.875rem;
}

.content-section {
    margin-bottom: 2rem;
}

.card {
    border: 1px solid var(--border-color);
    border-radius: 1rem;
    box-shadow: var(--shadow-lg);
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-xl);
}

.card-header {
    border-bottom: 1px solid var(--border-color);
    border-radius: 1rem 1rem 0 0 !important;
}

.card-title {
    font-weight: 600;
    margin: 0;
}

/* Info Sections */
.info-section {
    background: rgba(30, 64, 175, 0.02);
    padding: 1.5rem;
    border-radius: 0.75rem;
    border: 1px solid rgba(30, 64, 175, 0.1);
}

.info-title {
    color: var(--dark-color);
    font-weight: 600;
    margin-bottom: 1rem;
    font-size: 1.1rem;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
}

.info-item {
    padding: 1rem;
    background: white;
    border-radius: 0.5rem;
    border: 1px solid rgba(30, 64, 175, 0.1);
}

.info-label {
    font-weight: 600;
    color: var(--gray-color);
    font-size: 0.875rem;
    margin-bottom: 0.5rem;
    display: block;
}

.info-value {
    color: var(--dark-color);
    font-weight: 500;
}

.content-description {
    background: white;
    padding: 1.5rem;
    border-radius: 0.5rem;
    border: 1px solid rgba(30, 64, 175, 0.1);
    line-height: 1.6;
    color: var(--dark-color);
}

.content-image {
    background: white;
    padding: 1rem;
    border-radius: 0.5rem;
    border: 1px solid rgba(30, 64, 175, 0.1);
    text-align: center;
}

/* Content Actions */
.content-actions {
    position: sticky;
    top: 2rem;
}

.action-card {
    background: rgba(30, 64, 175, 0.02);
    padding: 1.5rem;
    border-radius: 0.75rem;
    border: 1px solid rgba(30, 64, 175, 0.1);
}

.action-title {
    color: var(--dark-color);
    font-weight: 600;
    margin-bottom: 1rem;
    font-size: 1.1rem;
}

.action-buttons {
    display: flex;
    flex-direction: column;
}

/* Stats List */
.stats-list {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.stat-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem;
    background: white;
    border-radius: 0.5rem;
    border: 1px solid rgba(30, 64, 175, 0.1);
}

.stat-label {
    color: var(--gray-color);
    font-size: 0.875rem;
}

.stat-value {
    color: var(--primary-color);
    font-weight: 600;
    font-size: 1.1rem;
}

/* Badge Styling */
.badge {
    font-size: 0.75rem;
    padding: 0.375rem 0.75rem;
    border-radius: 0.5rem;
}

.bg-primary {
    background-color: var(--primary-color) !important;
}

.bg-success {
    background-color: #10b981 !important;
}

.bg-warning {
    background-color: #f59e0b !important;
}

.bg-secondary {
    background-color: var(--gray-color) !important;
}

/* Button Styling */
.btn {
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}

.btn-primary:hover {
    background-color: var(--primary-dark);
    border-color: var(--primary-dark);
}

.btn-danger {
    background-color: #ef4444;
    border-color: #ef4444;
}

.btn-danger:hover {
    background-color: #dc2626;
    border-color: #dc2626;
}

.btn-light {
    background-color: rgba(255, 255, 255, 0.9);
    border-color: rgba(255, 255, 255, 0.2);
    color: var(--dark-color);
}

.btn-light:hover {
    background-color: white;
    border-color: rgba(255, 255, 255, 0.3);
    color: var(--dark-color);
}

.btn-outline-light {
    border-color: rgba(255, 255, 255, 0.5);
    color: white;
}

.btn-outline-light:hover {
    background-color: white;
    border-color: white;
    color: var(--dark-color);
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-header {
        padding: 1.5rem;
    }
    
    .page-title {
        font-size: 1.5rem;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
    }
    
    .content-actions {
        position: static;
        margin-top: 2rem;
    }
}

@media (max-width: 576px) {
    .page-header {
        padding: 1rem;
    }
    
    .admin-info {
        flex-direction: column;
        text-align: center;
    }
    
    .admin-avatar {
        margin-bottom: 0.5rem;
        margin-right: 0 !important;
    }
    
    .info-section {
        padding: 1rem;
    }
}
</style>
@endsection
