<!DOCTYPE html>
<html lang="en">
<head>
    <!-- BAGIAN HEAD: META, JUDUL, TAILWIND, CSS CUSTOM -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <!-- Import Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* STYLE BODY DAN BACKGROUND */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=2084');
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }
        /* OVERLAY HITAM TRANSPARAN */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }
        /* KONTAINER LOGIN */
        .login-container {
            background-color: rgba(255, 255, 255, 0.15);
            padding: 2.5rem;
            border-radius: 1.25rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            backdrop-filter: blur(12px);
            z-index: 1;
            animation: fadeIn 1s ease-out;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }
        /* STYLE UNTUK TEKS DALAM KONTAINER */
        .login-container h2,
        .login-container p,
        .login-container label {
            color: white;
        }
        /* STYLE UNTUK INPUT FORM */
        .form-input {
            width: 100%;
            padding: 0.75rem;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 0.5rem;
            box-sizing: border-box;
            transition: all 0.3s ease-in-out;
        }
        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        .form-input:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.6);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
            background-color: rgba(255, 255, 255, 0.2);
        }
        /* STYLE TOMBOL SUBMIT */
        .form-button {
            width: 100%;
            padding: 0.8rem;
            background-color: #191970;
            color: #ffffff;
            border: none;
            border-radius: 0.6rem;
            cursor: pointer;
            font-weight: 600;
            font-size: 1rem;
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
        }
        .form-button:hover {
            background-color: #2E3A87;
            transform: translateY(-1px);
        }
        /* NOTIFIKASI ERROR */
        .error-message {
            background-color: rgba(255, 0, 0, 0.2);
            color: #ffcccc;
            padding: 0.8rem;
            border-radius: 0.6rem;
            margin-bottom: 1.25rem;
            border: 1px solid rgba(255, 0, 0, 0.3);
            font-weight: 500;
        }
        /* LINK STYLE */
        .link-text {
            color: #6495ED;
            transition: color 0.2s ease-in-out;
        }
        .link-text:hover {
            color: #4655a8;
        }
        /* STYLE CHECKBOX DAN LABEL */
        .checkbox-label {
            color: white;
        }
        .checkbox-input {
            border-color: rgba(255, 255, 255, 0.5);
            background-color: rgba(255, 255, 255, 0.1);
        }
        /* KONTAINER INPUT PASSWORD */
        .password-input-container {
            position: relative;
            width: 100%;
        }
        /* ICON LIHAT PASSWORD */
        .toggle-password-visibility {
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: rgba(255, 255, 255, 0.7);
            transition: color 0.2s ease-in-out;
        }
        .toggle-password-visibility:hover {
            color: white;
        }
        /* ANIMASI FADEIN */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>
    <!-- KONTAINER FORM LOGIN -->
    <div class="login-container">
        <h2 class="text-2xl font-extrabold text-center mb-3">Selamat Datang!</h2>
        <p class="text-md text-center mb-6">Silakan masuk untuk melanjutkan.</p>

        <!-- NOTIFIKASI ERROR DARI SESSION -->
        @if (session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <!-- VALIDASI ERROR -->
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- NOTIFIKASI STATUS SUKSES -->
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 font-medium" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <!-- FORM LOGIN -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- INPUT EMAIL -->
            <div class="mb-3">
                <label for="email" class="block text-sm font-semibold mb-1">Email</label>
                <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" required autofocus>
            </div>

            <!-- INPUT PASSWORD + TOGGLE -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold mb-1">Password</label>
                <div class="password-input-container">
                    <input type="password" id="password" name="password" class="form-input pr-10" required autocomplete="current-password">
                    <!-- ICON TOGGLE VISIBILITY -->
                    <span class="toggle-password-visibility" onclick="togglePasswordVisibility()">
                        <!-- ICON MATA -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- CHECKBOX INGAT SAYA & LINK LUPA PASSWORD -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 checkbox-input">
                    <label for="remember" class="ml-2 block text-sm checkbox-label">Ingat saya</label>
                </div>
                @if (Route::has('password.request'))
                    <a class="text-sm link-text" href="{{ route('password.request') }}">Lupa password?</a>
                @endif
            </div>

            <!-- TOMBOL SUBMIT -->
            <div>
                <button type="submit" class="form-button">
                    Masuk
                </button>
            </div>
        </form>

        <!-- LINK KE HALAMAN REGISTER -->
        <div class="text-center mt-6">
            <p class="text-md">
                Belum punya akun?
                <a href="{{ route('register') }}" class="link-text font-semibold">Daftar di sini</a>
            </p>
        </div>
    </div>

    <!-- SCRIPT TOGGLE PASSWORD VISIBILITY -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</body>
</html>
