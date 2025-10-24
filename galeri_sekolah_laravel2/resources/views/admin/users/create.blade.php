<!DOCTYPE html>
<html>
<head>
    <title>Tambah User - SMK Negeri 4</title>
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
                    <h1 class="page-title">Tambah User</h1>
                    <p class="page-subtitle">Tambah user baru ke sistem</p>
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

            <!-- Form Content -->
            <div class="content-section active">
                <div class="form-container">
                    <div class="form-card">
                        <div class="form-header">
                            <h2><i class="bi bi-person-plus"></i> Tambah User Baru</h2>
                            <p>Isi form di bawah untuk menambahkan user baru ke sistem</p>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.users.store') }}" method="POST" class="user-form">
                            @csrf
                            
                            <div class="form-group">
                                <label for="name" class="form-label">
                                    <i class="bi bi-person"></i> Nama Lengkap
                                </label>
                                <input type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       placeholder="Masukkan nama lengkap"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label">
                                    <i class="bi bi-envelope"></i> Email
                                </label>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       placeholder="Masukkan email"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password" class="form-label">
                                        <i class="bi bi-lock"></i> Password
                                    </label>
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password" 
                                           placeholder="Masukkan password"
                                           required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="password_confirmation" class="form-label">
                                        <i class="bi bi-lock-fill"></i> Konfirmasi Password
                                    </label>
                                    <input type="password" 
                                           class="form-control" 
                                           id="password_confirmation" 
                                           name="password_confirmation" 
                                           placeholder="Konfirmasi password"
                                           required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="role" class="form-label">
                                        <i class="bi bi-shield"></i> Role
                                    </label>
                                    <select class="form-control @error('role') is-invalid @enderror" 
                                            id="role" 
                                            name="role" 
                                            required>
                                        <option value="">Pilih role</option>
                                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="status" class="form-label">
                                        <i class="bi bi-toggle-on"></i> Status
                                    </label>
                                    <select class="form-control @error('status') is-invalid @enderror" 
                                            id="status" 
                                            name="status" 
                                            required>
                                        <option value="">Pilih status</option>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-info">
                                <div class="info-card">
                                    <div class="info-header">
                                        <i class="bi bi-info-circle"></i>
                                        <h6>Informasi User</h6>
                                    </div>
                                    <div class="info-content">
                                        <div class="info-item">
                                            <span class="info-label">Role User:</span>
                                            <span class="info-value">Akses terbatas, hanya dapat melihat galeri</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Role Admin:</span>
                                            <span class="info-value">Akses penuh ke semua fitur sistem</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Status Aktif:</span>
                                            <span class="info-value">User dapat login dan menggunakan sistem</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Status Nonaktif:</span>
                                            <span class="info-value">User tidak dapat login ke sistem</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle"></i> Simpan User
                                </button>
                            </div>
                        </form>
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
        color: #000000;
        margin: 0 0 0.5rem 0;
    }

    .page-subtitle {
        color: #000000;
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
        color: #000000;
    }

    .admin-role {
        font-size: 0.875rem;
        color: #000000;
    }

    /* Content Section */
    .content-section {
        padding: 2rem;
    }

    /* Form Container */
    .form-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .form-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 16px;
        padding: 2.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(128, 0, 0, 0.1);
        backdrop-filter: blur(10px);
    }

    .form-header {
        text-align: center;
        margin-bottom: 2.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid rgba(128, 0, 0, 0.1);
    }

    .form-header h2 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: #000000;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .form-header p {
        color: #000000;
        margin: 0;
    }

    /* Form Groups */
    .form-group {
        margin-bottom: 2rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .form-label {
        font-weight: 600;
        color: #000000;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-control {
        border: 2px solid rgba(128, 0, 0, 0.2);
        border-radius: 8px;
        padding: 0.875rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
    }

    .form-control:focus {
        border-color: #800000;
        box-shadow: 0 0 0 3px rgba(128, 0, 0, 0.1);
        outline: none;
    }

    .form-control.is-invalid {
        border-color: #ef4444;
    }

    .invalid-feedback {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    /* Form Info */
    .form-info {
        margin-bottom: 2rem;
    }

    .info-card {
        background: rgba(128, 0, 0, 0.05);
        border-radius: 8px;
        padding: 1.5rem;
        border: 1px solid rgba(128, 0, 0, 0.1);
    }

    .info-header {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
        color: #000000;
    }

    .info-header h6 {
        margin: 0;
        font-weight: 600;
    }

    .info-content {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px solid #e2e8f0;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-label {
        font-weight: 500;
        color: #64748b;
    }

    .info-value {
        color: #1e293b;
        font-weight: 500;
        text-align: right;
        max-width: 60%;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid rgba(128, 0, 0, 0.1);
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
    }

    .btn-primary {
        background: linear-gradient(135deg, #800000, #4a0000);
        color: white;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #4a0000, #800000);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(128, 0, 0, 0.3);
    }

    .btn-secondary {
        background: #000000;
        color: white;
    }

    .btn-secondary:hover {
        background: #333333;
        transform: translateY(-1px);
    }

    /* Alert Styles */
    .alert {
        border-radius: 8px;
        border: none;
        margin-bottom: 1.5rem;
        padding: 1rem 1.5rem;
    }

    .alert-danger {
        background: #fee2e2;
        color: #991b1b;
    }

    .alert ul {
        margin: 0;
        padding-left: 1.5rem;
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
        
        .form-card {
            padding: 1.5rem;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .content-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .form-row {
            grid-template-columns: 1fr;
        }
        
        .info-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
        
        .info-value {
            max-width: 100%;
            text-align: left;
        }
    }
    </style>

    <script>
    // Form validation
    document.querySelector('.user-form').addEventListener('submit', function(e) {
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;
        const passwordConfirmation = document.getElementById('password_confirmation').value;
        const role = document.getElementById('role').value;
        const status = document.getElementById('status').value;
        
        if (!name) {
            e.preventDefault();
            alert('Nama lengkap harus diisi!');
            return false;
        }
        
        if (!email) {
            e.preventDefault();
            alert('Email harus diisi!');
            return false;
        }
        
        if (!password) {
            e.preventDefault();
            alert('Password harus diisi!');
            return false;
        }
        
        if (password.length < 6) {
            e.preventDefault();
            alert('Password minimal 6 karakter!');
            return false;
        }
        
        if (password !== passwordConfirmation) {
            e.preventDefault();
            alert('Konfirmasi password tidak cocok!');
            return false;
        }
        
        if (!role) {
            e.preventDefault();
            alert('Role harus dipilih!');
            return false;
        }
        
        if (!status) {
            e.preventDefault();
            alert('Status harus dipilih!');
            return false;
        }
    });
    </script>
</body>
</html> 