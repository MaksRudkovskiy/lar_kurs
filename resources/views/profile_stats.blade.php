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
    <div class="flex items-center justify-center w-full h-full">
        @include('components.profile.User_stats', ['userStats' => $userStats, 'period' => $period])


    </div>
</div>

<script src="{{asset('js/stats1.js')}}"></script>

@endsection
<!-- Секция с основным изменяемым содержимым -->