<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin - SMK Negeri 4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
                <p class="sidebar-subtitle">SMK Negeri 4 Kota Bogor</p>
            </div>
            
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="nav-item active">
                    <div class="nav-icon">
                    <i class="bi bi-speedometer2"></i>
                    </div>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.galeri.index') }}" class="nav-item">
                    <div class="nav-icon">
                    <i class="bi bi-images"></i>
                    </div>
                    <span>Manajemen Galeri</span>
                </a>
                <a href="{{ route('admin.users.index') }}" class="nav-item">
                    <div class="nav-icon">
                    <i class="bi bi-people"></i>
                    </div>
                    <span>Manajemen User</span>
                </a>
                <a href="{{ route('admin.content.index') }}" class="nav-item">
                    <div class="nav-icon">
                    <i class="bi bi-file-text"></i>
                    </div>
                    <span>Manajemen Konten</span>
                </a>
                <a href="{{ route('admin.agenda.index') }}" class="nav-item">
                    <div class="nav-icon">
                    <i class="bi bi-calendar-event"></i>
                    </div>
                    <span>Manajemen Agenda</span>
                </a>
                <a href="{{ route('admin.informasi.index') }}" class="nav-item">
                    <div class="nav-icon">
                    <i class="bi bi-info-circle"></i>
                    </div>
                    <span>Manajemen Informasi</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="nav-item">
                    <div class="nav-icon">
                    <i class="bi bi-gear"></i>
                    </div>
                    <span>Pengaturan</span>
                </a>
                <a href="{{ route('admin.reports.index') }}" class="nav-item">
                    <div class="nav-icon">
                    <i class="bi bi-graph-up"></i>
                    </div>
                    <span>Laporan</span>
                </a>
            </nav>
            
            <div class="sidebar-footer">
                <div class="admin-profile">
                    <div class="admin-avatar">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="admin-info">
                        <span class="admin-name">Administrator</span>
                        <span class="admin-role">Super Admin</span>
                    </div>
                </div>
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
                    <div class="breadcrumb-nav">
                        <span class="breadcrumb-item">Dashboard</span>
                        <i class="bi bi-chevron-right"></i>
                        <span class="breadcrumb-item active">Overview</span>
                    </div>
                    <h1 class="page-title">Dashboard Overview</h1>
                    <p class="page-subtitle">Selamat datang kembali, Administrator!</p>
                </div>
                <div class="header-right">
                    <div class="header-actions">
                        <button class="action-btn notification-btn">
                            <i class="bi bi-bell"></i>
                            <span class="notification-badge">3</span>
                        </button>
                        <button class="action-btn">
                            <i class="bi bi-gear"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon users-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="stat-trend positive">
                            <i class="bi bi-arrow-up"></i>
                            <span>12%</span>
                        </div>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number">1,247</h3>
                            <p class="stat-label">Total Users</p>
                        <span class="stat-change">+142 dari bulan lalu</span>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon gallery-icon">
                            <i class="bi bi-images"></i>
                        </div>
                        <div class="stat-trend positive">
                            <i class="bi bi-arrow-up"></i>
                            <span>8%</span>
                        </div>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number">156</h3>
                            <p class="stat-label">Foto Galeri</p>
                        <span class="stat-change">+12 dari bulan lalu</span>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon agenda-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <div class="stat-trend neutral">
                            <i class="bi bi-dash"></i>
                            <span>0%</span>
                        </div>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number">23</h3>
                            <p class="stat-label">Agenda Aktif</p>
                        <span class="stat-change">Tidak berubah</span>
                        </div>
                    </div>
                    
                    <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon views-icon">
                            <i class="bi bi-eye"></i>
                        </div>
                        <div class="stat-trend positive">
                            <i class="bi bi-arrow-up"></i>
                            <span>25%</span>
                        </div>
                        </div>
                        <div class="stat-content">
                            <h3 class="stat-number">8,942</h3>
                            <p class="stat-label">Total Views</p>
                        <span class="stat-change">+1,789 dari bulan lalu</span>
                        </div>
                    </div>
                </div>

            <!-- Dashboard Grid -->
                <div class="dashboard-grid">
                <!-- Recent Activities -->
                <div class="dashboard-card activity-card">
                        <div class="card-header">
                        <div class="header-content">
                            <h5>Aktivitas Terbaru</h5>
                            <p>Daftar aktivitas sistem terbaru</p>
                        </div>
                        <a href="#" class="view-all-btn">
                            <span>Lihat Semua</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                        </div>
                        <div class="activity-list">
                            <div class="activity-item">
                            <div class="activity-icon success">
                                    <i class="bi bi-plus-circle"></i>
                                </div>
                                <div class="activity-content">
                                    <p class="activity-text">Foto baru ditambahkan ke galeri</p>
                                    <span class="activity-time">2 menit yang lalu</span>
                                </div>
                            <div class="activity-status">
                                <span class="status-badge success">Selesai</span>
                            </div>
                                </div>
                        
                            <div class="activity-item">
                            <div class="activity-icon warning">
                                <i class="bi bi-exclamation-triangle"></i>
                                </div>
                                <div class="activity-content">
                                <p class="activity-text">User baru mendaftar</p>
                                <span class="activity-time">15 menit yang lalu</span>
                                </div>
                            <div class="activity-status">
                                <span class="status-badge warning">Pending</span>
                        </div>
                    </div>

                        <div class="activity-item">
                            <div class="activity-icon info">
                                <i class="bi bi-calendar-plus"></i>
                            </div>
                            <div class="activity-content">
                                <p class="activity-text">Agenda baru dibuat</p>
                                <span class="activity-time">1 jam yang lalu</span>
                        </div>
                            <div class="activity-status">
                                <span class="status-badge info">Baru</span>
                        </div>
                    </div>
                </div>
            </div>

                <!-- Quick Actions -->
                <div class="dashboard-card quick-actions-card">
                        <div class="card-header">
                        <div class="header-content">
                            <h5>Aksi Cepat</h5>
                            <p>Fitur-fitur yang sering digunakan</p>
                        </div>
                        </div>
                    <div class="quick-actions-grid">
                        <a href="{{ route('admin.galeri.create') }}" class="quick-action-item">
                            <div class="action-icon">
                                <i class="bi bi-plus-lg"></i>
                    </div>
                            <span>Tambah Foto</span>
                        </a>
                        <a href="{{ route('admin.users.create') }}" class="quick-action-item">
                            <div class="action-icon">
                                <i class="bi bi-person-plus"></i>
                        </div>
                            <span>Tambah User</span>
                        </a>
                        <a href="{{ route('admin.agenda.create') }}" class="quick-action-item">
                            <div class="action-icon">
                                <i class="bi bi-calendar-plus"></i>
                        </div>
                            <span>Buat Agenda</span>
                        </a>
                        <a href="{{ route('admin.informasi.create') }}" class="quick-action-item">
                            <div class="action-icon">
                                <i class="bi bi-file-earmark-plus"></i>
                    </div>
                            <span>Buat Informasi</span>
                        </a>
                </div>
            </div>

                <!-- System Status -->
                <div class="dashboard-card system-status-card">
                        <div class="card-header">
                        <div class="header-content">
                            <h5>Status Sistem</h5>
                            <p>Kondisi sistem saat ini</p>
                        </div>
                            </div>
                    <div class="system-status-list">
                        <div class="status-item">
                            <div class="status-indicator online"></div>
                            <div class="status-content">
                                <span class="status-label">Web Server</span>
                                <span class="status-value">Online</span>
                            </div>
                            </div>
                        <div class="status-item">
                            <div class="status-indicator online"></div>
                            <div class="status-content">
                                <span class="status-label">Database</span>
                                <span class="status-value">Online</span>
                        </div>
                    </div>
                        <div class="status-item">
                            <div class="status-indicator online"></div>
                            <div class="status-content">
                                <span class="status-label">File Storage</span>
                                <span class="status-value">Online</span>
                        </div>
                            </div>
                        <div class="status-item">
                            <div class="status-indicator warning"></div>
                            <div class="status-content">
                                <span class="status-label">Backup System</span>
                                <span class="status-value">Pending</span>
                            </div>
                    </div>
                </div>
            </div>

                <!-- Recent Users -->
                <div class="dashboard-card recent-users-card">
                        <div class="card-header">
                        <div class="header-content">
                            <h5>User Terbaru</h5>
                            <p>User yang baru mendaftar</p>
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="view-all-btn">
                            <span>Lihat Semua</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                            </div>
                    <div class="users-list">
                        <div class="user-item">
                            <div class="user-avatar">
                                <i class="bi bi-person"></i>
                            </div>
                            <div class="user-info">
                                <span class="user-name">Ahmad Fadillah</span>
                                <span class="user-role">Siswa</span>
                            </div>
                            <div class="user-status">
                                <span class="status-badge success">Aktif</span>
                        </div>
                    </div>
                        <div class="user-item">
                            <div class="user-avatar">
                                <i class="bi bi-person"></i>
                        </div>
                            <div class="user-info">
                                <span class="user-name">Siti Nurhaliza</span>
                                <span class="user-role">Guru</span>
                            </div>
                            <div class="user-status">
                                <span class="status-badge success">Aktif</span>
                            </div>
                            </div>
                        <div class="user-item">
                            <div class="user-avatar">
                                <i class="bi bi-person"></i>
                        </div>
                            <div class="user-info">
                                <span class="user-name">Budi Santoso</span>
                                <span class="user-role">Staff</span>
                    </div>
                            <div class="user-status">
                                <span class="status-badge warning">Pending</span>
                        </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: linear-gradient(135deg, #1a1a1a 0%, #1a2332 100%);
        color: #ffffff;
        overflow-x: hidden;
    }

    .admin-dashboard {
        display: flex;
        min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
        width: 280px;
        background: linear-gradient(180deg, #1e3a8a 0%, #1e40af 100%);
        color: white;
        display: flex;
        flex-direction: column;
        position: fixed;
        height: 100vh;
        overflow-y: auto;
        box-shadow: 4px 0 20px rgba(0, 0, 0, 0.3);
    }

    .sidebar-header {
        padding: 2rem 1.5rem;
        text-align: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
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
        font-weight: 700;
        font-size: 1.2rem;
        margin: 0 0 0.5rem 0;
    }

    .sidebar-subtitle {
        font-size: 0.85rem;
        opacity: 0.8;
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
        position: relative;
        margin: 0.25rem 0;
    }

    .nav-item:hover,
    .nav-item.active {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border-left-color: #60a5fa;
        transform: translateX(5px);
    }

    .nav-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .nav-item:hover .nav-icon,
    .nav-item.active .nav-icon {
        background: rgba(96, 165, 250, 0.2);
        transform: scale(1.1);
    }

    .nav-item i {
        font-size: 1.1rem;
    }

    .sidebar-footer {
        padding: 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        background: rgba(0, 0, 0, 0.1);
    }

    .admin-profile {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1rem;
        padding: 0.75rem;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
    }

    .admin-avatar {
        width: 40px;
        height: 40px;
        background: rgba(96, 165, 250, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: #60a5fa;
    }

    .admin-info {
        flex: 1;
    }

    .admin-name {
        display: block;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .admin-role {
        display: block;
        font-size: 0.8rem;
        opacity: 0.7;
    }

    .logout-form {
        margin: 0;
    }

    .logout-btn {
        width: 100%;
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
        border: 1px solid rgba(239, 68, 68, 0.3);
        border-radius: 10px;
        padding: 0.75rem 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        cursor: pointer;
        font-weight: 500;
    }

    .logout-btn:hover {
        background: rgba(239, 68, 68, 0.2);
        color: #fca5a5;
        transform: translateY(-2px);
    }

    /* Main Content */
    .main-content {
        flex: 1;
        margin-left: 280px;
        background: linear-gradient(135deg, #1a1a1a 0%, #1a2332 100%);
        min-height: 100vh;
        padding: 2rem;
    }

    /* Header */
    .content-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .breadcrumb-nav {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        opacity: 0.7;
    }

    .breadcrumb-item {
        color: rgba(255, 255, 255, 0.7);
    }

    .breadcrumb-item.active {
        color: #60a5fa;
        font-weight: 600;
    }

    .page-title {
        font-family: 'Poppins', sans-serif;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, #ffffff, #60a5fa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .page-subtitle {
        color: rgba(255, 255, 255, 0.7);
        font-size: 1rem;
        margin: 0;
    }

    .header-actions {
        display: flex;
        gap: 0.75rem;
    }

    .action-btn {
        width: 45px;
        height: 45px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: all 0.3s ease;
        position: relative;
        cursor: pointer;
    }

    .action-btn:hover {
        background: rgba(96, 165, 250, 0.2);
        border-color: #60a5fa;
        transform: translateY(-2px);
    }

    .notification-btn {
        position: relative;
    }

    .notification-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background: #ef4444;
        color: white;
        font-size: 0.7rem;
        padding: 0.2rem 0.4rem;
        border-radius: 10px;
        min-width: 18px;
        text-align: center;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #60a5fa, #3b82f6);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        border-color: rgba(96, 165, 250, 0.3);
    }

    .stat-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
    }

    .users-icon {
        background: linear-gradient(135deg, #60a5fa, #3b82f6);
    }

    .gallery-icon {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .agenda-icon {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }

    .views-icon {
        background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    }

    .stat-trend {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        font-size: 0.8rem;
        font-weight: 600;
        padding: 0.25rem 0.5rem;
        border-radius: 8px;
    }

    .stat-trend.positive {
        background: rgba(16, 185, 129, 0.2);
        color: #10b981;
    }

    .stat-trend.neutral {
        background: rgba(156, 163, 175, 0.2);
        color: #9ca3af;
    }

    .stat-number {
        font-family: 'Poppins', sans-serif;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
        color: white;
    }

    .stat-label {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .stat-change {
        color: rgba(255, 255, 255, 0.5);
        font-size: 0.8rem;
    }

    /* Dashboard Grid */
    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 1.5rem;
    }

    .dashboard-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 1.5rem;
        transition: all 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        border-color: rgba(96, 165, 250, 0.2);
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .header-content h5 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        margin-bottom: 0.25rem;
        color: white;
    }

    .header-content p {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.9rem;
        margin: 0;
    }

    .view-all-btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #60a5fa;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .view-all-btn:hover {
        color: #93c5fd;
        transform: translateX(3px);
    }

    /* Activity List */
    .activity-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .activity-item:hover {
        background: rgba(255, 255, 255, 0.08);
        transform: translateX(5px);
    }

    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: white;
    }

    .activity-icon.success {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .activity-icon.warning {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }

    .activity-icon.info {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
    }

    .activity-content {
        flex: 1;
    }

    .activity-text {
        color: white;
        font-weight: 500;
        margin-bottom: 0.25rem;
    }

    .activity-time {
        color: rgba(255, 255, 255, 0.5);
        font-size: 0.8rem;
    }

    .activity-status {
        display: flex;
        align-items: center;
    }

    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .status-badge.success {
        background: rgba(16, 185, 129, 0.2);
        color: #10b981;
    }

    .status-badge.warning {
        background: rgba(245, 158, 11, 0.2);
        color: #f59e0b;
    }

    .status-badge.info {
        background: rgba(59, 130, 246, 0.2);
        color: #3b82f6;
    }

    /* Quick Actions */
    .quick-actions-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .quick-action-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.75rem;
        padding: 1.5rem;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 15px;
        text-decoration: none;
        color: white;
        transition: all 0.3s ease;
    }

    .quick-action-item:hover {
        background: rgba(96, 165, 250, 0.1);
        transform: translateY(-3px);
        color: #60a5fa;
    }

    .action-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #60a5fa, #3b82f6);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: white;
    }

    .quick-action-item:hover .action-icon {
        transform: scale(1.1);
    }

    /* System Status */
    .system-status-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .status-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 12px;
    }

    .status-indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        position: relative;
    }

    .status-indicator.online {
        background: #10b981;
        box-shadow: 0 0 10px rgba(16, 185, 129, 0.5);
    }

    .status-indicator.warning {
        background: #f59e0b;
        box-shadow: 0 0 10px rgba(245, 158, 11, 0.5);
    }

    .status-content {
        flex: 1;
    }

    .status-label {
        display: block;
        color: white;
        font-weight: 500;
        margin-bottom: 0.25rem;
    }

    .status-value {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9rem;
    }

    /* Users List */
    .users-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .user-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .user-item:hover {
        background: rgba(255, 255, 255, 0.08);
        transform: translateX(5px);
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #60a5fa, #3b82f6);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: white;
    }

    .user-info {
        flex: 1;
    }

    .user-name {
        display: block;
        color: white;
        font-weight: 500;
        margin-bottom: 0.25rem;
    }

    .user-role {
        color: rgba(255, 255, 255, 0.6);
        font-size: 0.8rem;
    }

    .user-status {
        display: flex;
        align-items: center;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }
        
        .main-content {
            margin-left: 0;
            padding: 1rem;
        }
        
        .admin-dashboard {
            flex-direction: column;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .quick-actions-grid {
            grid-template-columns: 1fr;
        }
        
        .content-header {
            flex-direction: column;
            gap: 1rem;
        }
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-card,
    .dashboard-card {
        animation: fadeInUp 0.6s ease-out;
    }

    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.2s; }
    .stat-card:nth-child(3) { animation-delay: 0.3s; }
    .stat-card:nth-child(4) { animation-delay: 0.4s; }

    .dashboard-card:nth-child(1) { animation-delay: 0.5s; }
    .dashboard-card:nth-child(2) { animation-delay: 0.6s; }
    .dashboard-card:nth-child(3) { animation-delay: 0.7s; }
    .dashboard-card:nth-child(4) { animation-delay: 0.8s; }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
