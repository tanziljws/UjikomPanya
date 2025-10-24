<!DOCTYPE html>
<html>
<head>
    <title>Edit Agenda - SMK Negeri 4</title>
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
                <a href="{{ route('admin.agenda.index') }}" class="nav-item active" data-section="agenda">
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
                    <h1 class="page-title">Edit Agenda</h1>
                    <p class="page-subtitle">Edit agenda: {{ $agenda->title }}</p>
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
                            <h5><i class="bi bi-pencil-square"></i> Form Edit Agenda</h5>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.agenda.update', $agenda->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Judul Agenda *</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $agenda->title) }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $agenda->description) }}</textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="date" class="form-label">Tanggal *</label>
                                                    <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $agenda->date->format('Y-m-d')) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="time" class="form-label">Waktu</label>
                                                    <input type="time" class="form-control" id="time" name="time" value="{{ old('time', $agenda->time) }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="location" class="form-label">Lokasi</label>
                                            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $agenda->location) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="type" class="form-label">Tipe Agenda *</label>
                                            <select class="form-select" id="type" name="type" required>
                                                <option value="">Pilih Tipe</option>
                                                <option value="academic" {{ old('type', $agenda->type) == 'academic' ? 'selected' : '' }}>Akademik</option>
                                                <option value="event" {{ old('type', $agenda->type) == 'event' ? 'selected' : '' }}>Event</option>
                                                <option value="meeting" {{ old('type', $agenda->type) == 'meeting' ? 'selected' : '' }}>Meeting</option>
                                                <option value="competition" {{ old('type', $agenda->type) == 'competition' ? 'selected' : '' }}>Kompetisi</option>
                                                <option value="other" {{ old('type', $agenda->type) == 'other' ? 'selected' : '' }}>Lainnya</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Gambar</label>
                                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                            <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB</div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="status" name="status" value="1" {{ old('status', $agenda->status) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="status">
                                                    Aktifkan Agenda
                                                </label>
                                            </div>
                                        </div>

                                        @if($agenda->image)
                                            <div class="current-image">
                                                <label class="form-label">Gambar Saat Ini</label>
                                                <img src="{{ asset($agenda->image) }}" alt="{{ $agenda->title }}" class="img-thumbnail">
                                            </div>
                                        @endif

                                        <div class="image-preview" id="imagePreview" style="display: none;">
                                            <label class="form-label">Preview Gambar Baru</label>
                                            <img id="previewImg" src="" alt="Preview" class="img-thumbnail">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save"></i> Update Agenda
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
        max-width: 1200px;
        margin: 0 auto;
    }

    .form-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        border: 1px solid #e2e8f0;
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
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
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .form-control,
    .form-select {
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 0.75rem;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .form-text {
        font-size: 0.875rem;
        color: #6b7280;
    }

    .form-check-input:checked {
        background-color: #3b82f6;
        border-color: #3b82f6;
    }

    /* Current Image */
    .current-image {
        margin: 1rem 0;
        text-align: center;
    }

    .current-image img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        border: 2px solid #e5e7eb;
    }

    /* Image Preview */
    .image-preview {
        margin-top: 1rem;
        text-align: center;
    }

    .image-preview img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #e5e7eb;
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
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
        color: white;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #2563eb, #1e40af);
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

    /* Alert Styling */
    .alert {
        border: none;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .alert-danger {
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626;
        border-left: 4px solid #dc2626;
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
    // Image preview functionality
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
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