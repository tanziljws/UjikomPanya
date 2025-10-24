<!DOCTYPE html>
<html>
<head>
    <title>Laporan - SMK Negeri 4</title>
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
                <a href="{{ route('admin.informasi.index') }}" class="nav-item" data-section="informasi">
                    <i class="bi bi-info-circle"></i>
                    <span>Manajemen Informasi</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="nav-item" data-section="settings">
                    <i class="bi bi-gear"></i>
                    <span>Pengaturan</span>
                </a>
                <a href="{{ route('admin.reports.index') }}" class="nav-item active" data-section="reports">
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
                    <h1 class="page-title">Laporan</h1>
                    <p class="page-subtitle">Lihat laporan dan statistik sistem</p>
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
                        <h2>Laporan Sistem</h2>
                        <p class="text-muted">Laporan dan statistik website sekolah</p>
                    </div>
                    <div class="header-actions">
                        <button class="btn btn-primary">
                            <i class="bi bi-download"></i> Export Laporan
                        </button>
                    </div>
                </div>

                <div class="reports-grid">
                    <div class="report-card">
                        <div class="card-header">
                            <h5><i class="bi bi-graph-up"></i> Laporan Pengunjung</h5>
                        </div>
                        <div class="card-body">
                            <p>Statistik pengunjung website per bulan</p>
                            <div class="card-actions">
                                <button class="btn btn-sm btn-outline-primary">Lihat Detail</button>
                                <button class="btn btn-sm btn-outline-secondary">Download</button>
                            </div>
                        </div>
                    </div>

                    <div class="report-card">
                        <div class="card-header">
                            <h5><i class="bi bi-people"></i> Laporan User</h5>
                        </div>
                        <div class="card-body">
                            <p>Data user yang terdaftar di sistem</p>
                            <div class="card-actions">
                                <button class="btn btn-sm btn-outline-primary">Lihat Detail</button>
                                <button class="btn btn-sm btn-outline-secondary">Download</button>
                            </div>
                        </div>
                    </div>

                    <div class="report-card">
                        <div class="card-header">
                            <h5><i class="bi bi-images"></i> Laporan Galeri</h5>
                        </div>
                        <div class="card-body">
                            <p>Statistik foto dan galeri sekolah</p>
                            <div class="card-actions">
                                <button class="btn btn-sm btn-outline-primary">Lihat Detail</button>
                                <button class="btn btn-sm btn-outline-secondary">Download</button>
                            </div>
                        </div>
                    </div>

                    <div class="report-card">
                        <div class="card-header">
                            <h5><i class="bi bi-calendar-event"></i> Laporan Agenda</h5>
                        </div>
                        <div class="card-body">
                            <p>Laporan agenda dan kegiatan sekolah</p>
                            <div class="card-actions">
                                <button class="btn btn-sm btn-outline-primary">Lihat Detail</button>
                                <button class="btn btn-sm btn-outline-secondary">Download</button>
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

    /* Reports Grid */
    .reports-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .report-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(128, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .report-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        padding: 1.5rem;
    }

    .card-header h5 {
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-body p {
        color: #64748b;
        margin-bottom: 1rem;
    }

    .card-actions {
        display: flex;
        gap: 0.5rem;
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

    .btn-outline-secondary {
        background: transparent;
        color: #6b7280;
        border: 1px solid #6b7280;
    }

    .btn-outline-secondary:hover {
        background: #6b7280;
        color: white;
    }

    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
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
        
        .reports-grid {
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