@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h2><i class="bi bi-person-circle"></i> Profil Saya</h2>
                <p>Kelola informasi profil dan pengaturan akun</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <!-- Profile Card -->
            <div class="card">
                <div class="card-body text-center">
                    <div class="profile-avatar mb-3">
                        <img src="{{ asset('images/smkn4.jpg') }}" alt="Profile Avatar" class="avatar-image">
                        <button class="avatar-edit-btn" data-bs-toggle="modal" data-bs-target="#avatarModal">
                            <i class="bi bi-camera"></i>
                        </button>
                    </div>
                    <h5 class="card-title">{{ Auth::user()->name }}</h5>
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                    <div class="profile-status">
                        <span class="badge bg-success">Aktif</span>
                        <span class="badge bg-primary">Siswa</span>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="mb-0"><i class="bi bi-bar-chart"></i> Statistik</h6>
                </div>
                <div class="card-body">
                    <div class="stat-item mb-3">
                        <div class="stat-label">Login Terakhir</div>
                        <div class="stat-value">Hari ini</div>
                    </div>
                    <div class="stat-item mb-3">
                        <div class="stat-label">Total Login</div>
                        <div class="stat-value">47 kali</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Bergabung Sejak</div>
                        <div class="stat-value">Jan 2024</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <!-- Profile Information -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Profil</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">NIS</label>
                                <input type="text" class="form-control" value="2024001">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Kelas</label>
                                <input type="text" class="form-control" value="XII TKJ 1">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Jurusan</label>
                                <input type="text" class="form-control" value="Teknik Komputer dan Jaringan">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tahun Masuk</label>
                                <input type="text" class="form-control" value="2022">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" value="Bogor">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" value="2006-05-15">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select">
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Agama</label>
                                <select class="form-select">
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Katolik</option>
                                    <option>Hindu</option>
                                    <option>Buddha</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" rows="3">Jl. Raya Bogor No. 123, Kota Bogor, Jawa Barat</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">No. Telepon</label>
                                <input type="tel" class="form-control" value="08123456789">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nama Orang Tua</label>
                                <input type="text" class="form-control" value="Ahmad Supriadi">
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Change Password -->
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="mb-0">Ubah Password</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Password Lama</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Password Baru</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-key"></i> Ubah Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Academic Information -->
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Akademik</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="academic-item mb-3">
                                <label class="form-label fw-bold">Semester Saat Ini</label>
                                <p class="mb-0">Semester 6 (Genap)</p>
                            </div>
                            <div class="academic-item mb-3">
                                <label class="form-label fw-bold">Status Akademik</label>
                                <p class="mb-0">Aktif</p>
                            </div>
                            <div class="academic-item mb-3">
                                <label class="form-label fw-bold">Wali Kelas</label>
                                <p class="mb-0">Siti Nurhaliza, S.Pd</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="academic-item mb-3">
                                <label class="form-label fw-bold">Rata-rata Nilai</label>
                                <p class="mb-0">8.5</p>
                            </div>
                            <div class="academic-item mb-3">
                                <label class="form-label fw-bold">Ranking Kelas</label>
                                <p class="mb-0">3 dari 36 siswa</p>
                            </div>
                            <div class="academic-item mb-3">
                                <label class="form-label fw-bold">Sertifikasi</label>
                                <p class="mb-0">CCNA, Microsoft Office</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Avatar Modal -->
<div class="modal fade" id="avatarModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Foto Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <img src="{{ asset('images/smkn4.jpg') }}" alt="Current Avatar" class="img-fluid rounded" style="max-width: 200px;">
                </div>
                <div class="mb-3">
                    <label class="form-label">Pilih Foto Baru</label>
                    <input type="file" class="form-control" accept="image/*">
                </div>
                <small class="text-muted">Format yang didukung: JPG, PNG. Maksimal 2MB.</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</div>

<style>
.profile-avatar {
    position: relative;
    display: inline-block;
}

.avatar-image {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #fff;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.avatar-edit-btn {
    position: absolute;
    bottom: 5px;
    right: 5px;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: #007bff;
    color: white;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background-color 0.3s;
}

.avatar-edit-btn:hover {
    background: #0056b3;
}

.profile-status {
    margin-top: 15px;
}

.profile-status .badge {
    margin: 0 5px;
}

.stat-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.stat-label {
    color: #6c757d;
    font-size: 14px;
}

.stat-value {
    font-weight: 600;
    color: #495057;
}

.academic-item label {
    color: #6c757d;
    font-size: 14px;
}

.academic-item p {
    color: #495057;
    font-size: 16px;
}

.form-control:read-only {
    background-color: #f8f9fa;
}

@media (max-width: 768px) {
    .profile-avatar {
        margin-bottom: 20px;
    }
    
    .card-body {
        padding: 1rem;
    }
}
</style>
@endsection
