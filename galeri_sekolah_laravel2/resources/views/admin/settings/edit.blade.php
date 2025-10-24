<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengaturan - SMK Negeri 4</title>
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
                    <h1 class="page-title">Edit Pengaturan</h1>
                    <p class="page-subtitle">Edit pengaturan umum sekolah</p>
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
                <div class="form-container">
                    <div class="form-card">
                        <div class="card-header">
                            <h5><i class="bi bi-gear"></i> Form Edit Pengaturan Umum</h5>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="school_name" class="form-label">Nama Sekolah *</label>
                                            <input type="text" class="form-control" id="school_name" name="school_name" value="{{ old('school_name', $settings['school_name']['value'] ?? 'SMK Negeri 4') }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="school_address" class="form-label">Alamat Sekolah *</label>
                                            <textarea class="form-control" id="school_address" name="school_address" rows="3" required>{{ old('school_address', $settings['school_address']['value'] ?? 'Jl. Contoh No. 123, Kota, Provinsi') }}</textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="school_phone" class="form-label">Nomor Telepon *</label>
                                                    <input type="text" class="form-control" id="school_phone" name="school_phone" value="{{ old('school_phone', $settings['school_phone']['value'] ?? '+62 123 456 789') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="school_email" class="form-label">Email Sekolah *</label>
                                                    <input type="email" class="form-control" id="school_email" name="school_email" value="{{ old('school_email', $settings['school_email']['value'] ?? 'info@smkn4.sch.id') }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="school_website" class="form-label">Website Sekolah</label>
                                            <input type="url" class="form-control" id="school_website" name="school_website" value="{{ old('school_website', $settings['school_website']['value'] ?? 'https://www.smkn4.sch.id') }}" placeholder="https://www.example.com">
                                        </div>

                                        <div class="mb-3">
                                            <label for="school_description" class="form-label">Deskripsi Sekolah</label>
                                            <textarea class="form-control" id="school_description" name="school_description" rows="4">{{ old('school_description', $settings['school_description']['value'] ?? 'SMK Negeri 4 adalah sekolah menengah kejuruan yang berkomitmen untuk menghasilkan lulusan berkualitas dan siap kerja.') }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="school_vision" class="form-label">Visi Sekolah</label>
                                            <textarea class="form-control" id="school_vision" name="school_vision" rows="3">{{ old('school_vision', $settings['school_vision']['value'] ?? 'Menjadi sekolah kejuruan unggulan yang menghasilkan lulusan berkualitas dan berdaya saing global.') }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="school_mission" class="form-label">Misi Sekolah</label>
                                            <textarea class="form-control" id="school_mission" name="school_mission" rows="4">{{ old('school_mission', $settings['school_mission']['value'] ?? '1. Menyelenggarakan pendidikan kejuruan yang berkualitas\n2. Mengembangkan kompetensi siswa sesuai kebutuhan industri\n3. Meningkatkan kualitas tenaga pendidik dan kependidikan\n4. Menjalin kerjasama dengan dunia usaha dan industri') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="logo" class="form-label">Logo Sekolah</label>
                                            <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                                            <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB</div>
                                        </div>

                                        @if(isset($settings['school_logo']) && $settings['school_logo']['value'])
                                            <div class="current-logo">
                                                <label class="form-label">Logo Saat Ini</label>
                                                <img src="{{ asset($settings['school_logo']['value']) }}" alt="Logo Sekolah" class="img-thumbnail">
                                            </div>
                                        @endif

                                        <div class="logo-preview" id="logoPreview" style="display: none;">
                                            <label class="form-label">Preview Logo Baru</label>
                                            <img id="previewLogo" src="" alt="Preview Logo" class="img-thumbnail">
                                        </div>

                                        <div class="settings-info">
                                            <div class="info-card">
                                                <h6><i class="bi bi-info-circle"></i> Informasi</h6>
                                                <p class="small">Pengaturan ini akan mempengaruhi tampilan website sekolah. Pastikan semua informasi yang dimasukkan sudah benar dan lengkap.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save"></i> Simpan Pengaturan
                                    </button>
                                </div>
                            </form>
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

    /* Form Container */
    .form-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .form-card {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.1);
        overflow: hidden;
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
        gap: 0.5rem;
        font-weight: 600;
    }

    .card-body {
        padding: 2rem;
    }

    /* Form Styling */
    .form-label {
        font-weight: 600;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 0.5rem;
    }

    .form-control,
    .form-select {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        padding: 0.75rem;
        color: #ffffff;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #8B0000;
        box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.1);
        background: rgba(255, 255, 255, 0.15);
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
    }

    .form-text {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.6);
    }

    .form-check-input {
        background-color: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 4px;
    }

    .form-check-input:checked {
        background-color: #8B0000;
        border-color: #8B0000;
    }

    .form-check-label {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.9rem;
        cursor: pointer;
    }

    /* Current Logo */
    .current-logo {
        margin: 1rem 0;
        text-align: center;
    }

    .current-logo img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    /* Logo Preview */
    .logo-preview {
        margin-top: 1rem;
        text-align: center;
    }

    .logo-preview img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    /* Settings Info */
    .settings-info {
        margin-top: 2rem;
    }

    .info-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        padding: 1rem;
    }

    .info-card h6 {
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .info-card p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.875rem;
        margin: 0;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
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
        background: linear-gradient(135deg, #8B0000, #A52A2A);
        color: white;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #A52A2A, #8B0000);
        transform: translateY(-1px);
    }

    .btn-secondary {
        background: rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
        color: white;
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

    .alert-danger {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
        border-left: 4px solid #ef4444;
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
        
        .form-actions {
            flex-direction: column;
        }
        
        .card-body {
            padding: 1.5rem;
        }
    }
    </style>

    <script>
    // Logo preview functionality
    document.getElementById('logo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('logoPreview');
        const previewLogo = document.getElementById('previewLogo');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewLogo.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });
    </script>
</body>
</html> 