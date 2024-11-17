@extends('layouts.lk')
<!-- Подключение шаблона личного кабинета -->
@section('title')
    Настройки
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')
    <div class="w-full h-full px-14 py-8">

        <h2 class="text-2xl dark:text-white font-medium">
            {{__('profile.settings')}}
        </h2>

        <div class="py-8">

            @include('components.profile.profile_settings.profile_theme_switch')
            <!-- Подключение компонента смены системной темы -->
            <hr class="my-4">

            @include('components.profile.profile_settings.profile_language_switch')
            <!-- Подключение компонента смены языка -->

            <hr class="my-4">          

            @include('components.profile.profile_settings.profile_table_switch')
            <!-- Подключение компонента смены типа таблицы -->

            <hr class="my-4">

            @if($user && ($user->role === 'privelegious_user' || $user->role === 'admin'))
                @include('components.profile.profile_settings.profile_category_adding')
                <!-- Подключение компонента добавления категории -->
            @endif  
        
        </div>

    </div>

@endsection
<!-- Секция с основным изменяемым содержимым -->