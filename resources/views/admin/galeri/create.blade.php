@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h2><i class="bi bi-plus-circle"></i> Tambah Foto Galeri</h2>
                <p>Upload foto baru ke galeri sekolah</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Form Upload Foto</h5>
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

                    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Foto</label>
                            <input type="text" 
                                   class="form-control @error('judul') is-invalid @enderror" 
                                   id="judul" 
                                   name="judul" 
                                   value="{{ old('judul') }}"
                                   required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" 
                                      name="deskripsi" 
                                      rows="4">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" 
                                    id="category_id" 
                                    name="category_id">
                                <option value="">Pilih Kategori (Opsional)</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                        
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Upload Foto</label>
                            <input type="file" 
                                   class="form-control @error('gambar') is-invalid @enderror" 
                                   id="gambar" 
                                   name="gambar" 
                                   accept="image/*" 
                                   required>
                            <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 2MB.</small>
                            @error('gambar')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-upload"></i> Upload Foto
                            </button>
                            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Panduan Upload</h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            <small>Pastikan foto berkualitas baik dan jelas</small>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            <small>Berikan judul yang deskriptif</small>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            <small>Deskripsi singkat tapi informatif</small>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check-circle text-success"></i>
                            <small>Format: JPG, PNG, GIF (Max: 2MB)</small>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="mb-0">Preview Foto</h6>
                </div>
                <div class="card-body text-center">
                    <div id="imagePreview" class="d-none">
                        <img id="previewImg" src="" alt="Preview" class="img-fluid rounded mb-2" style="max-height: 200px;">
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeImage()">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </div>
                    <div id="uploadPlaceholder">
                        <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                        <p class="text-muted mt-2">Preview foto akan muncul di sini</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('gambar');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');

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
                uploadPlaceholder.classList.add('d-none');
            };
            reader.readAsDataURL(file);
        }
    });
});

function removeImage() {
    document.getElementById('gambar').value = '';
    document.getElementById('imagePreview').classList.add('d-none');
    document.getElementById('uploadPlaceholder').classList.remove('d-none');
}
</script>
@endsection
