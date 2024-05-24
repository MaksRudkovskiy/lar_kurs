@extends('layouts.auth')
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

            <form method="POST" action="{{ route('register') }}">
                        @csrf
                <div >
                    <label for="" class="font-medium">Номер телефона</label>
                    <input name="tel" type="tel" id="tel" required class="block w-full h-12 p-3 border-black border-1 rounded-md">
                </div>

                <div class="mt-4">
                    <label for="" class="font-medium">Пароль</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password" class="block w-full p-3 h-12 border-black border-1 rounded-md">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            
                <input type="submit" value="Войти" class="bgC1CFFF font-medium h-11 w-full rounded text-hover mt-5 cursor-pointer">

                <div class="flex relative text-center mt-6">

                    <div class="got-account text-center mx-auto text-xs">Есть аккаунт?</div>
                    <div class="absolute borrtop"></div>

                </div>
            </form>

            <a onclick="" href="{{ route('login') }}" class="bgC1CFFF font-medium h-11 w-full rounded text-hover mt-5 py-2 text-center mx-auto block ">
                Вход в аккаунт
            </a>    
    </div>