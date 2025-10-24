@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h2><i class="bi bi-calendar-event"></i> Manajemen Agenda</h2>
                <p>Kelola jadwal kegiatan dan acara sekolah</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Agenda</h5>
                    <a href="{{ route('admin.agenda.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Agenda
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
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Lokasi</th>
                                    <th>Tipe</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($agendas as $index => $agenda)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $agenda->title }}</td>
                                    <td>{{ \Carbon\Carbon::parse($agenda->date)->format('d M Y') }}</td>
                                    <td>{{ $agenda->time ? \Carbon\Carbon::parse($agenda->time)->format('H:i') : '-' }}</td>
                                    <td>{{ $agenda->location ?? '-' }}</td>
                                    <td><span class="badge bg-primary">{{ ucfirst($agenda->type) }}</span></td>
                                    <td>
                                        @if($agenda->status)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.agenda.edit', $agenda->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.agenda.destroy', $agenda->id) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus agenda ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <i class="bi bi-calendar-x text-muted mb-2" style="font-size: 2rem;"></i>
                                        <p class="text-muted mb-0">Belum ada agenda</p>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($agendas->hasPages())
                    <div class="d-flex justify-content-center mt-3">
                        <div class="pagination-wrapper">
                            {{ $agendas->links() }}
                        </div>
                    </div>
                    <style>
                        .pagination-wrapper ul.pagination { gap: 4px; }
                        .pagination-wrapper .page-link {
                            padding: 2px 8px;
                            font-size: 12px;
                            line-height: 1.2;
                        }
                        .pagination-wrapper .page-item .bi,
                        .pagination-wrapper .page-item i,
                        .pagination-wrapper .page-item svg {
                            font-size: 14px !important;
                            width: 14px; height: 14px;
                        }
                    </style>
                    @endif