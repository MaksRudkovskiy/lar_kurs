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
    @vite('resources/js/app.js')
    <!-- Подключение библиотеки tailwind -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://yastatic.net/s3/passport-sdk/autofill/v1/sdk-suggest-with-polyfills-latest.js"></script>
    <script src="https://yastatic.net/s3/passport-sdk/autofill/v1/sdk-suggest-token-with-polyfills-latest.js"></script>
    <!-- Подключение собственных стилей -->
    <script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
</script>
</head>
<body class="dark:bg-custom-171717">

<main>

    @yield('content')
    <!-- Выведение соответствующего контента страницы -->

</main>

</body>
</html>

