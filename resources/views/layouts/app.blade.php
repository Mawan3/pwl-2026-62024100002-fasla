<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistem Informasi Klinik')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    
    @include('layouts.partials.navbar')

 <main>
    @yield('content')
</main>

    @include('layouts.partials.footer')

</body>
</html>