@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h2><i class="bi bi-info-circle"></i> Manajemen Informasi</h2>
                <p>Kelola berita dan pengumuman sekolah</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Informasi</h5>
                    <a href="{{ route('admin.informasi.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Informasi
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                    <th>Status</th>
                                    <th>Tanggal Publikasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($informasis as $index => $informasi)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $informasi->title }}</td>
                                    <td><span class="badge bg-primary">{{ ucfirst($informasi->category) }}</span></td>
                                    <td>{{ $informasi->author }}</td>
                                    <td>
                                        @if($informasi->status)
                                            <span class="badge bg-success">Published</span>
                                        @else
                                            <span class="badge bg-secondary">Draft</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($informasi->published_at)->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.informasi.edit', $informasi->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="{{ route('admin.informasi.show', $informasi->id) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.informasi.destroy', $informasi->id) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus informasi ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <i class="bi bi-info-circle text-muted mb-2" style="font-size: 2rem;"></i>
                                        <p class="text-muted mb-0">Belum ada informasi</p>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($informasis->hasPages())
                    <div class="d-flex justify-content-center mt-3">
                        <div class="pagination-wrapper">
                            {{ $informasis->links() }}
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
                            font-size: 10px !important;
                            width: 10px !important; 
                            height: 10px !important;
                            margin: 0 -1px;
                        }
                    </style>
                    @endif