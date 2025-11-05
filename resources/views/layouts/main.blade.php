<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <header>
        <!-- Định nghĩa header của trang -->
        @if (auth()->user()->vaitro)
            <a class="a"  href="{{ route('dashboard.index') }}">ANKHANG STORE</a>
        @else 
            <a class="a" href="{{ route('dashboard.nhanvien') }}">ANKHANG STORE</a>
        @endif
    </header>

    <main>
        @yield('content')
    </main>

   
    
    <!-- JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
