@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">📅 Agenda Sekolah</h2>
            
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card agenda-card">
                        <div class="card-header agenda-header-current">
                            <h5 class="mb-0">📅 Agenda Bulan Ini</h5>
                        </div>
                        <div class="card-body">
                            <div class="agenda-item mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="date-badge date-urgent rounded p-2 me-3">
                                        <div class="text-center">
                                            <div class="fw-bold">15</div>
                                            <small>Okt</small>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 agenda-title">Rapat Guru</h6>
                                        <p class="text-muted mb-0">08:00 - 10:00 WIB</p>
                                        <small class="text-muted">Aula Sekolah</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="agenda-item mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="date-badge date-important rounded p-2 me-3">
                                        <div class="text-center">
                                            <div class="fw-bold">20</div>
                                            <small>Okt</small>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 agenda-title">Ujian Tengah Semester</h6>
                                        <p class="text-muted mb-0">07:30 - 12:00 WIB</p>
                                        <small class="text-muted">Semua Kelas</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="agenda-item mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="date-badge date-event rounded p-2 me-3">
                                        <div class="text-center">
                                            <div class="fw-bold">25</div>
                                            <small>Okt</small>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 agenda-title">Kunjungan Industri</h6>
                                        <p class="text-muted mb-0">08:00 - 15:00 WIB</p>
                                        <small class="text-muted">Kelas XII</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">
                    <div class="card agenda-card">
                        <div class="card-header agenda-header-upcoming">
                            <h5 class="mb-0">📋 Agenda Mendatang</h5>
                        </div>
                        <div class="card-body">
                            <div class="agenda-item mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="date-badge date-holiday rounded p-2 me-3">
                                        <div class="text-center">
                                            <div class="fw-bold">01</div>
                                            <small>Nov</small>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 agenda-title">Libur Sekolah</h6>
                                        <p class="text-muted mb-0">Hari Libur Nasional</p>
                                        <small class="text-muted">Semua Siswa</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="agenda-item mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="date-badge date-workshop rounded p-2 me-3">
                                        <div class="text-center">
                                            <div class="fw-bold">05</div>
                                            <small>Nov</small>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 agenda-title">Workshop Teknologi</h6>
                                        <p class="text-muted mb-0">09:00 - 16:00 WIB</p>
                                        <small class="text-muted">Lab Komputer</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="agenda-item mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="date-badge date-exam rounded p-2 me-3">
                                        <div class="text-center">
                                            <div class="fw-bold">10</div>
                                            <small>Nov</small>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 agenda-title">Ujian Praktik</h6>
                                        <p class="text-muted mb-0">08:00 - 15:00 WIB</p>
                                        <small class="text-muted">Kelas XII</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Agenda Details -->
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card agenda-card">
                        <div class="card-header agenda-header-details">
                            <h5 class="mb-0">📝 Detail Agenda</h5>
                        </div>
                        <div class="card-body">
                            <div class="agenda-detail-item mb-4">
                                <div class="detail-header">
                                    <h6 class="detail-title">Rapat Guru</h6>
                                    <span class="detail-date">15 Oktober 2024</span>
                                </div>
                                <div class="detail-content">
                                    <p class="mb-2"><strong>Waktu:</strong> 08:00 - 10:00 WIB</p>
                                    <p class="mb-2"><strong>Tempat:</strong> Aula Sekolah</p>
                                    <p class="mb-2"><strong>Peserta:</strong> Seluruh Guru dan Staff</p>
                                    <p class="mb-0"><strong>Agenda:</strong></p>
                                    <ul class="mb-0">
                                        <li>Evaluasi pembelajaran semester ganjil</li>
                                        <li>Persiapan UTS</li>
                                        <li>Koordinasi kegiatan ekstrakurikuler</li>
                                        <li>Pembahasan program sekolah</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="agenda-detail-item mb-4">
                                <div class="detail-header">
                                    <h6 class="detail-title">Ujian Tengah Semester (UTS)</h6>
                                    <span class="detail-date">20-25 Oktober 2024</span>
                                </div>
                                <div class="detail-content">
                                    <p class="mb-2"><strong>Waktu:</strong> 07:30 - 12:00 WIB</p>
                                    <p class="mb-2"><strong>Tempat:</strong> Ruang Kelas Masing-masing</p>
                                    <p class="mb-2"><strong>Peserta:</strong> Semua Siswa</p>
                                    <p class="mb-0"><strong>Mata Pelajaran:</strong></p>
                                    <ul class="mb-0">
                                        <li>Matematika, Bahasa Indonesia, Bahasa Inggris</li>
                                        <li>Pendidikan Agama, PPKN, Sejarah</li>
                                        <li>Mata Pelajaran Kejuruan</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="agenda-detail-item">
                                <div class="detail-header">
                                    <h6 class="detail-title">Kunjungan Industri</h6>
                                    <span class="detail-date">25 Oktober 2024</span>
                                </div>
                                <div class="detail-content">
                                    <p class="mb-2"><strong>Waktu:</strong> 08:00 - 15:00 WIB</p>
                                    <p class="mb-2"><strong>Tempat:</strong> PT. Industri Maju</p>
                                    <p class="mb-2"><strong>Peserta:</strong> Kelas XII</p>
                                    <p class="mb-0"><strong>Kegiatan:</strong></p>
                                    <ul class="mb-0">
                                        <li>Observasi proses produksi</li>
                                        <li>Praktik kerja industri</li>
                                        <li>Diskusi dengan praktisi</li>
                                        <li>Penyusunan laporan kunjungan</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card agenda-card">
                        <div class="card-header agenda-header-calendar">
                            <h5 class="mb-0">📅 Kalender Akademik</h5>
                        </div>
                        <div class="card-body">
                            <div class="calendar-item mb-3">
                                <div class="calendar-date">Okt 2024</div>
                                <div class="calendar-events">
                                    <div class="event-item">15 - Rapat Guru</div>
                                    <div class="event-item">20-25 - UTS</div>
                                    <div class="event-item">25 - Kunjungan Industri</div>
                                </div>
                            </div>
                            
                            <div class="calendar-item mb-3">
                                <div class="calendar-date">Nov 2024</div>
                                <div class="calendar-events">
                                    <div class="event-item">01 - Libur Nasional</div>
                                    <div class="event-item">05 - Workshop</div>
                                    <div class="event-item">10 - Ujian Praktik</div>
                                </div>
                            </div>
                            
                            <div class="calendar-item">
                                <div class="calendar-date">Des 2024</div>
                                <div class="calendar-events">
                                    <div class="event-item">15-20 - UAS</div>
                                    <div class="event-item">25 - Libur Natal</div>
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
/* Agenda page specific styles */
.agenda-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.9);
    overflow: hidden;
}

.agenda-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(30, 58, 138, 0.2);
}

/* Card headers with blue theme */
.agenda-header-current {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

.agenda-header-upcoming {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

.agenda-header-details {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

.agenda-header-calendar {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    border: none;
    border-radius: 12px 12px 0 0;
    padding: 15px 20px;
    font-weight: 600;
}

/* Agenda items */
.agenda-item {
    padding: 15px;
    border-radius: 8px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 1px solid transparent;
    transition: all 0.3s ease;
}

.agenda-item:hover {
    background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
    transform: translateX(5px);
    border-color: #1e3a8a;
}

.agenda-title {
    color: #1e3a8a;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

/* Date badges with maroon theme */
.date-badge {
    min-width: 60px;
    font-weight: 600;
    color: white;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.date-urgent {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
}

.date-important {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
}

.date-event {
    background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
}

.date-holiday {
    background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
    color: #212529;
}

.date-workshop {
    background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
}

.date-exam {
    background: linear-gradient(135deg, #6f42c1 0%, #5a2d91 100%);
}

/* Detail items */
.agenda-detail-item {
    padding: 20px;
    border-radius: 8px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 1px solid transparent;
    transition: all 0.3s ease;
}

.agenda-detail-item:hover {
    background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
    border-color: #1e3a8a;
}

.detail-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 2px solid #1e3a8a;
}

.detail-title {
    color: #1e3a8a;
    font-weight: 700;
    margin: 0;
}

.detail-date {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
}

.detail-content p {
    color: #6c757d;
    margin-bottom: 0.5rem;
}

.detail-content ul {
    color: #6c757d;
    padding-left: 20px;
}

.detail-content li {
    margin-bottom: 0.25rem;
}

/* Calendar items */
.calendar-item {
    padding: 15px;
    border-radius: 8px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 1px solid transparent;
    transition: all 0.3s ease;
}

.calendar-item:hover {
    background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
    border-color: #1e3a8a;
}

.calendar-date {
    color: #1e3a8a;
    font-weight: 700;
    font-size: 1.1rem;
    margin-bottom: 10px;
    text-align: center;
    padding: 5px;
    background: rgba(30, 58, 138, 0.1);
    border-radius: 5px;
}

.calendar-events {
    font-size: 0.9rem;
}

.event-item {
    color: #6c757d;
    padding: 3px 0;
    border-bottom: 1px solid rgba(30, 58, 138, 0.1);
}

.event-item:last-child {
    border-bottom: none;
}

/* Text styling */
.text-muted {
    color: #6c757d !important;
}

/* Responsive design */
@media (max-width: 768px) {
    .detail-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
    
    .calendar-item {
        margin-bottom: 1rem;
    }
    
    .agenda-item {
        margin-bottom: 1rem;
    }
}

/* Animation for cards */
.agenda-card {
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
.agenda-item,
.agenda-detail-item,
.calendar-item {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
</style>
@endsection 