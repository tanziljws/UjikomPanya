<!DOCTYPE html>
<html>
<head>
    <title>Edit Galeri - SMK Negeri 4</title>
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
                <a href="{{ route('admin.galeri.index') }}" class="nav-item active" data-section="galeri">
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
                    <h1 class="page-title">Edit Galeri</h1>
                    <p class="page-subtitle">Edit foto galeri sekolah</p>
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
                            <h2><i class="bi bi-pencil-square"></i> Edit Foto Galeri</h2>
                            <p>Edit informasi foto galeri di bawah ini</p>
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

                        <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data" class="gallery-form">
        @csrf
        @method('PUT')

                            <div class="form-group">
                                <label for="judul" class="form-label">
                                    <i class="bi bi-type"></i> Judul Foto
                                </label>
                                <input type="text" 
                                       class="form-control @error('judul') is-invalid @enderror" 
                                       id="judul" 
                                       name="judul" 
                                       value="{{ old('judul', $galeri->judul) }}" 
                                       placeholder="Masukkan judul foto"
                                       required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
        </div>

                            <div class="form-group">
                                <label for="deskripsi" class="form-label">
                                    <i class="bi bi-text-paragraph"></i> Deskripsi
                                </label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                          id="deskripsi" 
                                          name="deskripsi" 
                                          rows="4" 
                                          placeholder="Masukkan deskripsi foto (opsional)">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
        </div>

                            <div class="form-group">
                                <label for="gambar" class="form-label">
                                    <i class="bi bi-image"></i> Foto Saat Ini
                                </label>
                                <div class="current-image-container">
            @if ($galeri->gambar)
                                        <div class="current-image">
                                            <img src="{{ asset($galeri->gambar) }}" 
                                                 alt="{{ $galeri->judul }}" 
                                                 class="current-image-preview">
                                            <div class="image-info">
                                                <span class="image-name">{{ basename($galeri->gambar) }}</span>
                                                <span class="image-size">Foto saat ini</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="no-image">
                                            <i class="bi bi-image"></i>
                                            <span>Tidak ada foto</span>
                                        </div>
            @endif
        </div>
                            </div>

                            <div class="form-group">
                                <label for="gambar" class="form-label">
                                    <i class="bi bi-upload"></i> Ganti Foto (Opsional)
                                </label>
                                <div class="file-upload-container">
                                    <input type="file" 
                                           class="form-control @error('gambar') is-invalid @enderror" 
                                           id="gambar" 
                                           name="gambar" 
                                           accept="image/*">
                                    <div class="file-info">
                                        <small class="text-muted">
                                            Format yang didukung: JPG, PNG, GIF. Maksimal 2MB. Kosongkan jika tidak ingin mengganti foto.
                                        </small>
                                    </div>
                                </div>
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                
                                <!-- New Image Preview -->
                                <div id="imagePreview" class="image-preview-container" style="display: none;">
                                    <h6>Preview Foto Baru:</h6>
                                    <img id="previewImage" src="" alt="Preview" class="preview-image">
                                    <button type="button" id="removeImage" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-x"></i> Hapus
                                    </button>
                                </div>
                            </div>

                            <div class="form-info">
                                <div class="info-card">
                                    <div class="info-header">
                                        <i class="bi bi-info-circle"></i>
                                        <h6>Informasi Foto</h6>
                                    </div>
                                    <div class="info-content">
                                        <div class="info-item">
                                            <span class="info-label">ID:</span>
                                            <span class="info-value">{{ $galeri->id }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Dibuat:</span>
                                            <span class="info-value">{{ $galeri->created_at ? $galeri->created_at->format('d M Y H:i') : 'N/A' }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Diperbarui:</span>
                                            <span class="info-value">{{ $galeri->updated_at ? $galeri->updated_at->format('d M Y H:i') : 'N/A' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle"></i> Update Foto
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

    /* Form Container */
    .form-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .form-card {
        background: white;
        border-radius: 16px;
        padding: 2.5rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
    }

    .form-header {
        text-align: center;
        margin-bottom: 2.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .form-header h2 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .form-header p {
        color: #64748b;
        margin: 0;
    }

    /* Form Groups */
    .form-group {
        margin-bottom: 2rem;
    }

    .form-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-control {
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 0.875rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
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

    /* Current Image */
    .current-image-container {
        margin-bottom: 1rem;
    }

    .current-image {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: #f8fafc;
        border-radius: 8px;
        border: 2px solid #e2e8f0;
    }

    .current-image-preview {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .image-info {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .image-name {
        font-weight: 600;
        color: #1e293b;
        font-size: 0.875rem;
    }

    .image-size {
        color: #64748b;
        font-size: 0.75rem;
    }

    .no-image {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem;
        background: #f8fafc;
        border-radius: 8px;
        border: 2px dashed #cbd5e1;
        color: #94a3b8;
    }

    /* File Upload */
    .file-upload-container {
        position: relative;
    }

    .file-info {
        margin-top: 0.5rem;
    }

    /* Image Preview */
    .image-preview-container {
        margin-top: 1rem;
        text-align: center;
        padding: 1rem;
        background: #f8fafc;
        border-radius: 8px;
        border: 2px dashed #cbd5e1;
    }

    .preview-image {
        max-width: 300px;
        max-height: 200px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 1rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Form Info */
    .form-info {
        margin-bottom: 2rem;
    }

    .info-card {
        background: #f8fafc;
        border-radius: 8px;
        padding: 1.5rem;
        border: 1px solid #e2e8f0;
    }

    .info-header {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1rem;
        color: #374151;
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
        font-weight: 600;
        color: #1e293b;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #e2e8f0;
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
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        color: white;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #2563eb, #1e40af);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .btn-secondary {
        background: #6b7280;
        color: white;
    }

    .btn-secondary:hover {
        background: #4b5563;
        transform: translateY(-1px);
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
        
        .current-image {
            flex-direction: column;
            text-align: center;
        }
    }
    </style>

    <script>
    // Image preview functionality
    document.getElementById('gambar').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const previewContainer = document.getElementById('imagePreview');
        const previewImage = document.getElementById('previewImage');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none';
        }
    });

    // Remove image functionality
    document.getElementById('removeImage').addEventListener('click', function() {
        document.getElementById('gambar').value = '';
        document.getElementById('imagePreview').style.display = 'none';
    });

    // Form validation
    document.querySelector('.gallery-form').addEventListener('submit', function(e) {
        const judul = document.getElementById('judul').value.trim();
        const gambar = document.getElementById('gambar').files[0];
        
        if (!judul) {
            e.preventDefault();
            alert('Judul foto harus diisi!');
            return false;
        }
        
        if (gambar) {
            // Check file size (2MB = 2 * 1024 * 1024 bytes)
            if (gambar.size > 2 * 1024 * 1024) {
                e.preventDefault();
                alert('Ukuran file tidak boleh lebih dari 2MB!');
                return false;
            }
            
            // Check file type
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!allowedTypes.includes(gambar.type)) {
                e.preventDefault();
                alert('Format file tidak didukung! Gunakan JPG, PNG, atau GIF.');
                return false;
            }
        }
    });
    </script>
</body>
</html>
