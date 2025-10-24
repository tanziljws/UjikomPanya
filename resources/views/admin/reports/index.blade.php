@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h2><i class="bi bi-graph-up"></i> Laporan Sistem</h2>
                <p>Lihat statistik dan laporan website sekolah</p>
            </div>
            </div>
        </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $stats['total_gallery'] }}</h4>
                            <p class="mb-0">Total Foto</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-images" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $stats['total_users'] }}</h4>
                            <p class="mb-0">Total User</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-people" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $stats['total_agenda'] }}</h4>
                            <p class="mb-0">Total Agenda</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-calendar-event" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $stats['total_informasi'] }}</h4>
                            <p class="mb-0">Total Informasi</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-info-circle" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Weekly Statistics (Last 7 Days) -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0"><i class="bi bi-calendar-week"></i> Statistik 7 Hari Terakhir</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-2">
                            <div class="border rounded p-3">
                                <h3 class="text-primary mb-0">{{ $weeklyStats['admin_posts'] }}</h3>
                                <small class="text-muted">Post Admin</small>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="border rounded p-3">
                                <h3 class="text-success mb-0">{{ $weeklyStats['user_registers'] }}</h3>
                                <small class="text-muted">User Register</small>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="border rounded p-3">
                                <h3 class="text-info mb-0">{{ $weeklyStats['user_logins'] }}</h3>
                                <small class="text-muted">User Login</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="border rounded p-3">
                                <h3 class="text-danger mb-0">{{ $weeklyStats['user_likes'] }}</h3>
                                <small class="text-muted">User Like</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="border rounded p-3">
                                <h3 class="text-warning mb-0">{{ $weeklyStats['user_comments'] }}</h3>
                                <small class="text-muted">User Comment</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="bi bi-activity"></i> Aktivitas Terbaru (7 Hari Terakhir)</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>Aktivitas</th>
                                    <th>User</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recent_activities as $activity)
                                <tr>
                                    <td>{{ $activity['waktu'] }}</td>
                                    <td>{{ $activity['aktivitas'] }}</td>
                                    <td>
                                        @if($activity['user'] == 'Admin')
                                            <span class="badge bg-primary">{{ $activity['user'] }}</span>
                                        @elseif($activity['user'] == 'User')
                                            <span class="badge bg-success">{{ $activity['user'] }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $activity['user'] }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($activity['status'] == 'Berhasil')
                                            <span class="badge bg-success">{{ $activity['status'] }}</span>
                                        @elseif($activity['status'] == 'Gagal')
                                            <span class="badge bg-danger">{{ $activity['status'] }}</span>
                                        @else
                                            <span class="badge bg-warning">{{ $activity['status'] }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada aktivitas dalam 7 hari terakhir</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-file-earmark-pdf"></i> Download Laporan</h5>
                </div>
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-file-earmark-pdf" style="font-size: 4rem; color: #dc2626;"></i>
                    </div>
                    <h6 class="mb-3">Laporan Lengkap</h6>
                    <p class="text-muted small mb-4">
                        Download laporan lengkap yang berisi semua data: User, Galeri, Agenda, Informasi, dan Aktivitas dalam satu file PDF
                    </p>
                    <a href="{{ route('admin.reports.download.pdf') }}" target="_blank" class="btn btn-danger btn-lg w-100">
                        <i class="bi bi-download"></i> Download PDF Lengkap
                    </a>
                    <div class="mt-3">
                        <small class="text-muted">
                            <i class="bi bi-info-circle"></i> File akan terbuka di tab baru dan siap untuk dicetak atau disimpan
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 