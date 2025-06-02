<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Masuk</h2>

            <!-- Session Status -->
            @if (session('status'))
                <div style="color: green; margin-bottom: 20px;">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group">
                    <label for="username">Username</label>
                    <div class="input-field">
                        <span class="icon">👤</span>
                        <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus placeholder="Username">
                    </div>
                    @error('username')
                        <div style="color: red; font-size: 13px;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-field">
                        <span class="icon">🔒</span>
                        <input id="password" type="password" name="password" required placeholder="Password">
                        <span class="toggle-password">👁️‍🗨️</span>
                    </div>
                    @error('password')
                        <div style="color: red; font-size: 13px;">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-top: 10px;">
                    <label>
                        <input type="checkbox" name="remember">
                        <span style="font-size: 14px; color: #555;">Ingat saya</span>
                    </label>
                </div>

                <button type="submit" class="btn">Masuk</button>

                @if (Route::has('password.request'))
                    <div style="margin-top: 15px;">
                        <a href="{{ route('password.request') }}" style="font-size: 13px; color: #4dc3ff;">Lupa kata sandi?</a>
                    </div>
                @endif
            </form>
        </div>

        <div class="image-side">
            <img src="{{ asset('asset/mesin_cuci.png') }}" alt="Mesin Cuci">
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('.toggle-password');
        const passwordInput = document.getElementById('password');
        
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        });
    </script>
</body>
</html>
