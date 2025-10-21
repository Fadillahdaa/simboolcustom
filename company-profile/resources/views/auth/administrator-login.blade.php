<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icon (Font Awesome) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(120deg, #c7208aff, #7c0364ff, #2e132bff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-attachment: fixed;
        }

        .login-wrapper {
            position: relative;
            backdrop-filter: blur(12px);
            background: rgba(0, 0, 0, 0.15);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.2);
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            color: white;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-title {
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .input-group-text {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
        }

        .form-control {
            background-color: rgba(255,255,255,0.2);
            border: none;
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: transparent;
            background-color: rgba(255,255,255,0.3);
        }

        .btn-login {
            background: white;
            color: #b5008dff;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-login:hover {
            background: #4f004cff;
            color: white;
        }

        .alert {
            font-size: 0.9rem;
        }

        footer {
            position: absolute;
            bottom: 15px;
            color: rgba(255,255,255,0.8);
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="login-wrapper text-center">
        <div class="mb-4">
            <img src="{{ asset('images/logo_simbool.png') }}" alt="Logo" width="70" class="mb-2">
            <h3 class="login-title">Login Administrator</h3>
        </div>

        {{-- Pesan error --}}
        @if ($errors->any())
            <div class="alert alert-danger py-2">{{ $errors->first() }}</div>
        @endif

        {{-- Pesan sukses --}}
        @if (session('success'))
            <div class="alert alert-success py-2">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('administrator-login.submit') }}">
            @csrf

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            </div>

            <div class="input-group mb-4">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn btn-login w-100 py-2">Masuk</button>
        </form>
    </div>

    <footer class="text-center w-100">
        © {{ date('Y') }} Simbool Custom. All Rights Reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
