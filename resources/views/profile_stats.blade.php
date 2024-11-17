@extends('layouts.lk')
<!-- Подключение шаблона личного кабинета -->
@section('title')
    Статистика
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')
<div class="flex w-full flex-col">
    <div>
        <h2 class="ml-12 mt-12 dark:text-white text-2xl font-semibold">
            Статистика
        </h2>
    </div>
    <div class="flex justify-center w-full gap-2 mt-6">
        @include('components.profile.profile_stats.User_stats', ['period' => $period]) <!-- Компонент подсчёта пользователей -->

        @include('components.profile.profile_stats.User_stats2', ['period' => $period]) <!-- Компонент подсчёта транзакций -->

        @include('components.profile.profile_stats.User_stats3', ['period' => $period]) <!-- Компонент подсчёта пользовательских категорий -->

    </div>
</div>

<script src="{{asset('js/stats1.js')}}"></script>

@endsection
<!-- Секция с основным изменяемым содержимым -->