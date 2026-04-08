<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Register')</title>
    <link rel="icon" href="{{ asset('assets/img/tlc.png') }}" type="image/png">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="https://unpkg.com/scrollreveal"></script>
</head>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewireStyles


<body class="bg-slate-50 flex items-center justify-center min-h-screen">
    @yield('content')
    <script src="//unpkg.com/alpinejs" defer></script>
    @livewireScripts
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')

</html>
