<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Autentikasi - Perpustakaan Tiara')</title>

<style>
    * { box-sizing: border-box; }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f8f5f3;
        color: #333;
    }

    .auth-wrapper {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px 20px;
    }

    .auth-card {
        width: 100%;
        max-width: 440px;
        background: white;
        padding: 38px;
        border-radius: 16px;
        box-shadow: 0 5px 25px rgba(0,0,0,.08);
    }

    .auth-brand {
        text-align: center;
        margin-bottom: 28px;
    }

    .auth-brand h1 {
        color: #611D20;
        margin-bottom: 8px;
    }

    .auth-brand p {
        color: #777;
        font-size: 14px;
    }

    .auth-card input {
        width: 100%;
        padding: 11px;
        border: 1px solid #ddd;
        border-radius: 7px;
        margin-top: 5px;
    }

    .auth-card button {
        background: #611D20;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 7px;
        cursor: pointer;
    }

    .auth-card a {
        color: #611D20;
    }
</style>

</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-card">
            <div class="auth-brand">
                <h1>Perpustakaan Tiara</h1>
                <p>Selamat datang! Silakan masuk ke akun Anda.</p>
            </div>

        {{ $slot }}
    </div>
</div>

</body>
</html>