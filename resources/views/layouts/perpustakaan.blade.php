<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- CSRF TOKEN --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Perpustakaan Tiara')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8f5f3;
            color: #333;
        }

        header {
            background: #611D20;
            color: white;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        header h1 {
            font-size: 25px;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 22px;
            flex-wrap: wrap;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        nav a:hover {
            color: #f2caca;
        }

        main {
            min-height: 75vh;
            padding: 40px 7%;
        }

        footer {
            background: #611D20;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 13px;
        }

        .hero {
            background: #f0e3e0;
            border-radius: 18px;
            padding: 55px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .hero-text {
            max-width: 600px;
        }

        .hero-label {
            color: #8b4245;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .hero h2 {
            color: #611D20;
            font-size: 38px;
            margin-bottom: 15px;
        }

        .hero-description {
            line-height: 1.7;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            background: #611D20;
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 8px;
        }

        .btn:hover {
            background: #842d32;
        }

        .hero-icon {
            font-size: 90px;
        }

        .info-section {
            margin-top: 45px;
        }

        .info-section h2 {
            color: #611D20;
            margin-bottom: 20px;
        }

        .info-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
        }

        .info-icon {
            font-size: 30px;
            margin-bottom: 12px;
        }
    </style>
</head>

<body>

    <header>
        <h1>Perpustakaan Tiara</h1>

        <nav>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('buku.index') }}">Daftar Buku</a>

            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                        style="background:none;border:none;color:white;cursor:pointer;">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        © 2026 Perpustakaan Tiara. All Rights Reserved.
    </footer>

</body>
</html>