@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h2><i class="bi bi-file-text"></i> Manajemen Konten</h2>
                <p>Kelola konten dan halaman website sekolah</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Konten</h5>
                    <a href="{{ route('admin.content.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Konten
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Tipe</th>
                                    <th>Status</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Visi dan Misi Sekolah</td>
                                    <td><span class="badge bg-primary">Halaman</span></td>
                                    <td><span class="badge bg-success">Published</span></td>
                                    <td>15 Jan 2024</td>
                                    <td>
                                        <a href="{{ route('admin.content.edit', 1) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="{{ route('admin.content.show', 1) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.content.destroy', 1) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus konten ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sejarah Sekolah</td>
                                    <td><span class="badge bg-info">Artikel</span></td>
                                    <td><span class="badge bg-success">Published</span></td>
                                    <td>10 Jan 2024</td>
                                    <td>
                                        <a href="{{ route('admin.content.edit', 2) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="{{ route('admin.content.show', 2) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.content.destroy', 2) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus konten ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 