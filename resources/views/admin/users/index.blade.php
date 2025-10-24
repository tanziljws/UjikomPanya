@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
                    <h1 class="page-title">Manajemen User</h1>
            <p class="page-subtitle">Kelola user dan akses sistem</p>
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
                        <i class="bi bi-people me-2"></i>
                        Daftar User
                    </h5>
                    <p class="text-white-50 mb-0 mt-1">Kelola semua user dalam sistem</p>
                    </div>
                <div class="col-auto">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-light">
                            <i class="bi bi-plus"></i> Tambah User
                        </a>
                    </div>
                </div>
                    </div>
        <div class="card-body">
            @if($users && count($users) > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar me-3">
                                            <i class="bi bi-person-circle" style="font-size: 2rem; color: var(--primary-color);"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $user->name }}</div>
                                            <div class="text-muted small">ID: {{ $user->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="user-email">
                                        <span class="text-primary">{{ $user->email }}</span>
                                    </div>
                                </td>
                                <td>
                                    @if($user->role === 'admin')
                                        <span class="badge bg-danger">Admin</span>
                                    @else
                                        <span class="badge bg-primary">User</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->status === 'active')
                                        <span class="badge bg-success">Active</span>
                                    @elseif($user->status === 'inactive')
                                        <span class="badge bg-warning">Inactive</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $user->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        @if($user->id !== auth()->id())
                                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                @if($users->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    <div class="pagination-wrapper">
                        {{ $users->links() }}
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
            @else
                <!-- Empty State -->
                <div class="text-center py-5">
                    <div class="empty-state-icon mb-4">
                        <i class="bi bi-people" style="font-size: 4rem; color: var(--primary-color);"></i>
                    </div>
                    <h4 class="text-muted mb-2">Belum ada user</h4>
                    <p class="text-muted mb-4">Mulai dengan menambahkan user pertama ke sistem</p>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-plus-circle me-2"></i>
                        Tambah User Pertama
                    </a>
                </div>
            @endif
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

/* Table Styling */
.table {
    margin-bottom: 0;
}

    .table th {
    border-top: none;
    border-bottom: 2px solid var(--border-color);
        font-weight: 600;
    color: var(--dark-color);
    background: rgba(30, 64, 175, 0.02);
    }

    .table td {
    border-top: 1px solid var(--border-color);
        vertical-align: middle;
    padding: 1rem 0.75rem;
}

.table tbody tr:hover {
    background-color: rgba(30, 64, 175, 0.02);
}

/* User Avatar */
    .user-avatar {
    width: 2.5rem;
    height: 2.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
}

.user-email {
    font-weight: 500;
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
.btn-outline-primary {
    border-color: var(--primary-color);
    color: var(--primary-color);
}

.btn-outline-primary:hover {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
}

.btn-outline-warning {
    border-color: #f59e0b;
    color: #f59e0b;
}

.btn-outline-warning:hover {
    background-color: #f59e0b;
    border-color: #f59e0b;
    color: white;
}

.btn-outline-danger {
    border-color: #ef4444;
    color: #ef4444;
}

.btn-outline-danger:hover {
    background-color: #ef4444;
    border-color: #ef4444;
    color: white;
}

.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}

.btn-primary:hover {
    background-color: var(--primary-dark);
    border-color: var(--primary-dark);
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

.empty-state-icon {
    opacity: 0.7;
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-header {
        padding: 1.5rem;
    }
    
    .page-title {
        font-size: 1.5rem;
    }
    
    .table-responsive {
        font-size: 0.875rem;
    }
    
    .btn-group {
        flex-direction: column;
        gap: 0.25rem;
    }
    
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
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
    
    .table th,
    .table td {
        padding: 0.5rem 0.25rem;
    }
    
    .user-avatar {
        width: 2rem;
        height: 2rem;
        margin-right: 0.5rem !important;
        }
    }
    </style>
@endsection 