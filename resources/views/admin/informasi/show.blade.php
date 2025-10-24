<!DOCTYPE html>
<html>
<head>
    <title>Detail Informasi - SMK Negeri 4</title>
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
                    <h1 class="page-title">Detail Informasi</h1>
                    <p class="page-subtitle">{{ $informasi->title }}</p>
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
                <div class="detail-container">
                    <div class="detail-card">
                        <div class="card-header">
                            <div class="header-content">
                                <h2>
                                    @switch($informasi->category)
                                        @case('news') <i class="bi bi-newspaper"></i> @break
                                        @case('announcement') <i class="bi bi-megaphone"></i> @break
                                        @case('academic') <i class="bi bi-book"></i> @break
                                        @case('event') <i class="bi bi-calendar-event"></i> @break
                                        @case('other') <i class="bi bi-info-circle"></i> @break
                                        @default <i class="bi bi-file-text"></i>
                                    @endswitch
                                    {{ $informasi->title }}
                                </h2>
                                <div class="meta-info">
                                    <span class="category-badge {{ $informasi->category }}">
                                        {{ ucfirst($informasi->category) }}
                                    </span>
                                    <span class="status-badge {{ $informasi->status ? 'active' : 'inactive' }}">
                                        {{ $informasi->status ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="info-grid">
                                <div class="info-item">
                                    <label><i class="bi bi-person"></i> Penulis:</label>
                                    <span>{{ $informasi->author }}</span>
                                </div>
                                <div class="info-item">
                                    <label><i class="bi bi-calendar"></i> Tanggal Publikasi:</label>
                                    <span>{{ $informasi->published_at->format('d F Y H:i') }}</span>
                                </div>
                                <div class="info-item">
                                    <label><i class="bi bi-clock"></i> Dibuat:</label>
                                    <span>{{ $informasi->created_at->format('d F Y H:i') }}</span>
                                </div>
                                <div class="info-item">
                                    <label><i class="bi bi-pencil"></i> Terakhir Update:</label>
                                    <span>{{ $informasi->updated_at->format('d F Y H:i') }}</span>
                                </div>
                            </div>

                            @if($informasi->description)
                                <div class="description-section">
                                    <h4>Deskripsi</h4>
                                    <p>{{ $informasi->description }}</p>
                                </div>
                            @endif

                            @if($informasi->content)
                                <div class="content-section">
                                    <h4>Konten</h4>
                                    <div class="content-text">
                                        {!! nl2br(e($informasi->content)) !!}
                                    </div>
                                </div>
                            @endif

                            @if($informasi->image)
                                <div class="image-section">
                                    <h4>Gambar</h4>
                                    <div class="image-container">
                                        <img src="{{ asset($informasi->image) }}" alt="{{ $informasi->title }}" class="detail-image">
                                    </div>
                                </div>
                            @endif

                            <div class="action-buttons">
                                <a href="{{ route('admin.informasi.edit', $informasi->id) }}" class="btn btn-primary">
                                    <i class="bi bi-pencil"></i> Edit Informasi
                                </a>
                                <a href="{{ route('admin.informasi.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <form action="{{ route('admin.informasi.destroy', $informasi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus informasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
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
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
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
        border-left-color: #60a5fa;
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
        background: rgba(239, 68, 68, 0.1);
        color: #fca5a5;
        border: 1px solid rgba(239, 68, 68, 0.3);
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
        background: rgba(239, 68, 68, 0.2);
        color: #fecaca;
    }

    /* Main Content */
    .main-content {
        flex: 1;
        margin-left: 280px;
        background: #f8fafc;
    }

    .content-header {
        background: white;
        padding: 2rem;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
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

    /* Detail Container */
    .detail-container {
        max-width: 1000px;
        margin: 0 auto;
    }

    .detail-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        border: 1px solid #e2e8f0;
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        color: white;
        padding: 2rem;
    }

    .header-content h2 {
        margin: 0 0 1rem 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 600;
        font-size: 1.75rem;
    }

    .meta-info {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .category-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 500;
        text-transform: uppercase;
        background: rgba(255, 255, 255, 0.2);
    }

    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .status-badge.active {
        background: rgba(34, 197, 94, 0.2);
        color: #22c55e;
    }

    .status-badge.inactive {
        background: rgba(239, 68, 68, 0.2);
        color: #ef4444;
    }

    .card-body {
        padding: 2rem;
    }

    /* Info Grid */
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: #f8fafc;
        border-radius: 8px;
    }

    .info-item {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .info-item label {
        font-weight: 600;
        color: #374151;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .info-item span {
        color: #64748b;
        font-size: 0.875rem;
    }

    /* Content Sections */
    .description-section,
    .content-section,
    .image-section {
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: #f8fafc;
        border-radius: 8px;
    }

    .description-section h4,
    .content-section h4,
    .image-section h4 {
        color: #1e293b;
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .description-section p,
    .content-text {
        color: #64748b;
        line-height: 1.6;
    }

    .image-container {
        text-align: center;
    }

    .detail-image {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 1rem;
        justify-content: flex-start;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #e5e7eb;
        flex-wrap: wrap;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
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
        background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        color: white;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #7c3aed, #6d28d9);
        transform: translateY(-1px);
    }

    .btn-secondary {
        background: #6b7280;
        color: white;
    }

    .btn-secondary:hover {
        background: #4b5563;
        color: white;
    }

    .btn-danger {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        transform: translateY(-1px);
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
        
        .action-buttons {
            flex-direction: column;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
        }
        
        .meta-info {
            flex-direction: column;
            align-items: flex-start;
        }
    }
    </style>
</body>
</html> 