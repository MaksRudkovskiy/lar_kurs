<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/output.css">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('content/img/logo.svg') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="overflow-hidden">

<main>

<div class="top-bar h-20 w-full bgEDF1FF flex items-center justify-between pr">

    <a href="{{ route('index') }}"><img class="ml-20 block my-auto" src="content/img/logo.svg" alt=""></a> 

    <a class="mr-32" 
    href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"
    >
        <img src="content/img/quit.svg" alt="">
    </a>
    

    </div>

    @yield('content')

</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>

<form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
</form>