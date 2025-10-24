<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Informasi - SMK Negeri 4</title>
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
                <a href="{{ route('admin.users.index') }}" class="nav-item" data-section="users">
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
                <a href="{{ route('admin.informasi.index') }}" class="nav-item active" data-section="informasi">
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
                    <h1 class="page-title">Manajemen Informasi</h1>
                    <p class="page-subtitle">Kelola informasi dan berita sekolah</p>
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

            <!-- Content Section -->
            <div class="content-section active">
                <div class="section-header">
                    <div class="header-left">
                        <h2>Daftar Informasi</h2>
                        <p class="text-muted">Kelola informasi dan berita sekolah</p>
                    </div>
                    <div class="header-actions">
                        <a href="{{ route('admin.informasi.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah Informasi
                        </a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="informasi-grid">
                    @forelse($informasis as $informasi)
                        <div class="informasi-card">
                            <div class="card-header">
                                <h5>
                                    @switch($informasi->category)
                                        @case('news') <i class="bi bi-newspaper"></i> @break
                                        @case('announcement') <i class="bi bi-megaphone"></i> @break
                                        @case('academic') <i class="bi bi-book"></i> @break
                                        @case('event') <i class="bi bi-calendar-event"></i> @break
                                        @case('other') <i class="bi bi-info-circle"></i> @break
                                        @default <i class="bi bi-file-text"></i>
                                    @endswitch
                                    {{ $informasi->title }}
                                </h5>
                                <div class="card-meta">
                                    <span class="category-badge {{ $informasi->category }}">
                                        {{ ucfirst($informasi->category) }}
                                    </span>
                                    <span class="date">{{ $informasi->published_at->format('d M Y') }}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="author"><i class="bi bi-person"></i> {{ $informasi->author }}</p>
                                <p>{{ $informasi->description ?? 'Tidak ada deskripsi' }}</p>
                                @if($informasi->image)
                                    <div class="informasi-image">
                                        <img src="{{ asset($informasi->image) }}" alt="{{ $informasi->title }}" class="img-thumbnail">
                                    </div>
                                @endif
                                <div class="card-actions">
                                    <a href="{{ route('admin.informasi.show', $informasi->id) }}" class="btn btn-sm btn-outline-info">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('admin.informasi.edit', $informasi->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.informasi.destroy', $informasi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus informasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="text-center py-5">
                                <i class="bi bi-info-circle display-1 text-muted"></i>
                                <h4 class="mt-3">Belum ada informasi</h4>
                                <p class="text-muted">Mulai dengan menambahkan informasi pertama Anda</p>
                                <a href="{{ route('admin.informasi.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus"></i> Tambah Informasi Pertama
                                </a>
                            </div>
                        </div>
                    @endforelse
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
        background: #f8fafc;
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
        color: #800000;
        margin: 0 0 0.5rem 0;
    }

    .page-subtitle {
        color: #6c757d;
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
        background: linear-gradient(135deg, #800000, #4a0000);
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
        color: #800000;
    }

    .admin-role {
        font-size: 0.875rem;
        color: #6c757d;
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
        color: #800000;
        margin: 0;
    }

    .header-actions {
        display: flex;
        gap: 1rem;
    }

    /* Informasi Grid */
    .informasi-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 1.5rem;
    }

    .informasi-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(128, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .informasi-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        background: linear-gradient(135deg, #800000, #4a0000);
        color: white;
        padding: 1.5rem;
    }

    .card-header h5 {
        margin: 0 0 1rem 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
    }

    .card-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .category-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
        text-transform: uppercase;
        background: rgba(255, 255, 255, 0.2);
    }

    .date {
        font-size: 0.875rem;
        opacity: 0.9;
    }

    .card-body {
        padding: 1.5rem;
    }

    .author {
        color: #6c757d;
        font-size: 0.875rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .card-body p {
        color: #6c757d;
        margin-bottom: 1rem;
    }

    .card-actions {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .btn {
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        color: white;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #2563eb, #1e40af);
        transform: translateY(-1px);
    }

    .btn-outline-primary {
        background: transparent;
        color: #3b82f6;
        border: 1px solid #3b82f6;
    }

    .btn-outline-primary:hover {
        background: #3b82f6;
        color: white;
    }

    .btn-outline-info {
        background: transparent;
        color: #06b6d4;
        border: 1px solid #06b6d4;
    }

    .btn-outline-info:hover {
        background: #06b6d4;
        color: white;
    }

    .btn-outline-danger {
        background: transparent;
        color: #ef4444;
        border: 1px solid #ef4444;
    }

    .btn-outline-danger:hover {
        background: #ef4444;
        color: white;
    }

    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
    }

    /* Alert Styling */
    .alert {
        border: none;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .alert-success {
        background: rgba(34, 197, 94, 0.1);
        color: #16a34a;
        border-left: 4px solid #16a34a;
    }

    /* Informasi Image */
    .informasi-image {
        margin: 1rem 0;
    }

    .informasi-image img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
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
        
        .informasi-grid {
            grid-template-columns: 1fr;
        }
        
        .section-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
    }
    </style>
</body>
</html> 
</html> 