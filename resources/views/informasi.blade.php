@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Informasi Sekolah</h1>
        <p class="page-subtitle">Berita dan pengumuman terbaru SMK Negeri 4 Kota Bogor</p>
    </div>

    <!-- Information List -->
    <div class="row">
        @forelse($informasis as $informasi)
        <div class="col-md-4 col-lg-3 mb-3">
            <div class="card h-100 informasi-card">
                <div class="card-body p-3">
                    <div class="mb-2">
                        <span class="badge bg-primary small">{{ ucfirst($informasi->category) }}</span>
                        <span class="badge bg-info small">{{ $informasi->author }}</span>
                    </div>
                    
                    <h6 class="card-title mb-2">{{ Str::limit($informasi->title, 40) }}</h6>
                    <p class="card-text small mb-2">{{ Str::limit($informasi->description, 80) }}</p>
                    
                    <div class="informasi-details">
                        <div class="detail-item">
                            <i class="bi bi-calendar text-primary"></i>
                            <span class="small">{{ \Carbon\Carbon::parse($informasi->published_at)->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer bg-transparent p-2">
                    <a href="{{ route('admin.informasi.show', $informasi->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-eye"></i> Baca Selengkapnya
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="bi bi-newspaper text-muted mb-3" style="font-size: 4rem;"></i>
                    <h5 class="text-muted">Belum ada informasi</h5>
                    <p class="text-muted">Informasi sekolah akan ditampilkan di sini</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Compact Pagination -->
    @if($informasis->hasPages())
    <div class="row mt-3">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <nav aria-label="Informasi pagination">
                    <ul class="pagination pagination-sm">
                        {{-- Previous Page Link --}}
                        @if ($informasis->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">« Previous</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $informasis->previousPageUrl() }}" rel="prev">« Previous</a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($informasis->getUrlRange(1, $informasis->lastPage()) as $page => $url)
                            @if ($page == $informasis->currentPage())
                                <li class="page-item active">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($informasis->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $informasis->nextPageUrl() }}" rel="next">Next »</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Next »</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
.informasi-card {
    border: 1px solid #ddd;
    border-radius: 6px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    transition: all 0.2s ease;
}

.informasi-card:hover {
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    transform: translateY(-2px);
}

.card-title {
    font-size: 0.95rem;
    font-weight: 600;
    line-height: 1.3;
}

.card-text {
    font-size: 0.8rem;
    line-height: 1.4;
}

.badge {
    font-size: 0.7rem;
    margin-right: 3px;
    padding: 0.25rem 0.5rem;
}

.small {
    font-size: 0.75rem;
}

.page-header {
    padding: 1.5rem;
    margin-bottom: 1.5rem;
}

.page-title {
    font-size: 1.75rem;
    margin-bottom: 0.5rem;
}

.page-subtitle {
    font-size: 1rem;
    opacity: 0.9;
}

.informasi-details {
    margin-top: 0.5rem;
}

.detail-item {
    display: flex;
    align-items: center;
    margin-bottom: 0.25rem;
    font-size: 0.75rem;
}

.detail-item i {
    margin-right: 0.5rem;
    width: 14px;
    font-size: 0.8rem;
}

.card-footer {
    border-top: 1px solid rgba(0,0,0,.125);
}

/* Compact Pagination Styles */
.pagination-sm .page-link {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    line-height: 1.5;
    border-radius: 0.2rem;
}

.pagination-sm .page-item:first-child .page-link {
    border-top-left-radius: 0.2rem;
    border-bottom-left-radius: 0.2rem;
}

.pagination-sm .page-item:last-child .page-link {
    border-top-right-radius: 0.2rem;
    border-bottom-right-radius: 0.2rem;
}

.page-link {
    color: #007bff;
    background-color: #fff;
    border: 1px solid #dee2e6;
}

.page-link:hover {
    color: #0056b3;
    text-decoration: none;
    background-color: #e9ecef;
    border-color: #dee2e6;
}

.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    background-color: #fff;
    border-color: #dee2e6;
}
</style>
@endsection
