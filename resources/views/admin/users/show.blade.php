@extends('layouts.app')

@section('title', 'Detail User')

@section('content')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h1 class="page-title">Detail User</h1>
            <p class="page-subtitle">Informasi lengkap user</p>
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
                        <i class="bi bi-person-circle me-2"></i>
                        Informasi User
                    </h5>
                    <p class="text-white-50 mb-0 mt-1">Detail lengkap user {{ $user->name }}</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-light me-2">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-light">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-info">
                        <div class="info-section mb-4">
                            <h6 class="info-title">
                                <i class="bi bi-person me-2" style="color: var(--primary-color);"></i>
                                Informasi Dasar
                            </h6>
                            <div class="info-grid">
                                <div class="info-item">
                                    <label class="info-label">Nama Lengkap</label>
                                    <div class="info-value">{{ $user->name }}</div>
                                </div>
                                <div class="info-item">
                                    <label class="info-label">Email</label>
                                    <div class="info-value">{{ $user->email }}</div>
                                </div>
                                <div class="info-item">
                                    <label class="info-label">Role</label>
                                    <div class="info-value">
                                        @if($user->role === 'admin')
                                            <span class="badge bg-danger">Admin</span>
                                        @else
                                            <span class="badge bg-primary">User</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="info-item">
                                    <label class="info-label">Status</label>
                                    <div class="info-value">
                                        @if($user->status === 'active')
                                            <span class="badge bg-success">Active</span>
                                        @elseif($user->status === 'inactive')
                                            <span class="badge bg-warning">Inactive</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $user->status }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="info-section mb-4">
                            <h6 class="info-title">
                                <i class="bi bi-calendar me-2" style="color: var(--primary-color);"></i>
                                Informasi Sistem
                            </h6>
                            <div class="info-grid">
                                <div class="info-item">
                                    <label class="info-label">ID User</label>
                                    <div class="info-value">{{ $user->id }}</div>
                                </div>
                                <div class="info-item">
                                    <label class="info-label">Tanggal Dibuat</label>
                                    <div class="info-value">{{ $user->created_at->format('d/m/Y H:i:s') }}</div>
                                </div>
                                <div class="info-item">
                                    <label class="info-label">Terakhir Update</label>
                                    <div class="info-value">{{ $user->updated_at->format('d/m/Y H:i:s') }}</div>
                                </div>
                                <div class="info-item">
                                    <label class="info-label">Email Verified</label>
                                    <div class="info-value">
                                        @if($user->email_verified_at)
                                            <span class="badge bg-success">Terverifikasi</span>
                                        @else
                                            <span class="badge bg-warning">Belum Verifikasi</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="user-actions">
                        <div class="action-card">
                            <h6 class="action-title">
                                <i class="bi bi-gear me-2" style="color: var(--primary-color);"></i>
                                Aksi
                            </h6>
                            <div class="action-buttons">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary w-100 mb-2">
                                    <i class="bi bi-pencil me-2"></i>
                                    Edit User
                                </a>
                                
                                @if($user->id !== auth()->id())
                                    <form method="POST" action="{{ route('admin.users.toggle-status', $user->id) }}" class="mb-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-warning w-100">
                                            <i class="bi bi-{{ $user->status === 'active' ? 'lock' : 'unlock' }} me-2"></i>
                                            {{ $user->status === 'active' ? 'Nonaktifkan' : 'Aktifkan' }}
                                        </button>
                                    </form>
                                    
                                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                            <i class="bi bi-trash me-2"></i>
                                            Hapus User
                                        </button>
                                    </form>
                                @else
                                    <div class="alert alert-info">
                                        <i class="bi bi-info-circle me-2"></i>
                                        Ini adalah akun Anda
                                    </div>
                                @endif
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

/* User Actions */
.user-actions {
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

/* Badge Styling */
.badge {
    font-size: 0.75rem;
    padding: 0.375rem 0.75rem;
    border-radius: 0.5rem;
}

.bg-danger {
    background-color: #ef4444 !important;
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

.btn-warning {
    background-color: #f59e0b;
    border-color: #f59e0b;
}

.btn-warning:hover {
    background-color: #d97706;
    border-color: #d97706;
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

.alert {
    border: none;
    border-radius: 0.75rem;
    padding: 1rem 1.25rem;
}

.alert-info {
    background: rgba(59, 130, 246, 0.1);
    color: #3b82f6;
    border-left: 4px solid #3b82f6;
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
    
    .user-actions {
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
