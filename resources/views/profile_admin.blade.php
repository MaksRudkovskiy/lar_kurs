@extends('layouts.lk')
<!-- Подключение шаблона личного кабинета -->
@section('title')
    Админка
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')
    <div class="w-full">

        @include('components.admin.users_table')

    </div>

@endsection
<!-- Секция с основным изменяемым содержимым -->