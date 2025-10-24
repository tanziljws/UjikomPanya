<!DOCTYPE html>
<html>
<head>
    <title>Manajemen User - SMK Negeri 4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <div class="admin-dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="logo-container">
                    <img src="{{ asset('images/logosmkn4.png') }}" alt="SMK Negeri 4" class="sidebar-logo">
                </div>
                <h4 class="sidebar-title">Admin Panel</h4>
            </div>
            
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="nav-item" data-section="dashboard">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.galeri.index') }}" class="nav-item" data-section="galeri">
                    <i class="bi bi-images"></i>
                    <span>Manajemen Galeri</span>
                </a>
                <a href="{{ route('admin.users.index') }}" class="nav-item active" data-section="users">
                    <i class="bi bi-people"></i>
                    <span>Manajemen User</span>
                </a>
                <a href="{{ route('admin.content.index') }}" class="nav-item" data-section="content">
                    <i class="bi bi-file-text"></i>
                    <span>Manajemen Konten</span>
                </a>
                <a href="{{ route('admin.agenda.index') }}" class="nav-item" data-section="agenda">
                    <i class="bi bi-calendar-event"></i>
                    <span>Manajemen Agenda</span>
                </a>
                <a href="{{ route('admin.informasi.index') }}" class="nav-item" data-section="informasi">
                    <i class="bi bi-info-circle"></i>
                    <span>Manajemen Informasi</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="nav-item" data-section="settings">
                    <i class="bi bi-gear"></i>
                    <span>Pengaturan</span>
                </a>
                <a href="{{ route('admin.reports.index') }}" class="nav-item" data-section="reports">
                    <i class="bi bi-graph-up"></i>
                    <span>Laporan</span>
                </a>
            </nav>
            
            <div class="sidebar-footer">
                <form method="POST" action="{{ route('admin.logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="content-header">
                <div class="header-left">
                    <h1 class="page-title">Manajemen User</h1>
                    <p class="page-subtitle">Kelola data pengguna sistem</p>
                </div>
                <div class="header-right">
                    <div class="admin-info">
                        <div class="admin-avatar">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <div class="admin-details">
                            <span class="admin-name">Administrator</span>
                            <span class="admin-role">Super Admin</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Content -->
            <div class="content-section active">
                <div class="section-header">
                    <div class="header-left">
                        <h2>Daftar User</h2>
                        <p class="text-muted">Total {{ $users->count() }} user terdaftar</p>
                    </div>
                    <div class="header-actions">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah User
                        </a>
                    </div>
                </div>

                <!-- Alert Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- User Table -->
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Terdaftar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">
                                            <i class="bi bi-person-circle"></i>
                                        </div>
                                        <div class="user-details">
                                            <div class="user-name">{{ $user->name }}</div>
                                            <div class="user-id">ID: {{ $user->id }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="email-info">
                                        <span class="email-text">{{ $user->email }}</span>
                                        @if($user->email_verified_at)
                                            <span class="verified-badge">
                                                <i class="bi bi-check-circle-fill"></i> Terverifikasi
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <span class="role-badge role-{{ $user->role ?? 'user' }}">
                                        {{ ucfirst($user->role ?? 'user') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $user->status ?? 'active' }}">
                                        {{ ucfirst($user->status ?? 'active') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="date-info">
                                        <div class="created-date">{{ $user->created_at ? $user->created_at->format('d M Y') : 'N/A' }}</div>
                                        <div class="created-time">{{ $user->created_at ? $user->created_at->format('H:i') : '' }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" 
                                           class="btn btn-sm btn-outline-primary" 
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        
                                        @if($user->id !== auth()->id())
                                            <form action="{{ route('admin.users.toggle-status', $user->id) }}" 
                                                  method="POST" 
                                                  style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-outline-warning" 
                                                        title="{{ $user->status === 'active' ? 'Nonaktifkan' : 'Aktifkan' }}"
                                                        onclick="return confirm('Apakah Anda yakin ingin {{ $user->status === 'active' ? 'menonaktifkan' : 'mengaktifkan' }} user ini?')">
                                                    <i class="bi bi-{{ $user->status === 'active' ? 'lock' : 'unlock' }}"></i>
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" 
                                                  method="POST" 
                                                  style="display:inline;"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-outline-danger" 
                                                        title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-muted small">Akun Anda</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <div class="empty-state">
                                        <i class="bi bi-people"></i>
                                        <h5>Belum ada data user</h5>
                                        <p class="text-muted">Mulai dengan menambahkan user pertama</p>
                                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                                            <i class="bi bi-plus"></i> Tambah User Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700;800&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: linear-gradient(135deg, #1a1a1a 0%, #2d1b1b 100%);
    }

    .admin-dashboard {
        display: flex;
        min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
        width: 280px;
        background: linear-gradient(135deg, #800000 0%, #4a0000 100%);
        color: white;
        display: flex;
        flex-direction: column;
        position: fixed;
        height: 100vh;
        overflow-y: auto;
    }

    .sidebar-header {
        padding: 2rem 1.5rem;
        text-align: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sidebar-logo {
        width: 60px;
        height: 70px;
        object-fit: contain;
        margin-bottom: 1rem;
        filter: drop-shadow(0 4px 8px rgba(255, 255, 255, 0.2));
    }

    .sidebar-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 1.2rem;
        margin: 0;
    }

    .sidebar-nav {
        flex: 1;
        padding: 1rem 0;
    }

    .nav-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.875rem 1.5rem;
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: all 0.3s ease;
        border-left: 3px solid transparent;
    }

    .nav-item:hover,
    .nav-item.active {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border-left-color: #ffd700;
    }

    .nav-item i {
        font-size: 1.1rem;
        width: 20px;
    }

    .sidebar-footer {
        padding: 1rem 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logout-form {
        margin: 0;
    }

    .logout-btn {
        width: 100%;
        background: rgba(255, 215, 0, 0.1);
        color: #ffd700;
        border: 1px solid rgba(255, 215, 0, 0.3);
        border-radius: 8px;
        padding: 0.75rem 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .logout-btn:hover {
        background: rgba(255, 215, 0, 0.2);
        color: #fff3cd;
    }

    /* Main Content */
    .main-content {
        flex: 1;
        margin-left: 280px;
        background: linear-gradient(135deg, #1a1a1a 0%, #2d1b1b 100%);
    }

    .content-header {
        background: rgba(255, 255, 255, 0.95);
        padding: 2rem;
        border-bottom: 1px solid rgba(128, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        backdrop-filter: blur(10px);
    }

    .page-title {
        font-family: 'Poppins', sans-serif;
        font-size: 1.875rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0 0 0.5rem 0;
    }

    .page-subtitle {
        color: #64748b;
        margin: 0;
    }

    .admin-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .admin-avatar {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #60a5fa, #a78bfa);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }

    .admin-details {
        display: flex;
        flex-direction: column;
    }

    .admin-name {
        font-weight: 600;
        color: #1e293b;
    }

    .admin-role {
        font-size: 0.875rem;
        color: #64748b;
    }

    /* Content Section */
    .content-section {
        padding: 2rem;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .section-header h2 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: #1e293b;
        margin: 0;
    }

    .header-actions {
        display: flex;
        gap: 1rem;
    }

    /* Table Container */
    .table-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        border: 1px solid #e2e8f0;
        overflow: hidden;
    }

    .table {
        margin: 0;
    }

    .table th {
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        font-weight: 600;
        color: #374151;
        padding: 1rem;
    }

    .table td {
        padding: 1rem;
        border-bottom: 1px solid #e2e8f0;
        vertical-align: middle;
    }

    /* User Info */
    .user-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #60a5fa, #a78bfa);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }

    .user-details {
        display: flex;
        flex-direction: column;
    }

    .user-name {
        font-weight: 600;
        color: #1e293b;
    }

    .user-id {
        font-size: 0.75rem;
        color: #64748b;
    }

    /* Email Info */
    .email-info {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .email-text {
        font-weight: 500;
        color: #1e293b;
    }

    .verified-badge {
        font-size: 0.75rem;
        color: #059669;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    /* Role Badge */
    .role-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .role-user {
        background: #dbeafe;
        color: #1e40af;
    }

    .role-admin {
        background: #fef3c7;
        color: #d97706;
    }

    /* Status Badge */
    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .status-active {
        background: #dcfce7;
        color: #166534;
    }

    .status-inactive {
        background: #fee2e2;
        color: #991b1b;
    }

    /* Date Info */
    .date-info {
        display: flex;
        flex-direction: column;
    }

    .created-date {
        font-weight: 500;
        color: #1e293b;
    }

    .created-time {
        font-size: 0.75rem;
        color: #64748b;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .action-buttons .btn {
        padding: 0.375rem 0.5rem;
    }

    /* Empty State */
    .empty-state {
        padding: 3rem 2rem;
        text-align: center;
    }

    .empty-state i {
        font-size: 4rem;
        color: #cbd5e1;
        margin-bottom: 1rem;
    }

    .empty-state h5 {
        color: #64748b;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: #94a3b8;
        margin-bottom: 1.5rem;
    }

    /* Alert Styles */
    .alert {
        border-radius: 8px;
        border: none;
        margin-bottom: 1.5rem;
        padding: 1rem 1.5rem;
    }

    .alert-success {
        background: #dcfce7;
        color: #166534;
    }

    .alert-danger {
        background: #fee2e2;
        color: #991b1b;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .sidebar {
            width: 240px;
        }
        
        .main-content {
            margin-left: 240px;
        }
    }

    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        
        .sidebar.open {
            transform: translateX(0);
        }
        
        .main-content {
            margin-left: 0;
        }
        
        .section-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .user-info {
            flex-direction: column;
            text-align: center;
        }
    }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 