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

<main>

    @yield('content')
    <!-- Выведение соответствующего контента страницы -->

</main>

</body>
</html>

