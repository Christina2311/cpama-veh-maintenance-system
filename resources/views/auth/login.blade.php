<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        .login-wrapper {
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: #dfdff0;
            overflow-y: auto;
        }

        .login-card {
            width: 100%;
            max-width: 450px;
            background-color: #0b0f29;
            padding: 50px 40px;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.4);
            color: white;
            margin: 20px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .login-title {
            font-size: 28px;
            font-weight: 800;
            text-transform: uppercase;
            margin: 0;
            letter-spacing: 1px;
            font-family: sans-serif;
        }

        .login-subtitle {
            color: #9ca3af;
            font-size: 14px;
            margin-top: 10px;
            font-family: sans-serif;
        }

        .form-group { margin-bottom: 20px; }

        .form-label {
            display: block;
            font-size: 13px;
            color: #d1d5db;
            margin-bottom: 8px;
            font-family: sans-serif;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: none;
            background-color: white;
            color: black;
            font-size: 14px;
        }

        .form-input:focus { outline: 2px solid #4a48e0; }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #2827c4;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 18px;
            font-weight: 700;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 30px;
        }
        .btn-submit:hover { background-color: #3b3fd4; }

        .btn-submit img {
            width: 24px;
            height: 24px;
            margin-right: 12px;
            filter: brightness(0) invert(1);
        }

        /* TABLET (768px and below) */
        @media (max-width: 768px) {
            .login-wrapper {
                position: relative;
                min-height: 100vh;
                height: auto;
            }

            .login-card {
                max-width: 420px;
                padding: 40px 30px;
                margin: 24px 16px;
            }

            .login-logo { width: 80px; height: 80px; }
            .login-title { font-size: 22px; }
        }

        /* PHONE (480px and below) */
        @media (max-width: 480px) {
            .login-wrapper {
                position: relative;
                min-height: 100vh;
                height: auto;
                justify-content: flex-start;
                padding: 24px 0;
            }

            .login-card {
                max-width: 100%;
                padding: 32px 20px;
                margin: 12px;
                border-radius: 10px;
            }

            .login-logo { width: 64px; height: 64px; margin-bottom: 10px; }
            .login-title { font-size: 17px; letter-spacing: 0.5px; }
            .login-subtitle { font-size: 13px; }

            /* font-size: 16px prevents iOS auto-zoom on input focus */
            .form-input { padding: 11px; font-size: 16px; }

            .btn-submit { font-size: 15px; padding: 13px; margin-top: 24px; }
            .btn-submit img { width: 20px; height: 20px; margin-right: 10px; }
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">

        <div class="login-header">
            <img src="{{ asset('images/veh_main_logo.png') }}"
                 class="login-logo"
                 alt="Logo">
            <h1 class="login-title">CPAMA VEH MAINTENANCE</h1>
            <p class="login-subtitle">Login to continue</p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    required autofocus placeholder="Email" class="form-input">
                <x-input-error :messages="$errors->get('email')" style="margin-top: 8px; color: #f87171; font-size: 12px;" />
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password"
                    required placeholder="Password" class="form-input">
                <x-input-error :messages="$errors->get('password')" style="margin-top: 8px; color: #f87171; font-size: 12px;" />
            </div>

            <button type="submit" class="btn-submit">
                <img src="{{ asset('images/login_icon.png') }}" alt="Login Icon">
                LOGIN
            </button>
        </form>

    </div>
</div>

</body>
</html>