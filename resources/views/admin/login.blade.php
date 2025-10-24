<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - SMK Negeri 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <!-- Animated Background -->
        <div class="animated-bg">
            <div class="bg-shape bg-shape-1"></div>
            <div class="bg-shape bg-shape-2"></div>
            <div class="bg-shape bg-shape-3"></div>
            <div class="bg-shape bg-shape-4"></div>
        </div>

        <!-- Login Form -->
        <div class="login-form-container">
            <div class="login-card">
                <div class="login-header">
                    <div class="logo-section">
                        <img src="{{ asset('images/logosmkn4.png') }}" alt="SMK Negeri 4" class="login-logo">
                        <h1 class="school-name">SMK Negeri 4</h1>
                        <p class="school-tagline">Administrator Panel</p>
                    </div>
                </div>

                <div class="login-body">
                    <h2 class="login-title">Admin Access</h2>
                    <p class="login-subtitle">Sign in to manage the system</p>

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.login.submit') }}" class="login-form">
                        @csrf
                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </span>
                                <input type="text" 
                                       class="form-control @error('username') is-invalid @enderror" 
                                       name="username" 
                                       placeholder="Admin Username"
                                       value="{{ old('username') }}" 
                                       required 
                                       autofocus>
                            </div>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       name="password" 
                                       placeholder="Admin Password"
                                       required>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-login">
                            <span>Admin Sign In</span>
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </form>

                    <div class="login-footer">
                        <p class="text-center mb-0">
                            <a href="{{ route('welcome') }}" class="user-link">
                                <i class="bi bi-house"></i>
                                Kembali ke Beranda
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    :root {
        --primary-color: #1e40af;
        --primary-dark: #1e3a8a;
        --primary-light: #3b82f6;
        --accent-color: #f59e0b;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        min-height: 100vh;
        overflow-x: hidden;
    }

    .login-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        position: relative;
    }

    /* Animated Background */
    .animated-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
    }

    .bg-shape {
        position: absolute;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
        opacity: 0.1;
        animation: float 6s ease-in-out infinite;
    }

    .bg-shape-1 {
        width: 150px;
        height: 150px;
        top: -75px;
        left: -75px;
        animation-delay: 0s;
    }

    .bg-shape-2 {
        width: 120px;
        height: 120px;
        top: 50%;
        right: -60px;
        animation-delay: 2s;
    }

    .bg-shape-3 {
        width: 100px;
        height: 100px;
        bottom: -50px;
        left: 50%;
        animation-delay: 4s;
    }

    .bg-shape-4 {
        width: 80px;
        height: 80px;
        top: 20%;
        left: 20%;
        animation-delay: 1s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    /* Login Form Container */
    .login-form-container {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 450px;
    }

    .login-card {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.9) 100%);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 3rem 2.5rem;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        position: relative;
        overflow: hidden;
    }

    .login-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--primary-light), var(--primary-color));
    }

    .login-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .logo-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }

    .login-logo {
        width: 80px;
        height: 90px;
        object-fit: contain;
        filter: drop-shadow(0 4px 8px rgba(30, 64, 175, 0.3));
    }

    .school-name {
        font-family: 'Poppins', sans-serif;
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .school-tagline {
        color: var(--gray-color);
        font-size: 0.9rem;
        font-weight: 400;
        margin: 0;
    }

    .login-body {
        text-align: center;
    }

    .login-title {
        font-family: 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .login-subtitle {
        color: var(--gray-color);
        font-size: 0.9rem;
        margin-bottom: 2rem;
    }

    /* Form Styling */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .input-group {
        position: relative;
        display: flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .input-group:focus-within {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
        background: rgba(255, 255, 255, 0.15);
    }

    .input-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        color: var(--primary-color);
        font-size: 1.1rem;
    }

    .form-control {
        background: transparent;
        border: none;
        color: var(--dark-color);
        padding: 0.75rem 1rem;
        font-size: 1rem;
        width: 100%;
        outline: none;
    }

    .form-control::placeholder {
        color: var(--gray-color);
    }

    .form-control:focus {
        box-shadow: none;
    }

    .form-check {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin: 0;
    }

    .form-check-input {
        background-color: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 4px;
    }

    .form-check-input:checked {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .form-check-label {
        color: var(--gray-color);
        font-size: 0.9rem;
        cursor: pointer;
    }

    /* Login Button */
    .btn-login {
        width: 100%;
        background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
        border: none;
        color: #ffffff;
        padding: 1rem 2rem;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        margin-bottom: 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .btn-login::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn-login:hover::before {
        left: 100%;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(30, 64, 175, 0.3);
    }

    .btn-login:active {
        transform: translateY(0);
    }

    /* User Link */
    .login-footer {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 1.5rem;
    }

    .user-link {
        color: var(--primary-color);
        text-decoration: none;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .user-link:hover {
        color: var(--primary-dark);
        transform: translateX(5px);
    }

    /* Alert Styling */
    .alert {
        border: none;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        padding: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .alert-danger {
        background: rgba(220, 53, 69, 0.1);
        color: #ff6b6b;
        border-left: 4px solid #dc3545;
    }

    .btn-close {
        filter: invert(1);
        opacity: 0.7;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .login-container {
            padding: 1rem;
        }
        
        .login-card {
            padding: 2rem 1.5rem;
        }
        
        .school-name {
            font-size: 1.5rem;
        }
        
        .login-title {
            font-size: 1.25rem;
        }
    }

    @media (max-width: 480px) {
        .login-card {
            padding: 1.5rem 1rem;
        }
        
        .bg-shape-1 {
            width: 200px;
            height: 200px;
        }
        
        .bg-shape-2 {
            width: 150px;
            height: 150px;
        }
    }
    </style>
</body>
</html>
