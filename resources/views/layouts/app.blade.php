<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Galeri Sekolah') - SMK Negeri 4 Kota Bogor</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #1e40af;
            --primary-dark: #1e3a8a;
            --secondary-color: #059669;
            --accent-color: #f59e0b;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --dark-color: #1f2937;
            --light-color: #f8fafc;
            --gray-color: #6b7280;
            --border-color: #e5e7eb;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
            /* Layout variables */
            --sidebar-width: 280px;
            --sidebar-gutter: 96px; /* larger gutter to guarantee content clear of sidebar */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            color: var(--dark-color);
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width) !important;
            background: linear-gradient(180deg, var(--primary-color) 0%, var(--primary-dark) 100%) !important;
            position: fixed !important;
            height: 100vh !important;
            overflow-y: auto;
            box-shadow: var(--shadow-xl);
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            left: 0;
            top: 0;
        }
        
        /* Modern Scrollbar for Sidebar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
            transition: background 0.3s ease;
        }
        
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        /* Social links at the bottom of sidebar */
        .sidebar-social {
            margin: 1rem 1.25rem 1.5rem;
            padding: 0.75rem 0.75rem;
            background: rgba(255,255,255,0.08);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 18px;
            border: 1px solid rgba(255,255,255,0.12);
        }
        .sidebar-social a {
            color: #fff;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 10px;
            transition: all .2s ease;
        }
        .sidebar-social a:hover { transform: translateY(-2px); background: rgba(255,255,255,0.12); }
        .sidebar-social i { font-size: 1.25rem; }
        
        .sidebar-header {
            padding: 2rem 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            position: relative;
        }
        
        .sidebar-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            border-radius: 0 0 1rem 1rem;
            z-index: -1;
        }
        
        .logo-container {
            margin-bottom: 1rem;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 1rem;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
            transition: all 0.3s ease;
            border-radius: 50%;
            padding: 0.5rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        
        .logo:hover {
            transform: scale(1.05);
            filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.4));
        }
        
        .logo-text {
            color: white;
            font-size: 1.25rem;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
        }
        
        .logo-text small {
            display: block;
            font-size: 0.875rem;
            color: var(--accent-color);
            font-weight: 500;
            margin-top: 0.25rem;
        }
        
        .sidebar-nav {
            padding: 1.5rem 0;
            position: relative;
        }
        
        .sidebar-nav::before {
            content: '';
            position: absolute;
            top: 0;
            left: 1rem;
            right: 1rem;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        }
        
        .nav-item {
            display: flex;
            align-items: center;
            padding: 0.875rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-left: 4px solid transparent;
            margin: 0.25rem 1rem;
            border-radius: 0.75rem;
            position: relative;
            overflow: hidden;
        }
        
        .nav-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }
        
        .nav-item:hover::before {
            left: 100%;
        }
        
        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: var(--accent-color);
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .nav-item.active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border-left-color: var(--accent-color);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        
        .nav-item.active::after {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 20px;
            background: var(--accent-color);
            border-radius: 2px 0 0 2px;
        }
        
        .nav-item i {
            margin-right: 0.75rem;
            font-size: 1.125rem;
            width: 20px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }
        
        .nav-item:hover i {
            transform: scale(1.1);
        }
        
        .nav-item span {
            position: relative;
            z-index: 1;
            font-weight: 500;
            letter-spacing: 0.025em;
        }
        
        /* Main Content */
        .main-content {
            /* Keep content fully clear of the fixed sidebar */
            margin-left: calc(var(--sidebar-width) + var(--sidebar-gutter)) !important;
            padding: 2rem 2rem 2rem 2.5rem; /* extra left padding to keep avatar fully visible */
            min-height: 100vh;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
            overflow: visible;
        }

        /* Ensure page sections don't start under rounded sidebar edge */
        .main-content > .container-fluid,
        .main-content > .content-container {
            padding-left: 1.25rem;
        }
        
        /* Content Container */
        .content-container {
            background: white;
            border-radius: 1rem;
            box-shadow: var(--shadow-lg);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 2rem;
            border-radius: 1rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-lg);
        }
        
        .page-title {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            margin-bottom: 0.5rem;
        }
        
        .page-subtitle {
            font-size: 1.125rem;
            opacity: 0.9;
            margin: 0;
        }
        
        /* Cards */
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            padding: 1.25rem 1.5rem;
            font-weight: 600;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        /* Buttons */
        .btn {
            border-radius: 0.5rem;
            padding: 0.625rem 1.25rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        
        .btn-success {
            background: linear-gradient(135deg, var(--success-color) 0%, #059669 100%);
            color: white;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, var(--warning-color) 0%, #d97706 100%);
            color: white;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, var(--danger-color) 0%, #dc2626 100%);
            color: white;
        }
        
        /* Tables */
        .table {
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }
        
        .table thead th {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            padding: 1rem;
            font-weight: 600;
        }
        
        .table tbody tr:hover {
            background-color: rgba(30, 64, 175, 0.05);
        }
        
        /* Forms */
        .form-control, .form-select {
            border-radius: 0.5rem;
            border: 2px solid var(--border-color);
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(30, 64, 175, 0.25);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }
        
        /* Alerts */
        .alert {
            border: none;
            border-radius: 0.75rem;
            padding: 1rem 1.25rem;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 100%;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
            
            .content-container {
                padding: 1.5rem;
            }
            
            .page-header {
                padding: 1.5rem;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
        }
        
        /* Toggle Button for Mobile */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1001;
            background: var(--primary-color);
            border: none;
            color: white;
            padding: 0.5rem;
            border-radius: 0.5rem;
            box-shadow: var(--shadow-md);
        }
        
        @media (max-width: 1200px) {
            :root { --sidebar-gutter: 56px; }
        }

        @media (max-width: 768px) {
            .sidebar-toggle {
                display: block;
            }
            .main-content {
                margin-left: 0 !important;
                padding: 1rem;
            }
        }
        
        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Modern Pulse Animation */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        /* Smooth Fade In Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        /* Force Sidebar Consistency */
        body {
            overflow-x: hidden;
        }
        
        .sidebar {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        /* Ensure sidebar is always visible */
        @media (min-width: 769px) {
            .sidebar {
                transform: translateX(0) !important;
            }
        }
        
        /* Custom Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }
        
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body>
    <!-- Mobile Toggle Button -->
    <button class="sidebar-toggle d-md-none" onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar fade-in-up" id="sidebar">
        <div class="sidebar-header">
            <div class="logo-container">
                <img src="{{ asset('images/logosmkn4.png') }}" alt="SMK Negeri 4 Kota Bogor" class="logo">
                <h5 class="logo-text">SMK NEGERI 4<br>
                    @auth
                        <small style="color: #ffd700; font-size: 0.75rem;">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </small>
                    @else
                        <small>KOTA BOGOR</small>
                    @endauth
                </h5>
            </div>
        </div>
        
        <nav class="sidebar-nav">
            @auth('admin')
                <!-- Menu untuk admin yang sudah login -->
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard Admin</span>
                </a>
                
                <a href="{{ route('admin.galeri.index') }}" class="nav-item {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                    <i class="bi bi-images"></i>
                    <span>Manajemen Galeri</span>
                </a>
                
                <a href="{{ route('admin.category.index') }}" class="nav-item {{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
                    <i class="bi bi-tags"></i>
                    <span>Manajemen Kategori</span>
                </a>
                
                <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-item" style="width: 100%; text-align: left;">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            @else
                <!-- Menu untuk semua pengunjung (public) -->
                <a href="{{ route('welcome') }}" class="nav-item {{ request()->routeIs('welcome') ? 'active' : '' }}">
                    <i class="bi bi-house"></i>
                    <span>Beranda</span>
                </a>
                <a href="{{ route('agenda') }}" class="nav-item {{ request()->routeIs('agenda') ? 'active' : '' }}">
                    <i class="bi bi-calendar-event"></i>
                    <span>Agenda</span>
                </a>
                <a href="{{ route('informasi') }}" class="nav-item {{ request()->routeIs('informasi') ? 'active' : '' }}">
                    <i class="bi bi-info-circle"></i>
                    <span>Informasi</span>
                </a>
                <a href="{{ route('galeri') }}" class="nav-item {{ request()->routeIs('galeri') ? 'active' : '' }}">
                    <i class="bi bi-images"></i>
                    <span>Galeri</span>
                </a>
                
                @auth
                    <!-- User sudah login -->
                    <div class="user-profile-section" style="margin: 1.5rem 1.5rem 1rem;">
                        <a href="{{ route('profile') }}" class="nav-item {{ request()->routeIs('profile') ? 'active' : '' }}" style="display: block; text-decoration: none; padding: 1rem; background: rgba(255,255,255,0.1); border-radius: 0.5rem; border-left: 4px solid var(--accent-color); margin-bottom: 0.5rem;">
                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                @if(Auth::user()->photo)
                                    <img id="sidebarProfilePhoto" class="profile-photo" src="{{ asset('images/profiles/' . Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid #ffd700;">
                                @else
                                    <div id="sidebarProfilePlaceholder" style="width: 40px; height: 40px; border-radius: 50%; background: rgba(255,255,255,0.2); display: flex; align-items: center; justify-content: center; border: 2px solid #ffd700;">
                                        <i class="bi bi-person-circle" style="font-size: 1.5rem; color: #ffd700;"></i>
                                    </div>
                                @endif
                                <div style="flex: 1;">
                                    <div style="color: rgba(255,255,255,0.9); font-size: 0.8rem; font-weight: 500;">Profil Saya</div>
                                    <div style="color: var(--accent-color); font-weight: 600; font-size: 0.9rem; margin-top: 2px;">{{ Auth::user()->name }}</div>
                                </div>
                                <i class="bi bi-chevron-right" style="color: rgba(255,255,255,0.6);"></i>
                            </div>
                        </a>
                        
                        <div class="d-flex gap-1" style="margin-top: 0.5rem;">
                            <a href="{{ route('profile') }}" class="btn btn-sm" style="flex: 1; background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.2); padding: 0.4rem 0.5rem; font-size: 0.8rem;">
                                <i class="bi bi-person"></i>
                            </a>
                            <form method="POST" action="{{ route('logout') }}" style="flex: 1; margin: 0;">
                                @csrf
                                <button type="submit" class="btn btn-sm w-100" style="background: rgba(239, 68, 68, 0.2); color: white; border: 1px solid rgba(239, 68, 68, 0.5); padding: 0.4rem 0.5rem; font-size: 0.8rem;">
                                    <i class="bi bi-box-arrow-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- User belum login -->
                    <a href="{{ route('login') }}" class="nav-item {{ request()->routeIs('login') ? 'active' : '' }}">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span>Login</span>
                    </a>
                    <a href="{{ route('register') }}" class="nav-item {{ request()->routeIs('register') ? 'active' : '' }}">
                        <i class="bi bi-person-plus"></i>
                        <span>Register</span>
                    </a>
                @endauth
                
                {{-- Admin Login link hidden from public sidebar --}}
            @endauth
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Social links at bottom of sidebar -->
    <div class="sidebar-social" style="position: fixed; left: 0; bottom: 12px; width: var(--sidebar-width);">
        <a href="https://www.tiktok.com/@smkn4kotabogor" target="_blank" aria-label="TikTok SMKN 4 Kota Bogor" rel="noopener">
            <i class="bi bi-tiktok"></i>
        </a>
        <a href="https://www.instagram.com/smkn4kotabogor/" target="_blank" aria-label="Instagram SMKN 4 Kota Bogor" rel="noopener">
            <i class="bi bi-instagram"></i>
        </a>
        <a href="https://www.youtube.com/@smknegeri4bogor905" target="_blank" aria-label="YouTube SMKN 4 Kota Bogor" rel="noopener">
            <i class="bi bi-youtube"></i>
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
        
        // Auto-hide sidebar on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                document.getElementById('sidebar').classList.remove('show');
            }
        });
    </script>
</body>
</html>
