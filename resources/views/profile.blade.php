@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="container-fluid profile-page">
    <div class="page-header">
        <h1 class="page-title">Profil Saya</h1>
        <p class="page-subtitle">Kelola informasi dan pengaturan akun Anda</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4 align-items-stretch">
        <div class="col-12 mb-4">
            <div class="card profile-card h-100">
                <div class="card-body text-center">
                    <div class="profile-photo-container">
                        @if(Auth::user()->photo)
                            <img src="{{ asset('images/profiles/' . Auth::user()->photo) }}?t={{ time() }}" alt="{{ Auth::user()->name }}" class="profile-photo" id="profilePhoto">
                        @else
                            <div class="profile-photo-placeholder" id="profilePhoto">
                                <i class="bi bi-person-circle"></i>
                            </div>
                        @endif
                        <div class="photo-edit-overlay" onclick="document.getElementById('photoInput').click()">
                            <i class="bi bi-camera"></i>
                            <span>Ganti Foto</span>
                        </div>
                        <input type="file" id="photoInput" accept="image/jpeg,image/png,image/jpg,image/gif" style="display: none;" onchange="uploadPhoto(this)">
                    </div>
                    <div class="text-muted small text-center mt-2">Klik foto untuk mengubah</div>
                    <h4 class="mt-3 mb-1">{{ Auth::user()->name }}</h4>
                    <p class="text-muted mb-3">{{ Auth::user()->email }}</p>
                    <span class="badge bg-success">Active</span>
                    <span class="badge bg-primary">User</span>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 d-flex align-items-center gap-2"><i class="bi bi-person-lines-fill"></i> Informasi Profil</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Alamat Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-end mt-2">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-check-circle"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0 d-flex align-items-center gap-2"><i class="bi bi-activity"></i> Aktivitas Akun</h5>
                </div>
                <div class="card-body">
                    <div class="activity-item">
                        <i class="bi bi-calendar-check text-success"></i>
                        <div>
                            <strong>Akun Dibuat</strong>
                            <p class="text-muted mb-0">{{ Auth::user()->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                    <div class="activity-item">
                        <i class="bi bi-clock-history text-primary"></i>
                        <div>
                            <strong>Terakhir Diperbarui</strong>
                            <p class="text-muted mb-0">{{ Auth::user()->updated_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Page scope to avoid affecting other pages */
.profile-page .page-header {
    margin-bottom: 1.5rem;
    /* Tampilkan judul/subjudul jelas dan tidak tertutup sidebar */
    padding-left: 0;
    text-align: center;
}
.profile-page { padding-left: 0; } /* tidak perlu offset tambahan, biar konten center dan tidak terpotong */
.profile-page .card { border-radius: 1rem; box-shadow: 0 4px 16px rgba(0,0,0,0.06); }
.profile-page .card:hover { transform: none; box-shadow: 0 6px 20px rgba(0,0,0,0.08); }
.profile-page .card-header { border-radius: 1rem 1rem 0 0; }
.profile-page .form-label { font-weight: 600; color: #1f2937; }
.profile-page .profile-card .card-body { padding-top: 1.75rem; }
.profile-card {
    border: none;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.profile-photo-container {
    position: relative;
    display: inline-block;
    margin: 6px 0 10px;
}

.profile-photo {
    width: 110px;
    height: 110px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #1e40af;
    box-shadow: 0 3px 10px rgba(0,0,0,0.12);
}

.profile-photo-placeholder {
    width: 110px;
    height: 110px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    border: 3px solid #1e40af;
    box-shadow: 0 3px 10px rgba(0,0,0,0.12);
}
.profile-photo-placeholder i {
    font-size: 5rem;
    color: white;
}

.photo-edit-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.6);
    color: white;
    padding: 8px 0;
    text-align: center;
    cursor: pointer;
    opacity: 0;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border-bottom-left-radius: 0.5rem;
    border-bottom-right-radius: 0.5rem;
}

.profile-photo-container:hover .photo-edit-overlay {
    opacity: 1;
}

.photo-edit-overlay i {
    font-size: 1rem;
    margin-bottom: 2px;
}

.photo-edit-overlay span {
    font-size: 0.68rem;
    display: block;
}

/* Reduce top/bottom spacing so section di bawah lebih cepat terlihat */
.profile-card .card-body { padding-top: 1.25rem; padding-bottom: 1rem; }

/* On very small screens keep avatar a bit smaller */
@media (max-width: 576px) {
  .profile-photo, .profile-photo-placeholder { width: 96px; height: 96px; }
}

.activity-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 12px 4px;
    border-bottom: 1px solid #e5e7eb;
}

/* Alert Styles */
.alert {
    border-radius: 0.5rem;
    margin-bottom: 1rem;
    padding: 0.75rem 1.25rem;
    border: 1px solid transparent;
}

.alert-success {
    background-color: #d1fae5;
    border-color: #a7f3d0;
    color: #065f46;
}

.alert-error {
    background-color: #fee2e2;
    border-color: #fecaca;
    color: #991b1b;
}

.alert-dismissible {
    position: relative;
    padding-right: 3rem;
}

.btn-close {
    position: absolute;
    top: 0.75rem;
    right: 1rem;
    padding: 0.25rem;
    background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/0.75rem auto no-repeat;
    border: 0;
    border-radius: 0.25rem;
    opacity: 0.5;
}

.btn-close:hover {
    opacity: 0.75;
}

.activity-item:last-child {
    border-bottom: none;
}

</style>

<script>
// Function to show alert message
function showAlert(type, message) {
    // Remove any existing alerts
    const existingAlert = document.querySelector('.alert');
    if (existingAlert) {
        existingAlert.remove();
    }
    
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
    alertDiv.setAttribute('role', 'alert');
    
    const icon = type === 'success' ? 'check-circle' : 'exclamation-circle';
    
    alertDiv.innerHTML = `
        <i class="bi bi-${icon} me-2"></i> ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    
    const container = document.querySelector('.container-fluid');
    if (container && container.firstChild) {
        container.insertBefore(alertDiv, container.firstChild);
    }
    
    // Auto hide after 5 seconds
    setTimeout(() => {
        const alert = bootstrap.Alert.getOrCreateInstance(alertDiv);
        if (alert) {
            alert.close();
        }
    }, 5000);
}

// Function to upload photo
async function uploadPhoto(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        
        // Validate file size (max 2MB)
        if (file.size > 2048 * 1024) {
            showAlert('error', 'File terlalu besar! Maksimal 2MB');
            return;
        }

        // Validate file type
        const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        if (!allowedTypes.includes(file.type)) {
            showAlert('error', 'Format file tidak didukung. Gunakan format JPG, PNG, atau GIF');
            return;
        }

        const formData = new FormData();
        formData.append('photo', file);

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            const response = await fetch('{{ route("profile.photo") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                // Update photo preview
                const photoElement = document.getElementById('profilePhoto');
                if (photoElement.tagName === 'IMG') {
                    photoElement.src = data.photo_url + '?t=' + new Date().getTime();
                } else {
                    // Replace placeholder with image
                    photoElement.outerHTML = `<img src="${data.photo_url}?t=${new Date().getTime()}" alt="Profile Photo" class="profile-photo" id="profilePhoto">`;
                }

                showAlert('success', data.message);
                
                // Update photo preview
                const photoElement = document.getElementById('profilePhoto');
                if (photoElement.tagName === 'IMG') {
                    // Force refresh the image by adding a timestamp
                    photoElement.src = data.photo_url + '?t=' + new Date().getTime();
                } else {
                    // Replace placeholder with image
                    photoElement.outerHTML = `<img src="${data.photo_url}?t=${new Date().getTime()}" alt="Profile Photo" class="profile-photo" id="profilePhoto">`;
                }
                
                // Update sidebar photo after a short delay
                setTimeout(() => {
                    const sidebarPhoto = document.querySelector('.sidebar .profile-photo');
                    if (sidebarPhoto) {
                        sidebarPhoto.src = data.photo_url + '?t=' + new Date().getTime();
                    }
                }, 500);
            } else {
                showAlert('error', data.message || 'Gagal mengupload foto');
            }
        } catch (error) {
            console.error('Error:', error);
            showAlert('error', 'Terjadi kesalahan saat mengupload foto');
        }
    }
}
</script>
