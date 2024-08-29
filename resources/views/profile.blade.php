@extends('layouts.lk')
<!-- Подключение шаблона личного кабинета -->
@section('title')
    Транзакции
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')

    <div class="flex w-screen divided-screen">

        @include('components.profile_general_income_outcome')

        <div class="right-bar w-full px-16 bgfbfbfb">

            <div class="top-info px-12 flex justify-between mw-1235 mx-auto mt-8">

                <h2 class="font-medium text-2xl ml-8">Операции</h2>

                <div class="flex justify-between">
                    
                    <button class="mr-12" data-modal-target="second-modal" data-modal-toggle="second-modal">
                        <img src="{{asset('content/img/filter.svg')}}" class="w-8 h-8" alt="">
                    </button>

                    <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="bgC1CFFF font-medium h-11 px-3 max-w-44 rounded text-hover">
                        Новая транзакция
                    </button>
                </div>
                <!-- Кнопка вызова модального окна добавления транзакции -->

            </div>


            @include('components.profile_modal_transaction_add')
            <!-- Подключение компонента модального окна библиотеки flowbite для добавления транзакции -->

            @include('components.profile_modal_transaction_filter')
            <!-- Подключение компонента модального окна библиотеки flowbite для фильтрации транзакций -->

            @include('components.profile_transaction_table')
            <!-- Подключение компонента таблицы с транзакциями -->
            
        </div>

    </div>

@endsection
<!-- Секция с основным изменяемым содержимым -->
