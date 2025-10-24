@extends('layouts.app')

@section('title', 'Login User')

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

                    {{-- Admin Login link removed from user login page --}}
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
    --gray-color: #6b7280;
    --dark-color: #1f2937;
}

.login-card {
    background: white;
    border-radius: 1rem;
    box-shadow: var(--shadow-lg);
    padding: 2.5rem;
    border: 1px solid var(--border-color);
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
    margin-bottom: 2rem;
}

.logo-section {
    text-align: center;
}

.login-logo {
    width: 80px;
    height: 90px;
    object-fit: contain;
    filter: drop-shadow(0 4px 8px rgba(30, 64, 175, 0.3));
}

.school-name {
    color: var(--primary-color);
    font-weight: 700;
    font-size: 1.75rem;
    margin: 0;
}

.school-tagline {
    color: var(--gray-color);
    font-size: 0.9rem;
    margin: 0;
}

.login-title {
    color: var(--primary-color);
    font-weight: 600;
    font-size: 1.5rem;
}

.login-subtitle {
    color: var(--gray-color);
    font-size: 0.9rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.input-group {
    position: relative;
    display: flex;
    align-items: center;
    border: 2px solid var(--border-color);
    border-radius: 0.5rem;
    transition: all 0.3s ease;
    background: white;
}

.input-group:focus-within {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(30, 64, 175, 0.25);
}

.input-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    color: var(--primary-color);
    font-size: 1.1rem;
    background: rgba(30, 64, 175, 0.05);
    border-right: 1px solid var(--border-color);
}

.form-control {
    border: none;
    background: transparent;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    width: 100%;
    outline: none;
    color: var(--dark-color);
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
}

.form-check-input {
    border: 2px solid var(--border-color);
    border-radius: 0.25rem;
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

.btn-login {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    border: none;
    color: white;
    padding: 0.875rem 1.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.btn-login:hover {
    background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(30, 64, 175, 0.3);
    color: white;
}

.btn-login:active {
    transform: translateY(0);
}

.login-footer {
    border-top: 1px solid var(--border-color);
    padding-top: 1.5rem;
}

.admin-link {
    color: var(--primary-color);
    text-decoration: none;
    font-size: 0.9rem;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    background: rgba(30, 64, 175, 0.05);
}

.admin-link:hover {
    color: var(--primary-dark);
    background: rgba(30, 64, 175, 0.1);
    transform: translateY(-1px);
}

.alert {
    border: none;
    border-radius: 0.75rem;
    padding: 1rem 1.25rem;
}

.alert-danger {
    background: rgba(220, 53, 69, 0.1);
    color: #dc3545;
    border-left: 4px solid #dc3545;
}

.btn-close {
    opacity: 0.7;
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
    
    .login-logo {
        width: 60px;
        height: 70px;
    }
}
</style>
@endsection 