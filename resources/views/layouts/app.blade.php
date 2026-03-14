<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Tasty Food</title>

    {{-- Google Fonts - Poppins (Pastikan ini terhubung ke internet untuk di-load) --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    {{-- Bootstrap Icons (Jika ingin menggunakan ikon Bootstrap) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    @include('layouts.partials.navbar')
    

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')

</body>
</html>