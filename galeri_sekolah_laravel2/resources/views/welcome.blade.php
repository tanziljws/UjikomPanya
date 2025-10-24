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
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#programs">Program</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link login-btn" href="{{ route('login') }}">
                            <i class="bi bi-person"></i>
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="hero-bg">
            <div class="hero-shape hero-shape-1"></div>
            <div class="hero-shape hero-shape-2"></div>
            <div class="hero-shape hero-shape-3"></div>
        </div>
        
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title">
                            Selamat Datang di Galeri
                            <span class="highlight">SMK Negeri 4</span>
                        </h1>
                        <p class="hero-subtitle">
                            Kumpulan Foto Kegiatan dan Prestasi SMK Negeri 4 Kota Bogor
                        </p>
                        <div class="hero-buttons">
                            <a href="#about" class="btn btn-primary btn-lg">
                                <i class="bi bi-info-circle"></i>
                                Pelajari Lebih Lanjut
                            </a>
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">
                                <i class="bi bi-person"></i>
                                Login Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image">
                        <img src="{{ asset('images/logosmkn4.png') }}" alt="SMK Negeri 4" class="hero-logo">
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

    <!-- Login Section -->
    <section class="login-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-card">
                        <div class="login-header">
                            <h2>Akses Sistem</h2>
                            <p>Login untuk mengakses informasi dan layanan sekolah</p>
                        </div>
                        <div class="login-options">
                            <a href="{{ route('login') }}" class="login-option">
                                <div class="option-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="option-content">
                                    <h4>User Login</h4>
                                    <p>Untuk siswa, guru, dan staff</p>
                                </div>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            <a href="{{ route('admin.login') }}" class="login-option">
                                <div class="option-icon admin">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                                <div class="option-content">
                                    <h4>Admin Login</h4>
                                    <p>Untuk administrator sistem</p>
                                </div>
                                <i class="bi bi-arrow-right"></i>
                            </a>
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
        background: linear-gradient(135deg, #1a1a1a 0%, #1a2332 50%, #1a1a1a 100%);
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

    .hero-shape {
        position: absolute;
        border-radius: 50%;
        background: linear-gradient(45deg, #1e3a8a, #1e40af);
        opacity: 0.1;
        animation: float 6s ease-in-out infinite;
    }

    .hero-shape-1 {
        width: 400px;
        height: 400px;
        top: -200px;
        right: -200px;
        animation-delay: 0s;
    }

    .hero-shape-2 {
        width: 300px;
        height: 300px;
        bottom: -150px;
        left: -150px;
        animation-delay: 2s;
    }

    .hero-shape-3 {
        width: 200px;
        height: 200px;
        top: 50%;
        left: 10%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-title {
        font-family: 'Poppins', sans-serif;
        font-size: 3.5rem;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 1.5rem;
    }

    .highlight {
        background: linear-gradient(135deg, #1e3a8a, #1e40af);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-subtitle {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
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

    .hero-image {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .hero-logo {
        width: 300px;
        height: 350px;
        object-fit: contain;
        filter: drop-shadow(0 10px 20px rgba(30, 58, 138, 0.3));
        animation: logoFloat 4s ease-in-out infinite;
    }

    @keyframes logoFloat {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
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

    /* Login Section */
    .login-section {
        padding: 5rem 0;
        background: #1a1a1a;
    }

    .login-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 3rem;
        text-align: center;
    }

    .login-header h2 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        margin-bottom: 1rem;
        color: white;
    }

    .login-header p {
        color: rgba(255, 255, 255, 0.7);
        margin-bottom: 2rem;
    }

    .login-options {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .login-option {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        text-decoration: none;
        color: white;
        transition: all 0.3s ease;
    }

    .login-option:hover {
        background: rgba(30, 58, 138, 0.1);
        border-color: rgba(30, 58, 138, 0.3);
        transform: translateX(10px);
        color: white;
    }

    .option-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #1e3a8a, #1e40af);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
    }

    .option-icon.admin {
        background: linear-gradient(135deg, #1e40af, #1e3a8a);
    }

    .option-content {
        flex: 1;
        text-align: left;
    }

    .option-content h4 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .option-content p {
        color: rgba(255, 255, 255, 0.7);
        margin: 0;
        font-size: 0.9rem;
    }

    .login-option i.bi-arrow-right {
        font-size: 1.2rem;
        opacity: 0.7;
        transition: all 0.3s ease;
    }

    .login-option:hover i.bi-arrow-right {
        opacity: 1;
        transform: translateX(5px);
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
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1rem;
        }
        
        .hero-buttons {
            flex-direction: column;
        }
        
        .hero-logo {
            width: 200px;
            height: 250px;
        }
        
        .login-card {
            padding: 2rem;
        }
        
        .feature-card {
            padding: 2rem 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 2rem;
        }
        
        .navbar-brand {
            gap: 0.5rem;
        }
        
        .brand-text {
            font-size: 1rem;
        }
        
        .hero-logo {
            width: 150px;
            height: 200px;
        }
    }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
