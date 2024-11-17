@extends('layouts.lk')
<!-- Подключение шаблона личного кабинета -->
@section('title')
    Транзакции
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')

    <div class="flex w-screen divided-screen">

        @include('components.profile.profile_main.general_income_outcome')

        <div class="right-bar dark:bg-c202124 w-full px-16 bgfbfbfb">

            <div class="top-info dark:bg-c202124 px-12 flex justify-between mw-1235 mx-auto mt-8">

                <h2 class="font-medium dark:text-white text-2xl ml-8">{{__('profile.operations')}}</h2>

                <div class="flex justify-between">
                    
                    <button class="mr-12" data-modal-target="second-modal" data-modal-toggle="second-modal">
                        <img src="{{asset('content/img/filter.svg')}}" class="w-8 h-8" title="{{__('profile.filter')}}" alt="">
                    </button>

                    <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="bgC1CFFF dark:bg-c303134 dark:text-white font-medium h-11 px-3 max-w-44 rounded text-hover">
                        {{__('profile.new_transaction')}}
                    </button>
                </div>
                <!-- Кнопка вызова модального окна добавления транзакции -->

            </div>

            @php
            $categoryNames = [
                1 => __('profile.transport'),
                2 => __('profile.groceries'),
                3 => __('profile.health'),
                4 => __('profile.transfer'),
                5 => __('profile.games'),
                6 => __('profile.entertainment'),
                7 => __('profile.taxi'),
                8 => __('profile.sport'),
                9 => __('profile.beauty'),
                10 => __('profile.fuel'),
                11 => __('profile.house'),
                12 => __('profile.other'),
            ];

            $categoryIconsLight = [
                1 => asset('content/img/bus.svg'),
                2 => asset('content/img/cart.svg'),
                3 => asset('content/img/health.svg'),
                4 => asset('content/img/transaction.svg'),
                5 => asset('content/img/gamepad.svg'),
                6 => asset('content/img/entertainment.svg'),
                7 => asset('content/img/taxi.svg'),
                8 => asset('content/img/sport.svg'),
                9 => asset('content/img/beauty.svg'),
                10 => asset('content/img/fuel.svg'),
                11 => asset('content/img/house.svg'),
                12 => asset('content/img/other.svg'),
            ];

            $categoryIconsDark = [
                1 => asset('content/img-dark/bus.svg'),
                2 => asset('content/img-dark/cart.svg'),
                3 => asset('content/img-dark/health.svg'),
                4 => asset('content/img-dark/transaction.svg'),
                5 => asset('content/img-dark/gamepad.svg'),
                6 => asset('content/img-dark/entertainment.svg'),
                7 => asset('content/img-dark/taxi.svg'),
                8 => asset('content/img-dark/sport.svg'),
                9 => asset('content/img-dark/beauty.svg'),
                10 => asset('content/img-dark/fuel.svg'),
                11 => asset('content/img-dark/house.svg'),
                12 => asset('content/img-dark/other.svg'),
            ];
            @endphp

            @include('components.profile.profile_main.modal_transaction_add')
            <!-- Подключение компонента модального окна библиотеки flowbite для добавления транзакции -->

            @include('components.profile.profile_main.modal_transaction_filter')

            <!-- Подключение компонента модального окна библиотеки flowbite для фильтрации транзакций -->

            @if(Session::get('table_type') == 'default') 
                @include('components.profile.profile_main.transaction_table_new')
            @elseif(Session::get('table_type') == 'alternative')
                @include('components.profile.profile_main.transaction_table_old')
            @else
                @include('components.profile.profile_main.transaction_table_new')
            @endif
            <!-- Подключение компонента таблицы с транзакциями -->
            
        </div>

    </div>
        
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
<!-- Секция с основным изменяемым содержимым -->
