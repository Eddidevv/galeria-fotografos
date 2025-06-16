<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Orange & Black Theme</title>

    {{-- Link para o CSS do login armazenado em public/css/login.css --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />

    {{-- Fonte Inter do Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <div class="background-pattern"></div>

        <div class="login-card">
            <div class="decoration decoration-top"></div>
            <div class="decoration decoration-bottom"></div>

            <div class="card-content">
                {{-- Cabeçalho --}}
                <div class="header">
                    <div class="logo">
                        {{-- Ícone SVG do avatar --}}
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <h1>Bem vinda(o) de volta, Jacinha!</h1>
                    <p>Sign in to your account to continue</p>
                </div>

                {{-- Formulário de Login Laravel --}}
                <form method="POST" action="{{ route('auth') }}" class="login-form" id="loginForm">
                    @csrf {{-- Proteção contra CSRF --}}

                    {{-- Campo de Email --}}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                        </div>

                        {{-- Mensagem de erro de validação do email --}}
                        @if ($errors->has('email'))
                            <span class="error-message">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    {{-- Campo de Senha --}}
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <div class="input-wrapper">
                            <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <circle cx="12" cy="16" r="1"></circle>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <input type="password" id="password" name="password" placeholder="Enter your password" required>

                            {{-- Botão para mostrar/esconder senha --}}
                            <button type="button" class="toggle-password" id="togglePassword">
                                <svg class="eye-icon" width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>

                        {{-- Mensagem de erro de validação da senha --}}
                        @if ($errors->has('password'))
                            <span class="error-message">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    {{-- Checkbox "Remember me" e link "Forgot password?" --}}
                    <div class="form-options">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                            Remember me
                        </label>

                        {{-- Link para recuperação de senha --}}
                        <a href="" class="forgot-password">Forgot password?</a>
                    </div>

                    {{-- Botão de envio --}}
                    <button type="submit" class="submit-btn">
                        <span>Sign In</span>
                        <div class="loading-spinner" id="loadingSpinner"></div>
                    </button>

                    @if(session('status'))
                        <span class="txt_error">{{ session('status')}}</span>
                    @endif
                </form>

                {{-- Divisor visual --}}
                <div class="divider">
                    <span>Or continue with</span>
                </div>

                {{-- Login social (Google/GitHub) - apenas visual, sem integração backend aqui --}}
                <div class="social-login">
                    <button class="social-btn google-btn">
                        {{-- SVG do Google --}}
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 48 48">
                            <path fill="#EA4335" d="M24 9.5c3.54 0 6.33 1.5 8.03 2.76l6.01-5.83C34.4 2.4 29.67 0 24 0 14.64 0 6.77 5.86 2.88 14.19l7.01 5.44C11.48 13.24 17.22 9.5 24 9.5z"/>
                            <path fill="#4285F4" d="M46.14 24.5c0-1.64-.15-3.2-.44-4.71H24v8.91h12.45c-.53 2.85-2.15 5.26-4.54 6.88v5.65h7.36C43.6 36.36 46.14 30.94 46.14 24.5z"/>
                            <path fill="#FBBC05" d="M10.88 28.06a14.92 14.92 0 0 1-.78-4.56c0-1.59.28-3.13.78-4.56l-7.01-5.44A24.012 24.012 0 0 0 0 24c0 3.86.92 7.5 2.56 10.75l7.19-6.69z"/>
                            <path fill="#34A853" d="M24 48c6.48 0 11.91-2.13 15.88-5.79l-7.36-5.65c-2.06 1.38-4.69 2.19-8.52 2.19-6.78 0-12.52-3.74-14.11-9.03l-7.19 6.69C6.77 42.14 14.64 48 24 48z"/>
                            <path fill="none" d="M0 0h48v48H0z"/>
                        </svg>
                        Google
                    </button>
                        <button class="social-btn facebook-btn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="#1877F2" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.675 0h-21.35C.594 0 0 .593 0 1.326v21.348C0 23.407.594 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.894-4.788 4.659-4.788 1.325 0 2.464.099 2.797.143v3.24l-1.92.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12V24h6.116c.73 0 1.324-.593 1.324-1.326V1.326C24 .593 23.407 0 22.675 0z"/>
                            </svg>
                            Facebook
                        </button>
                </div>

                {{-- Link para página de registro --}}
                <p class="signup-link">
                    Don't have an account? <a href="#">Sign up for free</a>
                </p>
            </div>
        </div>
    </div>

    {{-- JS para funcionalidade (ex: mostrar senha) --}}
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
