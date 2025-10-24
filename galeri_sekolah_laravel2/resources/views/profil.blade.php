@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="text-center mb-5">
                <div class="profile-logo mb-4">
                    <img src="{{ asset('images/logosmkn4.png') }}" alt="SMK Negeri 4 Kota Bogor" class="profile-logo-img">
                </div>
                <h1 class="display-4 mb-3">🏫 SMK Negeri 4 Kota Bogor</h1>
                <p class="lead text-muted">Mencetak Generasi Unggul, Siap Kerja, dan Berwawasan Lingkungan</p>
            </div>
            
            <!-- Visi Misi -->
            <div class="row mb-5">
                <div class="col-md-6 mb-4">
                    <div class="card profile-card">
                        <div class="card-header profile-header-vision">
                            <h5 class="mb-0">🎯 Visi</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-0">"Menjadi SMK Unggulan yang menghasilkan lulusan berkualitas, siap kerja, berwawasan lingkungan, dan mampu bersaing di era global"</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card profile-card">
                        <div class="card-header profile-header-mission">
                            <h5 class="mb-0">🎯 Misi</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">• Menyelenggarakan pendidikan berkualitas</li>
                                <li class="mb-2">• Mengembangkan kompetensi siswa</li>
                                <li class="mb-2">• Meningkatkan kerjasama dengan dunia industri</li>
                                <li class="mb-2">• Menumbuhkan karakter berwawasan lingkungan</li>
                                <li>• Mengembangkan teknologi pembelajaran modern</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Informasi Umum -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card profile-card">
                        <div class="card-header profile-header-info">
                            <h5 class="mb-0">📋 Informasi Umum</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="fw-bold" width="40%">Nama Sekolah</td>
                                            <td>: SMK Negeri 4 Kota Bogor</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">NPSN</td>
                                            <td>: 20200876</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Status</td>
                                            <td>: Negeri</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Bentuk Pendidikan</td>
                                            <td>: SMK</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Status Kepemilikan</td>
                                            <td>: Pemerintah Daerah</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">SK Pendirian</td>
                                            <td>: 421.3/Kep.123-Disdik/2010</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="fw-bold" width="40%">Tahun Berdiri</td>
                                            <td>: 2010</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">SK Operasional</td>
                                            <td>: 421.3/Kep.124-Disdik/2010</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Kurikulum</td>
                                            <td>: Kurikulum 2013</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Akreditasi</td>
                                            <td>: A (Unggul)</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Kepala Sekolah</td>
                                            <td>: Dr. Ahmad Supriadi, M.Pd</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Wakil Kepala Sekolah</td>
                                            <td>: Siti Nurhaliza, S.Pd</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Program Keahlian -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card profile-card">
                        <div class="card-header profile-header-programs">
                            <h5 class="mb-0">📚 Program Keahlian</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="program-card">
                                        <div class="program-icon">💻</div>
                                        <h6 class="program-title">TJKT</h6>
                                        <p class="program-desc">Teknik Jaringan Komputer dan Telekomunikasi</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="program-card">
                                        <div class="program-icon">🎨</div>
                                        <h6 class="program-title">PPLG</h6>
                                        <p class="program-desc">Pengembangan Perangkat Lunak dan Gim</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="program-card">
                                        <div class="program-icon">🏭</div>
                                        <h6 class="program-title">TO</h6>
                                        <p class="program-desc">Teknik Otomotif</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="program-card">
                                        <div class="program-icon">⚡</div>
                                        <h6 class="program-title">TPFL</h6>
                                        <p class="program-desc">Teknik Pengelasan dan Fabrikasi Logam</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Fasilitas -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card profile-card">
                        <div class="card-header profile-header-facilities">
                            <h5 class="mb-0">🏢 Fasilitas Sekolah</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="facility-item">
                                        <div class="facility-icon">💻</div>
                                        <div class="facility-info">
                                            <h6>Lab Komputer</h6>
                                            <p>3 ruang lab komputer dengan 120 unit komputer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="facility-item">
                                        <div class="facility-icon">🔧</div>
                                        <div class="facility-info">
                                            <h6>Bengkel Praktik</h6>
                                            <p>Bengkel otomotif, mesin, dan las yang lengkap</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="facility-item">
                                        <div class="facility-icon">📚</div>
                                        <div class="facility-info">
                                            <h6>Perpustakaan</h6>
                                            <p>Perpustakaan digital dengan 5000+ koleksi buku</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="facility-item">
                                        <div class="facility-icon">🏃</div>
                                        <div class="facility-info">
                                            <h6>Lapangan Olahraga</h6>
                                            <p>Lapangan basket, futsal, dan voli yang luas</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="facility-item">
                                        <div class="facility-icon">🕌</div>
                                        <div class="facility-info">
                                            <h6>Musholla</h6>
                                            <p>Musholla yang nyaman untuk ibadah</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="facility-item">
                                        <div class="facility-icon">🚌</div>
                                        <div class="facility-info">
                                            <h6>Transportasi</h6>
                                            <p>Bus sekolah untuk kegiatan praktik industri</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Prestasi -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card profile-card">
                        <div class="card-header profile-header-achievements">
                            <h5 class="mb-0">🏆 Prestasi Sekolah</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="achievement-item">
                                        <div class="achievement-year">2024</div>
                                        <div class="achievement-content">
                                            <h6>Juara 1 Lomba Kompetensi Siswa (LKS) Tingkat Provinsi</h6>
                                            <p>Bidang Teknik Jaringan Komputer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="achievement-item">
                                        <div class="achievement-year">2023</div>
                                        <div class="achievement-content">
                                            <h6>Juara 2 Kompetisi Robotik Nasional</h6>
                                            <p>Kategori Robot Line Follower</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="achievement-item">
                                        <div class="achievement-year">2023</div>
                                        <div class="achievement-content">
                                            <h6>Juara 1 Olimpiade Sains Nasional (OSN)</h6>
                                            <p>Bidang Matematika Tingkat Kota</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="achievement-item">
                                        <div class="achievement-year">2022</div>
                                        <div class="achievement-content">
                                            <h6>Penghargaan Sekolah Adiwiyata</h6>
                                            <p>Program Lingkungan Hidup</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Profile page specific styles */
.profile-logo-img {
    width: 120px;
    height: 144px;
    object-fit: contain;
    filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
    transition: all 0.3s ease;
}

.profile-logo-img:hover {
    transform: scale(1.05);
    filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.4));
}

/* Card headers with blue theme */
.profile-header-vision {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

.profile-header-mission {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

.profile-header-info {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

.profile-header-programs {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

.profile-header-facilities {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

.profile-header-achievements {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

/* Program cards */
.program-card {
    text-align: center;
    padding: 2rem 1rem;
    border-radius: 12px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 2px solid transparent;
    transition: all 0.3s ease;
    height: 100%;
}

.program-card:hover {
    transform: translateY(-5px);
    border-color: #1e3a8a;
    box-shadow: 0 8px 25px rgba(30, 58, 138, 0.2);
}

.program-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
    display: block;
}

.program-title {
    color: #1e3a8a;
    font-weight: 700;
    margin-bottom: 0.5rem;
    font-size: 1.2rem;
}

.program-desc {
    color: #6c757d;
    font-size: 0.9rem;
    line-height: 1.4;
    margin: 0;
}

/* Facility items */
.facility-item {
    display: flex;
    align-items: center;
    padding: 1rem;
    border-radius: 8px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.facility-item:hover {
    background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
    transform: translateX(5px);
    border-color: #1e3a8a;
}

.facility-icon {
    font-size: 2rem;
    margin-right: 1rem;
    min-width: 50px;
}

.facility-info h6 {
    color: #1e3a8a;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.facility-info p {
    color: #6c757d;
    margin: 0;
    font-size: 0.9rem;
}

/* Achievement items */
.achievement-item {
    display: flex;
    align-items: flex-start;
    padding: 1rem;
    border-radius: 8px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.achievement-item:hover {
    background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
    transform: translateX(5px);
    border-color: #1e3a8a;
}

.achievement-year {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-weight: 600;
    margin-right: 1rem;
    min-width: 60px;
    text-align: center;
}

.achievement-content h6 {
    color: #1e3a8a;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.achievement-content p {
    color: #6c757d;
    margin: 0;
    font-size: 0.9rem;
}

/* Table styling */
.table-borderless td {
    border: none;
    padding: 0.5rem 0;
}

.fw-bold {
    color: #1e3a8a;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .profile-logo-img {
        width: 80px;
        height: 96px;
    }
    
    .program-card {
        margin-bottom: 1rem;
    }
    
    .facility-item,
    .achievement-item {
        margin-bottom: 1rem;
    }
}

/* Smooth animations */
.profile-card,
.program-card,
.facility-item,
.achievement-item {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
</style>
@endsection
