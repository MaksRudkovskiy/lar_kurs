@extends('layouts.auth')
<!-- Подключение шаблона страницы авторизации -->
@section('title')
    Регистрация
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')
    <div class="mx-auto w-1/6 min-w-64">

            <a href="{{ route('index') }}"><img src="content/img/logo.svg" alt="" class="mt-6 mx-auto"></a>

            <h1 class="mt-6 text-2xl dark:text-white c4D52BC font-normal">
                Регистрация
            </h1>

            <h2 class="mt-3 text-sm dark:text-white font-normal">
                Создайте аккаунт чтобы начать использовать
                сервис!
            </h2>

            @include('components.auth.register_form')
            <!-- Подключение компонента формы регистрации аккаунта -->

            <a onclick="" href="{{ route('login') }}" class="bgC1CFFF dark:text-white dark:bg-custom-303134 font-medium h-11 w-full rounded text-hover mt-5 py-2 text-center mx-auto block ">
                Вход в аккаунт
            </a>
            <?
            dd($request);
            ?>    
    </div>
@endsection
<!-- Секция с основным изменяемым содержимым -->

    