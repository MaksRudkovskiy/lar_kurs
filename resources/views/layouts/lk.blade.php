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
<body class="overflow-x-hidden">

<main>

<div class="top-bar h-20 w-full bgEDF1FF flex items-center justify-between pr">

    <a href="{{ route('index') }}"><img class="ml-20 block my-auto" src="content/img/logo.svg" alt=""></a> 

        <a class="mr-32" 
        href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"
        >
        <img src="content/img/quit.svg" alt="" title="Выйти">
    </a>
    <!-- Кнопка выхода из аккаунта -->
    
    </div>

    <div class="flex">

    @include('components.profile_lk_left_bar')
    <!-- Вызов компонента боковой панели страницы для навигации по личному кабинету -->

    @yield('content')
    <!-- Выведение соответствующего контента страницы -->
    </div>
    
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<!-- Подключение библиотеки flowbite -->
</body>
</html>

<form id="logout-form" action="{{ route('logout') }}" method="POST">
@csrf
</form>