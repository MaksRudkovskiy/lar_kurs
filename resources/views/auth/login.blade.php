@extends('layouts.auth')
<!-- Подключение шаблона страницы авторизации -->
@section('title')
    Вход
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')
    <div class="mx-auto w-1/6 min-w-64 dark:text-white">

            <a href="{{ route('index') }}"><img src="content/img/logo.svg" alt="" class="mt-6 mx-auto"></a>

            <h1 class="mt-6 text-2xl c4D52BC font-normal    ">
                Вход
            </h1>

            <h2 class="mt-3 text-sm font-normal">
                Войдите в свой аккаунт для получения
                доступа к вашим данным
            </h2>

            @include('components.login_form')
            <!-- Подключение компонента формы входа в аккаунт -->

            <a onclick="" href="{{ route('register') }}" class="bgC1CFFF font-medium h-11 w-full dark:bg-custom-303134 rounded text-hover mt-5 py-2 text-center mx-auto block ">
                Создать аккаунт
            </a>    
    </div>
@endsection
<!-- Секция с основным изменяемым содержимым -->


