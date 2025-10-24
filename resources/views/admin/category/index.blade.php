@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h2><i class="bi bi-tags"></i> Manajemen Kategori</h2>
                <p>Kelola kategori untuk foto galeri sekolah</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Kategori</h5>
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Kategori
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Slug</th>
                                    <th>Deskripsi</th>
                                    <th>Jumlah Foto</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $index => $category)
                                <tr>
                                    <td>{{ $categories->firstItem() + $index }}</td>
                                    <td>
                                        <strong>{{ $category->nama }}</strong>
                                    </td>
                                    <td>
                                        <code>{{ $category->slug }}</code>
                                    </td>
                                    <td>{{ Str::limit($category->deskripsi, 50) }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ $category->galeris_count }} foto</span>
                                    </td>
                                    <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.category.show', $category->id) }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form method="POST" action="{{ route('admin.category.destroy', $category->id) }}" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <i class="bi bi-tags text-muted mb-2" style="font-size: 2rem;"></i>
                                        <h6 class="text-muted">Belum ada kategori</h6>
                                        <p class="text-muted">Mulai dengan menambahkan kategori pertama</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($categories->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        <div class="pagination-wrapper">
                            {{ $categories->links() }}
                        </div>
                    </div>
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
                            font-size: 12px !important;
                            width: 12px; 
                            height: 12px;
                        }
                    </style>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
