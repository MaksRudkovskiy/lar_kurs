<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/output.css">
    <title>@yield('title')</title>
    <!-- Выведение соответствующего названия страницы из предствления -->
    <link rel="shortcut icon" href="{{ asset('content/img/logo.svg') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <!-- Подключение библиотеки tailwind -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Подключение собственных стилей -->
</head>
<body>

@include('components.header')
<!-- Подключение компонента шапки сайта -->

<main>

    @yield('content')

</main>

@include('components.footer')    
<!-- Подключение компонента подвала сайта -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<!-- Подключение библиотеки flowbite -->
</body>
</html>