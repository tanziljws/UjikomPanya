<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 4 - Excellence in Vocational Education</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logosmkn4.png') }}" alt="SMK Negeri 4" class="navbar-logo">
                <span class="brand-text">SMK Negeri 4</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agenda') }}">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('informasi') }}">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('galeri') }}">Galeri</a>
                    </li>
                </ul>
                <div class="navbar-social d-none d-md-flex ms-3">
                    <a href="https://www.tiktok.com/@smkn4kotabogor" target="_blank" aria-label="TikTok SMKN 4 Kota Bogor" rel="noopener"><i class="bi bi-tiktok"></i></a>
                    <a href="https://www.instagram.com/smkn4kotabogor/" target="_blank" aria-label="Instagram SMKN 4 Kota Bogor" rel="noopener"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.youtube.com/@smknegeri4bogor05" target="_blank" aria-label="YouTube SMKN 4 Kota Bogor" rel="noopener"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="hero-bg">
            <img src="{{ asset('images/IMG_8933.JPG') }}" alt="SMK Negeri 4" class="hero-bg-image">
            <div class="hero-overlay"></div>
        </div>
        
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="hero-content">
                        <h1 class="hero-title">
                            <span class="hero-welcome">Selamat Datang di Galeri</span>
                            <span class="hero-school-name">SMK NEGERI 4</span>
                            <span class="hero-location">KOTA BOGOR</span>
                        </h1>
                        <p class="hero-subtitle">
                            Kumpulan Foto Kegiatan dan Prestasi SMK Negeri 4 Kota Bogor
                        </p>
                        <div class="hero-search">
                            <div class="search-container">
                                <input type="text" class="search-input" placeholder="Cari foto kegiatan...">
                                <button class="search-btn">
                                    <i class="bi bi-search"></i>
                                    Cari
                                </button>
                            </div>
                        </div>
                        <div class="hero-buttons">
                            <a href="{{ route('agenda') }}" class="btn btn-primary btn-lg">
                                <i class="bi bi-calendar-event"></i>
                                Lihat Agenda
                            </a>
                            <a href="{{ route('informasi') }}" class="btn btn-outline-light btn-lg">
                                <i class="bi bi-info-circle"></i>
                                Lihat Informasi
                            </a>
                            <a href="{{ route('galeri') }}" class="btn btn-outline-light btn-lg">
                                <i class="bi bi-images"></i>
                                Lihat Galeri
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-book"></i>
                        </div>
                        <h3>Pendidikan Berkualitas</h3>
                        <p>Kurikulum yang disesuaikan dengan kebutuhan industri dan teknologi terkini.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-tools"></i>
                        </div>
                        <h3>Praktik Langsung</h3>
                        <p>Fasilitas praktik yang lengkap untuk mengasah keterampilan siswa.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <h3>Siap Kerja</h3>
                        <p>Program magang dan kerjasama dengan industri untuk mempersiapkan karir.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Location Map Section -->
    <section class="location-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="section-title">Lokasi Sekolah</h2>
                    <p class="section-subtitle">SMK Negeri 4 Kota Bogor</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="map-container">
                        <div class="map-wrapper">
                            <iframe 
                                src="https://www.google.com/maps?q=SMK+Negeri+4+Kota+Bogor&hl=id&z=18&output=embed" 
                                width="100%" 
                                height="400" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-brand">
                        <img src="{{ asset('images/logosmkn4.png') }}" alt="SMK Negeri 4" class="footer-logo">
                        <h4>SMK Negeri 4</h4>
                        <p>Excellence in Vocational Education</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5>Kontak</h5>
                    <ul class="footer-links">
                        <li><i class="bi bi-geo-alt"></i> Jl. Raya Tajur, Kp. Buntar, Kota Bogor</li>
                        <li><i class="bi bi-telephone"></i> +62 251 123456</li>
                        <li><i class="bi bi-envelope"></i> info@smkn4.sch.id</li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5>Program Keahlian</h5>
                    <ul class="footer-links">
                        <li>Teknik Jaringan Komputer dan Telekomunikasi</li>
                        <li>Pengembangan Perangkat Lunak dan Gim</li>
                        <li>Teknik Otomotif</li>
                        <li>Teknik Pengelasan dan Fabrikasi Logam</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="footer-bottom">
                <p>&copy; 2024 SMK Negeri 4. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        background: #1a1a1a;
        color: #ffffff;
        overflow-x: hidden;
    }

    /* Navigation */
    .navbar {
        background: rgba(26, 26, 26, 0.95);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(30, 58, 138, 0.2);
        padding: 1rem 0;
        transition: all 0.3s ease;
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        gap: 1rem;
        color: #ffffff;
        text-decoration: none;
        font-weight: 600;
    }

    .navbar-logo {
        width: 40px;
        height: 45px;
        object-fit: contain;
    }

    .brand-text {
        font-family: 'Poppins', sans-serif;
        font-size: 1.25rem;
    }

    .navbar-nav .nav-link {
        color: rgba(255, 255, 255, 0.8);
        font-weight: 500;
        margin: 0 0.5rem;
        transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #1e3a8a;
    }

    /* Navbar social icons */
    .navbar-social { display: inline-flex; align-items: center; gap: 14px; }
    .navbar-social a { color: rgba(255,255,255,0.85); text-decoration: none; display: inline-flex; align-items: center; justify-content: center; width: 34px; height: 34px; border-radius: 8px; transition: all .2s ease; }
    .navbar-social a:hover { background: rgba(255,255,255,0.1); color: #fff; transform: translateY(-1px); }
    .navbar-social i { font-size: 1.1rem; line-height: 1; }

    .login-btn {
        background: linear-gradient(135deg, #1e3a8a, #1e40af);
        color: white !important;
        padding: 0.5rem 1.5rem !important;
        border-radius: 25px;
        margin-left: 1rem;
    }

    .login-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(30, 58, 138, 0.3);
    }

    .navbar-toggler {
        border: none;
        color: white;
    }

    .navbar-toggler:focus {
        box-shadow: none;
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .hero-bg-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
        filter: brightness(0.9) contrast(1.1) saturate(1.0);
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0.2) 50%, rgba(0, 0, 0, 0.4) 100%);
        z-index: 2;
    }

    .hero-content {
        position: relative;
        z-index: 3;
        text-align: center;
    }

    .hero-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 2rem;
    }

    .hero-welcome {
        display: block;
        font-size: 2rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 0.5rem;
        font-weight: 400;
    }

    .hero-school-name {
        display: block;
        font-size: 4.5rem;
        color: #ffffff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        margin-bottom: 0.5rem;
        font-weight: 800;
        letter-spacing: 2px;
    }

    .hero-location {
        display: block;
        font-size: 1.5rem;
        color: #1e3a8a;
        background: rgba(255, 255, 255, 0.9);
        padding: 0.5rem 1.5rem;
        border-radius: 25px;
        display: inline-block;
        font-weight: 600;
        text-shadow: none;
    }

    .hero-subtitle {
        font-size: 1.3rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 2.5rem;
        line-height: 1.6;
        font-weight: 500;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }

    .hero-search {
        margin-bottom: 2.5rem;
    }

    .search-container {
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        display: flex;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 50px;
        padding: 5px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .search-input {
        flex: 1;
        border: none;
        background: transparent;
        padding: 15px 25px;
        font-size: 1.1rem;
        outline: none;
        color: #333;
    }

    .search-input::placeholder {
        color: #666;
    }

    .search-btn {
        background: linear-gradient(135deg, #1e3a8a, #1e40af);
        color: white;
        border: none;
        padding: 15px 30px;
        border-radius: 45px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .search-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(30, 58, 138, 0.4);
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .btn {
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background: linear-gradient(135deg, #1e3a8a, #1e40af);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(30, 58, 138, 0.3);
        color: white;
    }

    .btn-outline-light {
        background: transparent;
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .btn-outline-light:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: white;
        color: white;
        transform: translateY(-2px);
    }


    /* Features Section */
    .features-section {
        padding: 5rem 0;
        background: #1a2332;
    }

    .feature-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 2.5rem 2rem;
        text-align: center;
        transition: all 0.3s ease;
        height: 100%;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(30, 58, 138, 0.2);
        border-color: rgba(30, 58, 138, 0.3);
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #1e3a8a, #1e40af);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        color: white;
    }

    .feature-card h3 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        margin-bottom: 1rem;
        color: white;
    }

    .feature-card p {
        color: rgba(255, 255, 255, 0.7);
        line-height: 1.6;
    }


    /* Location Section */
    .location-section {
        padding: 5rem 0;
        background: #1a2332;
    }

    .map-container {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .map-wrapper {
        position: relative;
        width: 100%;
        height: 400px;
    }

    .map-wrapper iframe {
        width: 100%;
        height: 100%;
        border: none;
    }


    /* Footer */
    .footer {
        background: #0f0f0f;
        padding: 3rem 0 1rem;
        border-top: 1px solid rgba(30, 58, 138, 0.2);
    }

    .footer-brand {
        text-align: center;
        margin-bottom: 2rem;
    }

    .footer-logo {
        width: 60px;
        height: 70px;
        object-fit: contain;
        margin-bottom: 1rem;
    }

    .footer-brand h4 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .footer-brand p {
        color: rgba(255, 255, 255, 0.7);
    }

    .footer h5 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        margin-bottom: 1rem;
        color: white;
    }

    .footer-links {
        list-style: none;
        padding: 0;
    }

    .footer-links li {
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .footer-links i {
        color: #1e3a8a;
        width: 16px;
    }

    .footer-bottom {
        text-align: center;
        padding-top: 2rem;
        color: rgba(255, 255, 255, 0.5);
        font-size: 0.9rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-welcome {
            font-size: 1.5rem;
        }
        
        .hero-school-name {
            font-size: 3rem;
        }
        
        .hero-location {
            font-size: 1.2rem;
            padding: 0.4rem 1.2rem;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
        }
        
        .search-container {
            max-width: 90%;
        }
        
        .search-input {
            padding: 12px 20px;
            font-size: 1rem;
        }
        
        .search-btn {
            padding: 12px 25px;
        }
        
        .hero-buttons {
            flex-direction: column;
            align-items: center;
            gap: 0.8rem;
        }
        
        .hero-buttons .btn {
            width: 100%;
            max-width: 300px;
        }
        
        .login-card {
            padding: 2rem;
        }
        
        .feature-card {
            padding: 2rem 1.5rem;
        }
        
    }

    @media (max-width: 480px) {
        .hero-welcome {
            font-size: 1.2rem;
        }
        
        .hero-school-name {
            font-size: 2.5rem;
            letter-spacing: 1px;
        }
        
        .hero-location {
            font-size: 1rem;
            padding: 0.3rem 1rem;
        }
        
        .hero-subtitle {
            font-size: 1rem;
        }
        
        .search-container {
            flex-direction: column;
            border-radius: 15px;
            padding: 10px;
        }
        
        .search-input {
            margin-bottom: 10px;
            border-radius: 10px;
            background: white;
            border: 1px solid #ddd;
        }
        
        .search-btn {
            border-radius: 10px;
        }
        
        .navbar-brand {
            gap: 0.5rem;
        }
        
        .brand-text {
            font-size: 1rem;
        }
        
        .map-wrapper {
            height: 300px;
        }
        
    }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
