@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="login-card">
                <div class="login-header text-center mb-4">
                    <div class="logo-section mb-4">
                        <img src="{{ asset('images/logosmkn4.png') }}" alt="SMK Negeri 4" class="login-logo">
                        <h2 class="school-name mt-3">SMK Negeri 4</h2>
                        <p class="school-tagline">Excellence in Vocational Education</p>
                    </div>
                </div>

                <div class="login-body">
                    <h3 class="login-title text-center mb-3">Welcome Back</h3>
                    <p class="login-subtitle text-center mb-4">Sign in to access your account</p>

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(isset($errors) && $errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle"></i>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.submit') }}" class="login-form">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" 
                                       class="form-control @error('username') is-invalid @enderror" 
                                       name="username" 
                                       placeholder="Username"
                                       value="{{ old('username') }}" 
                                       required 
                                       autofocus>
                            </div>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <div class="input-group">
                                <span class="input-icon">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       name="password" 
                                       placeholder="Password"
                                       required>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-login w-100 mb-3">
                            <span>Sign In</span>
                            <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </form>

                    <div class="login-footer text-center">
                        <p class="mb-0">
                            <a href="{{ route('admin.login') }}" class="admin-link">
                                <i class="bi bi-shield-lock"></i>
                                Admin Login
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Login page specific styles */
.login-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    padding: 3rem 2.5rem;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
    border: 1px solid rgba(30, 58, 138, 0.1);
    backdrop-filter: blur(10px);
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
    background: linear-gradient(90deg, #1e3a8a, #1e40af, #1e3a8a);
}

.logo-section {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.login-logo {
    width: 80px;
    height: 90px;
    object-fit: contain;
    filter: drop-shadow(0 4px 8px rgba(30, 58, 138, 0.3));
    transition: all 0.3s ease;
}

.login-logo:hover {
    transform: scale(1.05);
    filter: drop-shadow(0 6px 12px rgba(30, 58, 138, 0.4));
}

    .school-name {
        font-family: 'Poppins', sans-serif;
        font-size: 1.75rem;
        font-weight: 700;
        color: #000000;
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .school-tagline {
        color: #000000;
        font-size: 0.9rem;
        font-weight: 400;
        margin: 0;
    }

    .login-title {
        font-family: 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 600;
        color: #000000;
        margin-bottom: 0.5rem;
    }

    .login-subtitle {
        color: #000000;
        font-size: 0.9rem;
        margin-bottom: 2rem;
    }

/* Form Styling */
.input-group {
    position: relative;
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.9);
    border: 2px solid rgba(30, 58, 138, 0.1);
    border-radius: 12px;
    transition: all 0.3s ease;
    overflow: hidden;
}

.input-group:focus-within {
    border-color: #1e3a8a;
    box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.1);
    background: rgba(255, 255, 255, 1);
}

.input-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    color: #1e3a8a;
    font-size: 1.1rem;
    background: rgba(30, 58, 138, 0.05);
}

.form-control {
    border: none;
    background: transparent;
    padding: 15px;
    font-size: 1rem;
    color: #495057;
    flex: 1;
}

.form-control:focus {
    outline: none;
    box-shadow: none;
    background: transparent;
}

    .form-control::placeholder {
        color: #000000;
    }

/* Button Styling */
.btn-login {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    border: none;
    border-radius: 12px;
    padding: 15px 30px;
    font-weight: 600;
    font-size: 1rem;
    color: white;
    transition: all 0.3s ease;
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
    background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(30, 58, 138, 0.3);
    color: white;
}

.btn-login:active {
    transform: translateY(0);
}

/* Admin Link */
.login-footer {
    border-top: 1px solid rgba(30, 58, 138, 0.1);
    padding-top: 1.5rem;
}

    .admin-link {
        color: #000000;
        text-decoration: none;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .admin-link:hover {
        color: #1e3a8a;
        transform: translateX(5px);
        text-decoration: none;
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
    color: #ef4444;
    border-left: 4px solid #ef4444;
}

.btn-close {
    filter: invert(1);
    opacity: 0.7;
}

/* Form Check */
.form-check-input:checked {
    background-color: #1e3a8a;
    border-color: #1e3a8a;
}

    .form-check-label {
        color: #000000;
        font-size: 0.9rem;
    }

/* Responsive Design */
@media (max-width: 768px) {
    .login-card {
        padding: 2rem 1.5rem;
        margin: 1rem;
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
}
</style>
@endsection 