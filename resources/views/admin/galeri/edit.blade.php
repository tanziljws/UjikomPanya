@extends('layouts.app')

@section('title', 'Edit Galeri')

@section('content')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h1 class="page-title">Edit Galeri</h1>
            <p class="page-subtitle">Edit foto galeri sekolah</p>
        </div>
        <div class="col-auto">
            <div class="admin-info d-flex align-items-center">
                <div class="admin-avatar me-3">
                    <i class="bi bi-person-circle" style="font-size: 3rem; color: var(--primary-color);"></i>
                </div>
                <div class="admin-details">
                    <div class="admin-name fw-bold" style="color: var(--primary-color);">Administrator</div>
                    <div class="admin-role opacity-75" style="color: var(--gray-color);">Super Admin</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form Content -->
<div class="content-section">
    <div class="card">
        <div class="card-header" style="background: linear-gradient(135deg, var(--primary-color), var(--primary-light)); color: white;">
            <h5 class="card-title mb-0">
                <i class="bi bi-pencil-square me-2"></i>
                Edit Foto Galeri
            </h5>
            <p class="text-white-50 mb-0 mt-1">Edit informasi foto galeri sekolah</p>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group mb-4">
                            <label for="judul" class="form-label fw-bold">
                                <i class="bi bi-type me-2"></i>
                                Judul Foto
                            </label>
                            <input type="text" 
                                   class="form-control @error('judul') is-invalid @enderror" 
                                   id="judul" 
                                   name="judul" 
                                   placeholder="Masukkan judul foto"
                                   value="{{ old('judul', $galeri->judul) }}" 
                                   required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="deskripsi" class="form-label fw-bold">
                                <i class="bi bi-text-paragraph me-2"></i>
                                Deskripsi
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

                        <div class="form-group mb-4">
                            <label for="category_id" class="form-label fw-bold">
                                <i class="bi bi-tags me-2"></i>
                                Kategori
                            </label>
                            <select class="form-control @error('category_id') is-invalid @enderror" 
                                    id="category_id" 
                                    name="category_id">
                                <option value="">Pilih Kategori (Opsional)</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $galeri->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">
                                <a href="{{ route('admin.category.create') }}" target="_blank">
                                    <i class="bi bi-plus-circle"></i> Tambah kategori baru
                                </a>
                            </small>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">
                                <i class="bi bi-image me-2"></i>
                                Foto Saat Ini
                            </label>
                            <div class="current-image mb-3">
                                <img src="{{ asset('images/' . $galeri->gambar) }}" 
                                     alt="{{ $galeri->judul }}" 
                                     class="img-fluid rounded" 
                                     style="max-height: 200px; width: 100%; object-fit: cover;">
                            </div>
                            
                            <label for="gambar" class="form-label fw-bold">
                                <i class="bi bi-upload me-2"></i>
                                Ganti Foto (Opsional)
                            </label>
                            <div class="upload-area @error('gambar') is-invalid @enderror" 
                                 id="uploadArea">
                                <div class="upload-content">
                                    <i class="bi bi-cloud-upload" style="font-size: 2rem; color: var(--primary-color);"></i>
                                    <p class="upload-text">Klik untuk ganti foto</p>
                                    <p class="upload-hint">Format: JPG, PNG, GIF (Max: 2MB)</p>
                                </div>
                                <input type="file" 
                                       class="form-control d-none" 
                                       id="gambar" 
                                       name="gambar" 
                                       accept="image/*">
                            </div>
                            @error('gambar')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            
                            <!-- Preview Image -->
                            <div id="imagePreview" class="mt-3 d-none">
                                <img id="previewImg" src="" alt="Preview" class="img-fluid rounded" style="max-height: 200px;">
                                <button type="button" class="btn btn-sm btn-outline-danger mt-2" onclick="removeImage()">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-2"></i>
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-2"></i>
                        Update Foto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
:root {
    --primary-color: #1e40af;
    --primary-dark: #1e3a8a;
    --primary-light: #3b82f6;
    --gray-color: #6b7280;
    --dark-color: #1f2937;
}

.page-header {
    background: white;
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: var(--shadow-lg);
    margin-bottom: 2rem;
}

.page-title {
    color: var(--primary-color);
    font-size: 2rem;
    font-weight: 700;
    margin: 0;
}

.page-subtitle {
    color: var(--gray-color);
    margin: 0;
    margin-top: 0.5rem;
}

.content-section {
    background: white;
    border-radius: 1rem;
    box-shadow: var(--shadow-lg);
    overflow: hidden;
}

.card-header {
    padding: 1.5rem;
}

.card-title {
    font-size: 1.25rem;
    font-weight: 600;
}

.card-body {
    padding: 2rem;
}

.form-label {
    color: var(--dark-color);
    margin-bottom: 0.5rem;
}

.form-control, .form-select {
    border: 2px solid var(--border-color);
    border-radius: 0.5rem;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(30, 64, 175, 0.25);
}

.form-control.is-invalid, .form-select.is-invalid {
    border-color: var(--danger-color);
}

.upload-area {
    border: 2px dashed var(--primary-color);
    border-radius: 0.5rem;
    padding: 2rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    background: rgba(30, 64, 175, 0.05);
}

.upload-area:hover {
    background: rgba(30, 64, 175, 0.1);
    border-color: var(--primary-dark);
}

.upload-area.is-invalid {
    border-color: var(--danger-color);
    background: rgba(239, 68, 68, 0.05);
}

.upload-content {
    pointer-events: none;
}

.upload-text {
    font-weight: 600;
    color: var(--primary-color);
    margin: 0.5rem 0;
}

.upload-hint {
    font-size: 0.875rem;
    color: var(--gray-color);
    margin: 0;
}

.current-image {
    border: 2px solid var(--border-color);
    border-radius: 0.5rem;
    overflow: hidden;
}

.form-actions {
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
    padding-top: 2rem;
    border-top: 1px solid var(--border-color);
    margin-top: 2rem;
}

.btn {
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary {
    background: var(--primary-color);
    border-color: var(--primary-color);
}

.btn-primary:hover {
    background: var(--primary-dark);
    border-color: var(--primary-dark);
}

.btn-secondary {
    background: var(--gray-color);
    border-color: var(--gray-color);
}

.btn-secondary:hover {
    background: var(--dark-color);
    border-color: var(--dark-color);
}

.admin-info {
    background: rgba(30, 64, 175, 0.1);
    padding: 1rem;
    border-radius: 0.5rem;
}

.admin-name {
    font-size: 1.125rem;
}

.admin-role {
    font-size: 0.875rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('gambar');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');

    uploadArea.addEventListener('click', function() {
        fileInput.click();
    });

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validate file type
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (!allowedTypes.includes(file.type)) {
                alert('Format file tidak didukung. Gunakan JPG, PNG, atau GIF.');
                return;
            }

            // Validate file size (2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimal 2MB.');
                return;
            }

            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        }
    });
});

function removeImage() {
    document.getElementById('gambar').value = '';
    document.getElementById('imagePreview').classList.add('d-none');
}
</script>
@endsection
