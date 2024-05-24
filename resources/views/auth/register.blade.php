@extends('layout.auth')
@section('title')
    Регистрация
@endsection

@section('content')

<div class="mx-auto w-1/6 min-w-64">

    <a href="index.html"><img src="content/img/logo.svg" alt="" class="mt-6 mx-auto"></a>

    <h1 class="mt-6 text-2xl c4D52BC font-normal">
        Регистрация
    </h1>

    <h2 class="mt-3 text-sm font-normal">
        Создайте аккаунт чтобы начать использовать
        сервис!
    </h2>

    <form action="lk_transactions.html" class="mt-5 ">

        <div>
            <label for="" class="font-medium">Номер телефона</label>
            <input type="tel" value="+" class="block w-full h-12 p-3 border-black border-1 rounded-md">
        </div>

        <div class="mt-4">
            <label for="" class="font-medium">Пароль</label>
            <input type="text" class="block w-full h-12 border-black border-1 rounded-md">
        </div>


        <button class="bgC1CFFF font-medium h-11 w-full rounded text-hover mt-5">
            Создать аккаунт
        </button>

        <div class="flex relative text-center mt-6">

            <div class="got-account text-center mx-auto text-xs">Есть аккаунт?</div>
            <div class="absolute borrtop"></div>

        </div>
    </form>
    <form action="log.html">
        <button onclick="log.html" class="bgC1CFFF font-medium h-11 w-full rounded text-hover mt-5">
            Войти
        </button>
    </form>
        


    </div>

@endsection