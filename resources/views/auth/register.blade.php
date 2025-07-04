<!DOCTYPE html>
<html lang="en">
<head>
    <!-- BAGIAN HEAD: META, TITLE, LINK TAILWIND & CUSTOM CSS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun Karyawan</title>
    <!-- Import Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* BACKGROUND DAN LAYOUT BODY */
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
        }
        /* OVERLAY GELAP DI ATAS BACKGROUND */
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

        /* KONTAINER FORM REGISTER */
        .form-container {
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
        /* WARNA TEKS DALAM FORM */
        .form-container h2,
        .form-container p,
        .form-container label {
            color: white;
        }
        /* STYLE UNTUK INPUT TEXT DAN EMAIL */
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
        /* TOMBOL REGISTER */
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
        /* STYLE LINK */
        .link-text {
            color: #6495ED;
            transition: color 0.2s ease-in-out;
        }
        .link-text:hover {
            color: #6495ED;
        }
        /* KONTAINER UNTUK PASSWORD & ICON TOGGLE */
        .password-input-container {
            position: relative;
            width: 100%;
        }
        /* ICON MATA UNTUK SHOW/HIDE PASSWORD */
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
        /* ANIMASI FADE IN */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>
    <!-- FORM REGISTER -->
    <div class="form-container">
        <h2 class="text-2xl font-extrabold text-center mb-3">Buat Akun Karyawan</h2>
        <p class="text-md text-center mb-6">Lengkapi data diri untuk bergabung.</p>

        <!-- TAMPILKAN ERROR VALIDASI -->
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM INPUT REGISTER -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- INPUT NAMA -->
            <div class="mb-3">
                <label for="nama_lengkap" class="block text-sm font-semibold mb-1">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-input" value="{{ old('nama_lengkap') }}" required autofocus>
            </div>

            <!-- INPUT EMAIL -->
            <div class="mb-3">
                <label for="email" class="block text-sm font-semibold mb-1">Alamat Email</label>
                <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" required>
            </div>

            <!-- INPUT ALAMAT -->
            <div class="mb-3">
                <label for="alamat" class="block text-sm font-semibold mb-1">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-input" value="{{ old('alamat') }}" required>
            </div>

            <!-- INPUT NOMOR TELEPON -->
            <div class="mb-3">
                <label for="nomor_telepon" class="block text-sm font-semibold mb-1">Nomor Telepon</label>
                <input type="text" id="nomor_telepon" name="nomor_telepon" class="form-input" value="{{ old('nomor_telepon') }}" required>
            </div>

            <!-- INPUT JABATAN -->
            <div class="mb-3">
                <label for="jabatan" class="block text-sm font-semibold mb-1">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" class="form-input" value="{{ old('jabatan') }}" required>
            </div>

            <!-- INPUT PASSWORD -->
            <div class="mb-3">
                <label for="password" class="block text-sm font-semibold mb-1">Password</label>
                <div class="password-input-container">
                    <input type="password" id="password" name="password" class="form-input pr-10" required autocomplete="new-password">
                    <!-- ICON TOGGLE PASSWORD -->
                    <span class="toggle-password-visibility" onclick="togglePasswordVisibility('password')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- KONFIRMASI PASSWORD -->
            <div class="mb-4">
                <label for="password-confirm" class="block text-sm font-semibold mb-1">Konfirmasi Password</label>
                <div class="password-input-container">
                    <input type="password" id="password-confirm" name="password_confirmation" class="form-input pr-10" required autocomplete="new-password">
                    <!-- ICON TOGGLE PASSWORD -->
                    <span class="toggle-password-visibility" onclick="togglePasswordVisibility('password-confirm')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- TOMBOL SUBMIT -->
            <div>
                <button type="submit" class="form-button">Daftar</button>
            </div>
        </form>

        <!-- LINK KE LOGIN -->
        <div class="text-center mt-6">
            <p class="text-md">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="link-text font-semibold">Login di sini</a>
            </p>
        </div>
    </div>

    <!-- SCRIPT UNTUK TOGGLE VISIBILITY PASSWORD -->
    <script>
        function togglePasswordVisibility(id) {
            const passwordInput = document.getElementById(id);
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</body>
</html>
