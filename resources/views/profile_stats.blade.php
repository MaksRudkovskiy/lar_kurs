@extends('layouts.lk')
<!-- Подключение шаблона личного кабинета -->
@section('title')
    Статистика
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')

<div class="flex justify-center items-center w-full">
    @include('components.profile.User_stats', ['userStats' => $userStats, 'period' => $period])
</div>

<script src="{{asset('js/stats.js')}}">

</script>

@endsection
<!-- Секция с основным изменяемым содержимым -->    