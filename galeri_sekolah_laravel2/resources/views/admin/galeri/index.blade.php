
<!-- resources/views/admin/galeri/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Galeri - SMK Negeri 4</title>
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
                    <h1 class="page-title">Manajemen Galeri</h1>
                    <p class="page-subtitle">Kelola foto dan gambar galeri sekolah</p>
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

            <!-- Galeri Content -->
            <div class="content-section active">
                <div class="section-header">
                    <div class="header-left">
                        <h2>Daftar Galeri</h2>
                        <p class="text-muted">Total {{ $galeri->count() }} foto dalam galeri</p>
                    </div>
                    <div class="header-actions">
                        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah Galeri
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

                <!-- Gallery Table -->
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Tanggal Upload</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($galeri as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <div class="item-title">{{ $item->judul }}</div>
                                </td>
                                <td>
                                    <div class="item-description">
                                        {{ Str::limit($item->deskripsi, 50) }}
                                        @if(strlen($item->deskripsi) > 50)
                                            <span class="text-muted">...</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if ($item->gambar)
                                        <div class="image-preview">
                                            <img src="{{ asset($item->gambar) }}" 
                                                 alt="{{ $item->judul }}" 
                                                 class="table-img"
                                                 data-bs-toggle="modal" 
                                                 data-bs-target="#imageModal{{ $item->id }}">
                                        </div>
                                    @else
                                        <div class="no-image">
                                            <i class="bi bi-image"></i>
                                            <span>Tidak ada gambar</span>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="upload-date">
                                        {{ $item->created_at ? $item->created_at->format('d M Y') : 'N/A' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                                                            <a href="{{ route('admin.galeri.edit', $item->id) }}" 
                                       class="btn btn-sm btn-outline-primary" 
                                       title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-sm btn-outline-info" 
                                                title="Preview"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#previewModal{{ $item->id }}">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <form action="{{ route('admin.galeri.destroy', $item->id) }}" 
                                              method="POST" 
                                              style="display:inline;"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Image Modal -->
                            @if ($item->gambar)
                            <div class="modal fade" id="imageModal{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $item->judul }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="{{ asset($item->gambar) }}" 
                                                 alt="{{ $item->judul }}" 
                                                 class="img-fluid">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <a href="{{ asset($item->gambar) }}" 
                                               class="btn btn-primary" 
                                               download>
                                                <i class="bi bi-download"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Preview Modal -->
                            <div class="modal fade" id="previewModal{{ $item->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Preview - {{ $item->judul }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="preview-content">
                                                <div class="preview-image">
                                                    @if ($item->gambar)
                                                        <img src="{{ asset($item->gambar) }}" 
                                                             alt="{{ $item->judul }}" 
                                                             class="img-fluid rounded">
                                                    @else
                                                        <div class="no-image-large">
                                                            <i class="bi bi-image"></i>
                                                            <p>Tidak ada gambar</p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="preview-details">
                                                    <h6>Judul</h6>
                                                    <p>{{ $item->judul }}</p>
                                                    
                                                    <h6>Deskripsi</h6>
                                                    <p>{{ $item->deskripsi ?: 'Tidak ada deskripsi' }}</p>
                                                    
                                                    <h6>Tanggal Upload</h6>
                                                    <p>{{ $item->created_at ? $item->created_at->format('d M Y H:i') : 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn btn-primary">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <div class="empty-state">
                                        <i class="bi bi-images"></i>
                                        <h5>Belum ada data galeri</h5>
                                        <p class="text-muted">Mulai dengan menambahkan foto pertama ke galeri</p>
                                        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
                                            <i class="bi bi-plus"></i> Tambah Foto Pertama
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
        border-bottom: 1px solid rgba(30, 58, 138, 0.1);
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
        background: linear-gradient(135deg, #1e3a8a, #1e40af);
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

    .item-title {
        font-weight: 600;
        color: #1e293b;
    }

    .item-description {
        color: #64748b;
        font-size: 0.875rem;
    }

    .table-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .table-img:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .no-image {
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #94a3b8;
        font-size: 0.875rem;
    }

    .no-image i {
        font-size: 1.5rem;
        margin-bottom: 0.25rem;
    }

    .upload-date {
        color: #64748b;
        font-size: 0.875rem;
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

    /* Modal Styles */
    .modal-content {
        border-radius: 12px;
        border: none;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
    }

    .modal-header {
        border-bottom: 1px solid #e2e8f0;
        padding: 1.5rem;
    }

    .modal-body {
        padding: 1.5rem;
    }

    .modal-footer {
        border-top: 1px solid #e2e8f0;
        padding: 1.5rem;
    }

    .preview-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
    }

    .preview-image img {
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .no-image-large {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 200px;
        background: #f8fafc;
        border-radius: 8px;
        color: #94a3b8;
    }

    .no-image-large i {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .preview-details h6 {
        color: #374151;
        font-weight: 600;
        margin-bottom: 0.5rem;
        margin-top: 1rem;
    }

    .preview-details p {
        color: #64748b;
        margin-bottom: 1rem;
    }

    /* Alert Styles */
    .alert {
        border-radius: 8px;
        border: none;
        margin-bottom: 1.5rem;
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
        
        .preview-content {
            grid-template-columns: 1fr;
        }
    }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
