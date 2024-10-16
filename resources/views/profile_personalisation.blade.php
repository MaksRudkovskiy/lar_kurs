@extends('layouts.lk')
<!-- Подключение шаблона личного кабинета -->
@section('title')
    Настройки
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')
    <div class="w-full h-full p-10">
        <button id="theme-toggle" type="button" class="flex items-center rounded-lg text-gray-500  dark:text-gray-400 max-h-12 hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:rounded-lg text-sm p-2.5">
            <svg id="theme-toggle-dark-icon" class="w-8 h-8 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
            <svg id="theme-toggle-light-icon" class="w-8 h-8 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
        </button>

        <form action="{{ route('set-language') }}" method="POST">
            @csrf
            <select name="language" class="block">
                @foreach (['en' => 'English', 'ru' => 'Русский'] as $locale => $language)
                    <option value="{{ $locale }}" {{ Session::get('language') == $locale ? 'selected' : '' }}>
                        {{ $language }}
                    </option>
                @endforeach
            </select>

             <button class="dark:text-white block dark:bg-custom-303134 px-4 py-2 rounded text-hover dark:hover:text-custom-4D52BC">{{__('profile.change_language')}}</button>
        </form>

        @include('components.admin.category_adding')
    </div>

@endsection
<!-- Секция с основным изменяемым содержимым -->