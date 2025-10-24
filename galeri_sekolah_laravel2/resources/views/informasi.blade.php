@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">ℹ️ Informasi Sekolah</h2>
            
            <!-- Pengumuman Penting -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card info-card">
                        <div class="card-header info-header-announcement">
                            <h5 class="mb-0">🚨 Pengumuman Penting</h5>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-maroon mb-3">
                                <strong>Ujian Tengah Semester (UTS)</strong><br>
                                UTS akan dilaksanakan pada tanggal 20-25 Oktober 2024. Semua siswa diharapkan mempersiapkan diri dengan baik.
                            </div>
                            <div class="alert alert-maroon-light mb-0">
                                <strong>Libur Sekolah</strong><br>
                                Sekolah akan libur pada tanggal 1 November 2024 dalam rangka Hari Libur Nasional.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Informasi Umum -->
            <div class="row mb-4">
                <div class="col-md-6 mb-4">
                    <div class="card info-card h-100">
                        <div class="card-header info-header-profile">
                            <h5 class="mb-0">🏫 Profil Sekolah</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <strong>Nama Sekolah:</strong> SMKN 4
                                </li>
                                <li class="mb-2">
                                    <strong>Alamat:</strong> Jl. Pendidikan No. 123, Kota
                                </li>
                                <li class="mb-2">
                                    <strong>Telepon:</strong> (021) 1234-5678
                                </li>
                                <li class="mb-2">
                                    <strong>Email:</strong> info@smkn4.sch.id
                                </li>
                                <li class="mb-2">
                                    <strong>Website:</strong> www.smkn4.sch.id
                                </li>
                                <li class="mb-2">
                                    <strong>Kepala Sekolah:</strong> Dr. Ahmad Supriadi, M.Pd
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">
                    <div class="card info-card h-100">
                        <div class="card-header info-header-programs">
                            <h5 class="mb-0">📚 Program Keahlian</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="text-center p-3 bg-light rounded program-item">
                                        <h6 class="mb-2">💻 TJKT</h6>
                                        <small class="text-muted">Teknik Jaringan Komputer dan Telekomunikasi</small>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="text-center p-3 bg-light rounded program-item">
                                        <h6 class="mb-2">🎨 PPLG</h6>
                                        <small class="text-muted">Pengembangan Perangkat Lunak dan Gim</small>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="text-center p-3 bg-light rounded program-item">
                                        <h6 class="mb-2">🏭 TO</h6>
                                        <small class="text-muted">Teknik Otomotif</small>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="text-center p-3 bg-light rounded program-item">
                                        <h6 class="mb-2">⚡ TPFL</h6>
                                        <small class="text-muted">Teknik Pengelasan dan Fabrikasi Logam</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Jadwal Sekolah -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card info-card">
                        <div class="card-header info-header-schedule">
                            <h5 class="mb-0">⏰ Jadwal Sekolah</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="schedule-item">
                                        <div class="schedule-time">07:00 - 07:15</div>
                                        <div class="schedule-activity">Upacara Bendera</div>
                                        <div class="schedule-location">Lapangan Sekolah</div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="schedule-item">
                                        <div class="schedule-time">07:15 - 12:00</div>
                                        <div class="schedule-activity">Kegiatan Belajar Mengajar</div>
                                        <div class="schedule-location">Ruang Kelas</div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="schedule-item">
                                        <div class="schedule-time">12:00 - 12:30</div>
                                        <div class="schedule-activity">Istirahat Siang</div>
                                        <div class="schedule-location">Kantin Sekolah</div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="schedule-item">
                                        <div class="schedule-time">12:30 - 15:30</div>
                                        <div class="schedule-activity">Kegiatan Belajar Mengajar</div>
                                        <div class="schedule-location">Ruang Kelas/Lab</div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="schedule-item">
                                        <div class="schedule-time">15:30 - 17:00</div>
                                        <div class="schedule-activity">Ekstrakurikuler</div>
                                        <div class="schedule-location">Berbagai Lokasi</div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="schedule-item">
                                        <div class="schedule-time">17:00 - 18:00</div>
                                        <div class="schedule-activity">Kebersihan & Penutupan</div>
                                        <div class="schedule-location">Seluruh Area</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Fasilitas & Prestasi -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card info-card h-100">
                        <div class="card-header info-header-facilities">
                            <h5 class="mb-0">🏢 Fasilitas Sekolah</h5>
                        </div>
                        <div class="card-body">
                            <div class="facility-list">
                                <div class="facility-item">
                                    <span class="facility-icon">💻</span>
                                    <span class="facility-text">Lab Komputer (3 ruang)</span>
                                </div>
                                <div class="facility-item">
                                    <span class="facility-icon">🔧</span>
                                    <span class="facility-text">Bengkel Praktik</span>
                                </div>
                                <div class="facility-item">
                                    <span class="facility-icon">📚</span>
                                    <span class="facility-text">Perpustakaan Digital</span>
                                </div>
                                <div class="facility-item">
                                    <span class="facility-icon">🏃</span>
                                    <span class="facility-text">Lapangan Olahraga</span>
                                </div>
                                <div class="facility-item">
                                    <span class="facility-icon">🕌</span>
                                    <span class="facility-text">Musholla</span>
                                </div>
                                <div class="facility-item">
                                    <span class="facility-icon">🚌</span>
                                    <span class="facility-text">Bus Sekolah</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">
                    <div class="card info-card h-100">
                        <div class="card-header info-header-achievements">
                            <h5 class="mb-0">🏆 Prestasi Terbaru</h5>
                        </div>
                        <div class="card-body">
                            <div class="achievement-list">
                                <div class="achievement-item">
                                    <div class="achievement-year">2024</div>
                                    <div class="achievement-content">
                                        <h6>Juara 1 LKS Tingkat Provinsi</h6>
                                        <p>Bidang Teknik Jaringan Komputer</p>
                                    </div>
                                </div>
                                <div class="achievement-item">
                                    <div class="achievement-year">2023</div>
                                    <div class="achievement-content">
                                        <h6>Juara 2 Robotik Nasional</h6>
                                        <p>Kategori Robot Line Follower</p>
                                    </div>
                                </div>
                                <div class="achievement-item">
                                    <div class="achievement-year">2023</div>
                                    <div class="achievement-content">
                                        <h6>Juara 1 OSN Tingkat Kota</h6>
                                        <p>Bidang Matematika</p>
                                    </div>
                                </div>
                                <div class="achievement-item">
                                    <div class="achievement-year">2022</div>
                                    <div class="achievement-content">
                                        <h6>Sekolah Adiwiyata</h6>
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

<style>
/* Information page specific styles */
.info-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.9);
    overflow: hidden;
}

.info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(30, 58, 138, 0.2);
}

/* Card headers with blue theme */
.info-header-announcement {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

.info-header-profile {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

.info-header-programs {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

.info-header-schedule {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

.info-header-facilities {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

.info-header-achievements {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

/* Alert styling */
.alert-maroon {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 8px;
    padding: 15px;
    font-weight: 500;
}

.alert-maroon-light {
    background: linear-gradient(135deg, rgba(30, 58, 138, 0.1) 0%, rgba(30, 64, 175, 0.1) 100%);
    color: #1e3a8a;
    border: 2px solid #1e3a8a;
    border-radius: 8px;
    padding: 15px;
    font-weight: 500;
}

/* Program items */
.program-item {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

.program-item:hover {
    transform: translateY(-3px);
    border-color: #1e3a8a;
    box-shadow: 0 4px 15px rgba(30, 58, 138, 0.2);
}

.program-item h6 {
    color: #1e3a8a;
    font-weight: 600;
}

/* Schedule items */
.schedule-item {
    padding: 15px;
    border-radius: 8px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 1px solid transparent;
    transition: all 0.3s ease;
    text-align: center;
}

.schedule-item:hover {
    background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
    transform: translateY(-3px);
    border-color: #1e3a8a;
}

.schedule-time {
    color: #1e3a8a;
    font-weight: 700;
    font-size: 1.1rem;
    margin-bottom: 5px;
}

.schedule-activity {
    color: #495057;
    font-weight: 600;
    margin-bottom: 3px;
}

.schedule-location {
    color: #6c757d;
    font-size: 0.9rem;
}

/* Facility items */
.facility-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.facility-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 8px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 1px solid transparent;
    transition: all 0.3s ease;
}

.facility-item:hover {
    background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
    transform: translateX(5px);
    border-color: #1e3a8a;
}

.facility-icon {
    font-size: 1.5rem;
    margin-right: 15px;
    min-width: 30px;
}

.facility-text {
    color: #495057;
    font-weight: 500;
}

/* Achievement items */
.achievement-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.achievement-item {
    display: flex;
    align-items: flex-start;
    padding: 15px;
    border-radius: 8px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 1px solid transparent;
    transition: all 0.3s ease;
}

.achievement-item:hover {
    background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
    transform: translateX(5px);
    border-color: #1e3a8a;
}

.achievement-year {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    padding: 8px 12px;
    border-radius: 20px;
    font-weight: 600;
    margin-right: 15px;
    min-width: 50px;
    text-align: center;
    font-size: 0.9rem;
}

.achievement-content h6 {
    color: #1e3a8a;
    font-weight: 600;
    margin-bottom: 5px;
    font-size: 1rem;
}

.achievement-content p {
    color: #6c757d;
    margin: 0;
    font-size: 0.9rem;
}

/* List styling */
.list-unstyled li {
    color: #495057;
    padding: 5px 0;
    border-bottom: 1px solid rgba(30, 58, 138, 0.1);
}

.list-unstyled li:last-child {
    border-bottom: none;
}

.list-unstyled strong {
    color: #1e3a8a;
    font-weight: 600;
}

/* Text styling */
.text-muted {
    color: #6c757d !important;
}

/* Responsive design */
@media (max-width: 768px) {
    .schedule-item {
        margin-bottom: 1rem;
    }
    
    .facility-item,
    .achievement-item {
        margin-bottom: 0.5rem;
    }
    
    .program-item {
        margin-bottom: 1rem;
    }
}

/* Animation for cards */
.info-card {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Hover effects */
.info-card,
.schedule-item,
.facility-item,
.achievement-item,
.program-item {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
</style>
@endsection 