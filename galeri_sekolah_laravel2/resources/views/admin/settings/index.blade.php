<!DOCTYPE html>
<html>
<head>
    <title>Pengaturan Sistem - SMK Negeri 4</title>
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
                <a href="{{ route('admin.settings.index') }}" class="nav-item active" data-section="settings">
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
                    <h1 class="page-title">Pengaturan Sistem</h1>
                    <p class="page-subtitle">Kelola pengaturan website sekolah</p>
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
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="settings-grid">
                    <div class="settings-card">
                        <div class="card-header">
                            <h5><i class="bi bi-gear"></i> Pengaturan Umum</h5>
                        </div>
                        <div class="card-body">
                            <p>Pengaturan nama sekolah, logo, dan informasi dasar</p>
                            <a href="{{ route('admin.settings.edit') }}" class="btn btn-outline-primary">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                        </div>
                    </div>

                    <div class="settings-card">
                        <div class="card-header">
                            <h5><i class="bi bi-shield"></i> Keamanan</h5>
                        </div>
                        <div class="card-body">
                            <p>Pengaturan keamanan dan akses sistem</p>
                            <a href="{{ route('admin.settings.security') }}" class="btn btn-outline-primary">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                        </div>
                    </div>

                    <div class="settings-card">
                        <div class="card-header">
                            <h5><i class="bi bi-database"></i> Database</h5>
                        </div>
                        <div class="card-body">
                            <p>Pengaturan database dan backup sistem</p>
                            <a href="{{ route('admin.settings.database') }}" class="btn btn-outline-primary">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>

                <div class="current-settings">
                    <h3>Pengaturan Saat Ini</h3>
                    <div class="settings-info">
                        <div class="info-item">
                            <label>Nama Sekolah:</label>
                            <span>{{ $settings['school_name']['value'] ?? 'SMK Negeri 4' }}</span>
                        </div>
                        <div class="info-item">
                            <label>Alamat:</label>
                            <span>{{ $settings['school_address']['value'] ?? 'Belum diatur' }}</span>
                        </div>
                        <div class="info-item">
                            <label>Telepon:</label>
                            <span>{{ $settings['school_phone']['value'] ?? 'Belum diatur' }}</span>
                        </div>
                        <div class="info-item">
                            <label>Email:</label>
                            <span>{{ $settings['school_email']['value'] ?? 'Belum diatur' }}</span>
                        </div>
                        <div class="info-item">
                            <label>Website:</label>
                            <span>{{ $settings['school_website']['value'] ?? 'Belum diatur' }}</span>
                        </div>
                        <div class="info-item">
                            <label>Deskripsi:</label>
                            <span>{{ $settings['school_description']['value'] ?? 'Belum diatur' }}</span>
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
        background: linear-gradient(135deg, #1a1a1a 0%, #2d1b1b 100%);
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
        background: rgba(139, 0, 0, 0.2);
        color: white;
        border-left-color: #8B0000;
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
        background: rgba(139, 0, 0, 0.2);
        color: #ff6b6b;
        border: 1px solid rgba(139, 0, 0, 0.3);
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
        background: rgba(139, 0, 0, 0.3);
        color: #ff8a8a;
    }

    /* Main Content */
    .main-content {
        flex: 1;
        margin-left: 280px;
        background: #1a1a1a;
    }

    .content-header {
        background: #2d1b1b;
        padding: 2rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .page-title {
        font-family: 'Poppins', sans-serif;
        font-size: 1.875rem;
        font-weight: 700;
        color: #ffffff;
        margin: 0 0 0.5rem 0;
    }

    .page-subtitle {
        color: rgba(255, 255, 255, 0.7);
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
        background: linear-gradient(135deg, #8B0000, #A52A2A);
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
        color: #ffffff;
    }

    .admin-role {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.7);
    }

    /* Content Section */
    .content-section {
        padding: 2rem;
    }

    /* Settings Grid */
    .settings-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .settings-card {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.1);
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .card-header {
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
        padding: 1.5rem;
    }

    .card-header h5 {
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 600;
    }

    .card-body {
        padding: 1.5rem;
        text-align: center;
    }

    .card-body p {
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 1.5rem;
        line-height: 1.6;
    }

    /* Current Settings */
    .current-settings {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 2rem;
    }

    .current-settings h3 {
        color: #ffffff;
        margin-bottom: 1.5rem;
        font-weight: 600;
    }

    .settings-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
    }

    .info-item {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .info-item label {
        font-weight: 600;
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.875rem;
    }

    .info-item span {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.875rem;
    }

    /* Button Styling */
    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-outline-primary {
        background: transparent;
        color: #8B0000;
        border: 1px solid #8B0000;
    }

    .btn-outline-primary:hover:not(:disabled) {
        background: #8B0000;
        color: white;
        transform: translateY(-1px);
    }

    .btn-outline-primary:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    /* Alert Styling */
    .alert {
        border: none;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .alert-success {
        background: rgba(34, 197, 94, 0.1);
        color: #22c55e;
        border-left: 4px solid #22c55e;
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
        
        .settings-info {
            grid-template-columns: 1fr;
        }
    }
    </style>
</body>
</html> 