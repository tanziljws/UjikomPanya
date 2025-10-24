<!DOCTYPE html>
<html>
<head>
    <title>Galeri Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            display: flex;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #1a2332 100%);
        }
        
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #1e3a8a 0%, #1e40af 100%);
            padding: 0;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.3);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        
        .sidebar a, .sidebar button {
            display: block;
            padding: 15px 25px;
            margin: 0;
            color: #ffffff;
            text-decoration: none;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            font-size: 15px;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }
        
        .sidebar a:hover, .sidebar button:hover {
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            border-left: 4px solid #60a5fa;
            color: #60a5fa;
            transform: translateX(5px);
        }
        
        .main-content {
            flex-grow: 1;
            padding: 30px;
            margin-left: 280px;
            background: linear-gradient(135deg, #1a1a1a 0%, #1a2332 100%);
            min-height: 100vh;
        }
        
        .logo-container {
            text-align: center;
            margin: 0;
            padding: 30px 20px;
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
            border-bottom: 2px solid rgba(96, 165, 250, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .logo-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(96, 165, 250, 0.1) 50%, transparent 70%);
            animation: shimmer 3s infinite;
        }
        
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        
        .logo {
            width: 80px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 15px;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.4));
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }
        
        .logo:hover {
            transform: scale(1.1) rotate(2deg);
            filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.6));
        }
        
        .logo-text {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.2;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 2;
        }
        
        .logo-text small {
            font-size: 12px;
            color: #60a5fa;
            font-weight: 600;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        }
        
        /* Navigation menu styling */
        .sidebar-nav {
            padding: 20px 0;
        }
        
        .nav-item {
            margin: 5px 15px;
            border-radius: 8px;
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
            background: linear-gradient(90deg, transparent, rgba(96, 165, 250, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .nav-item:hover::before {
            left: 100%;
        }
        
        /* Content area styling */
        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* Card styling */
        .card {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        
        .card-header {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: white;
            border: none;
            border-radius: 12px 12px 0 0;
            padding: 15px 20px;
            font-weight: 600;
        }
        
        /* Button styling */
        .btn-primary {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(30, 58, 138, 0.4);
        }
        
        /* Text styling */
        h1, h2, h3, h4, h5, h6 {
            color: #1e3a8a;
            font-weight: 600;
        }
        
        .text-muted {
            color: #6c757d !important;
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
            
            body {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="logo-container">
            <img src="{{ asset('images/logosmkn4.png') }}" alt="SMK Negeri 4 Kota Bogor" class="logo">
            <h5 class="logo-text">SMK NEGERI 4<br><small>KOTA BOGOR</small></h5>
        </div>
        
        <nav class="sidebar-nav">
            @auth('admin')
                <!-- Menu untuk admin yang sudah login -->
                <a href="{{ route('profil') }}" class="nav-item">📄 Profil</a>
                <a href="{{ route('agenda') }}" class="nav-item">🗓️ Agenda</a>
                <a href="{{ route('informasi') }}" class="nav-item">ℹ️ Informasi</a>
                <a href="{{ route('galeri.public') }}" class="nav-item">🖼️ Galeri</a>
                <a href="{{ route('admin.dashboard') }}" class="nav-item">👨‍💼 Dashboard Admin</a>
                <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-item">
                        🚪 Logout
                    </button>
                </form>
            @elseif(Auth::check())
                <!-- Menu untuk user biasa yang sudah login -->
                <a href="{{ route('profil') }}" class="nav-item">📄 Profil</a>
                <a href="{{ route('agenda') }}" class="nav-item">🗓️ Agenda</a>
                <a href="{{ route('informasi') }}" class="nav-item">ℹ️ Informasi</a>
                <a href="{{ route('galeri.public') }}" class="nav-item">🖼️ Galeri</a>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-item">
                        🚪 Logout
                    </button>
                </form>
            @else
                <!-- Menu untuk pengunjung (belum login) -->
                <a href="{{ route('galeri.public') }}" class="nav-item">🖼️ Galeri</a>
                <a href="{{ route('login') }}" class="nav-item">🔐 Login</a>
            @endauth
        </nav>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

</body>
</html>
