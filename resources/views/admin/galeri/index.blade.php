@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h2><i class="bi bi-images"></i> Manajemen Galeri</h2>
                <p>Kelola foto dan gambar galeri sekolah</p>
            </div>
        </div>
    </div>

    <!-- Debug Info -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="alert alert-info">
                <strong>Debug Info:</strong><br>
                Variable: $galeri<br>
                Type: {{ gettype($galeri) }}<br>
                Count: {{ is_countable($galeri) ? $galeri->count() : 'Not countable' }}<br>
                @if(is_countable($galeri))
                    Total: {{ $galeri->total() ?? 'N/A' }}<br>
                    Current Page: {{ $galeri->currentPage() ?? 'N/A' }}<br>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Foto Galeri</h5>
                    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Foto
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Simple List -->
                    <div class="row">
                        @forelse($galeri as $item)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset('images/' . $item->gambar) }}" 
                                     class="card-img-top" 
                                     alt="{{ $item->judul }}"
                                     style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $item->judul }}</h6>
                                    @if($item->category)
                                        <span class="badge bg-primary mb-2">{{ $item->category->nama }}</span>
                                    @else
                                        <span class="badge bg-secondary mb-2">Tanpa Kategori</span>
                                    @endif
                                    <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form method="POST" action="{{ route('admin.galeri.destroy', $item->id) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus foto ini?')">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-images text-muted mb-3" style="font-size: 3rem;"></i>
                            <h5 class="text-muted">Belum ada foto galeri</h5>
                            <p class="text-muted">Mulai dengan menambahkan foto pertama</p>
                        </div>
                        @endforelse
                    </div>

                    @if($galeri->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        <div class="pagination-wrapper">
                            {{ $galeri->links() }}
                        </div>
                    </div>
                    <!-- Scoped small pagination styles -->
                    <style>
                        .pagination-wrapper ul.pagination { 
                            gap: 2px;
                            margin: 0.3rem 0;
                        }
                        .pagination-wrapper .page-link {
                            padding: 1px 5px;
                            font-size: 10px;
                            line-height: 1.1;
                            min-width: 24px;
                            height: 22px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        }
                        .pagination-wrapper .page-item .bi,
                        .pagination-wrapper .page-item i,
                        .pagination-wrapper .page-item svg {
                            font-size: 10px !important;
                            width: 10px !important; 
                            height: 10px !important;
                            margin: 0 -1px;
                        }
                    </style>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
