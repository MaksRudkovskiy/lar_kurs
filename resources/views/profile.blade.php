@extends('layouts.lk')
    @section('title')
        Транзакции
    @endsection

@section('content')

<div class="flex w-screen">



<div class="left-bar h-screen w-full max-w-20 flex-col relative bottom-1 bgEDF1FF">

    <a href="{{ route('profile') }}" class="text-hover">
        <img class="block mx-auto pt-5" src="content/img/transaction_img.svg" alt="">
        <h3 class="text-xxs text-center font-medium">транзакции</h3>
    </a>

    <a href="{{ route('profile_settings') }}" class="text-hover">
        <img class="block mx-auto pt-5" src="content/img/setting_icon.svg" alt="">
        <h3 class="text-xxs text-center font-medium">настройки</h3>
    </a>

</div>

<div class="left-block px-14 pt-8 min-w-96">

    <h1 class="font-normal text-2xl">Общие данные</h1>

    <div class="flex justify-between mt-12">
        <h2 class="font-normal text-xl">Доходы</h2> <h2 class="font-bold text-2xl">Число</h2>
    </div>

    <div class="flex justify-between mt-16">
        <h2 class="font-normal text-xl">Расходы</h2> <h2 class="font-bold text-2xl">Число</h2>
    </div>
</div>

<div class="right-bar w-full px-16 bgcFDFDFD">

    <div class="top-info px-12 flex justify-between mw-1235 mx-auto mt-8">

        <h2 class="font-medium text-2xl ml-8">Операции</h2>

        <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="bgC1CFFF font-medium h-11 w-full max-w-44 rounded text-hover">
            Новая транзакция
        </button>

    </div>


<!-- Модальное окно -->
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden bg-dark overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <form class="relative bg-white rounded-lg shadow " method="POST" action="{{ route('new_transaction') }}">
                @csrf
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-">
                    <h3 class="text-xl font-semibold text-gray-9">
                        Добавление транзакции
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                </div>
                <div class="p-4 md:p-5 space-y-4">

                    <div class="category">
                        <h2>Выберите категорию транзакции:</h2>
                        <select name="category" class="text-black block h-8 bor-b-bottom">
                            <option value="transport" selected>Транспорт</option>
                            <option value="groceries">Продукты</option>
                            <option value="health">Здоровье</option>
                            <option value="transactions">Переводы</option>
                            <option value="games">Игры</option>
                            <option value="entertainment">Развлечения</option>
                            <option value="taxi">Такси</option>
                            <option value="sports">Спорт</option>
                        </select>
                    </div>

                    <hr>

                    <div class="date">
                        <h2>Выберите дату:</h2>
                        <input type="date" name="date" class="block h-8 bor-b-bottom">
                    </div>

                    <hr>

                    <div class="source">
                        <h2>Выберите счёт</h2>
                        <select name="source" class="block h-8 border-black border-1">
                            <option value="bank">Банк</option>
                            <option value="cash">Нал</option>
                        </select>
                    </div>

                    <hr>

                    <div class="type">
                        <h2>Выберите тип</h2>
                        <select name="type" class="block h-8 border-black border-1">
                            <option value="income">Доходы</option>
                            <option value="outcome">Расходы</option>
                        </select>

                    </div>

                    <hr>

                    <div class="amount">    
                        <h2>Введите сумму</h2>

                        <input type="number" name="amount" class="block h-8 border-black border-1 py-1 px-2 rounded">

                    </div>

                </div>
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <input value="Добавить" data-modal-hide="default-modal" type="submit" class="py-2.5 px-5 font-medium rounded text-hover bgC1CFFF bg-slate-900">
                    <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border text-hover">Отмена</button>
                </div>

            </form>
        </div>
    </div>
<!-- Модальное окно -->


    <div class="transaction-block mw-1265 mx-auto mt-6">
        <table id="transactionTable" class="mw-1265 w-full">
            <thead class="">
                <tr>   
                    <th class="bgEDF1FF px-10 py-5 text-lg font-medium">Категория</th>
                    <th class="bgEDF1FF px-10 py-5 text-lg font-medium">Дата</th>
                    <th class="bgEDF1FF px-10 py-5 text-lg font-medium">Счёт</th>
                    <th class="bgEDF1FF px-10 py-5 text-lg font-medium">Тип</th>
                    <th class="bgEDF1FF px-10 py-5 text-lg font-medium">Сумма</th>
                    <th class="bgEDF1FF px-10 py-5 text-lg font-medium">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr class="transaction">
                        <td class="px-10 py-4">
                            <img class="mx-auto block text-center" src="
                            @if ($transaction ->category == "transport")
                                {{asset('content/img/bus.svg')}}
                            @elseif($transaction ->category == "groceries")
                                {{asset('content/img/cart.svg')}}
                            @elseif($transaction ->category == "health")
                                {{asset('content/img/health.svg')}}
                            @elseif($transaction ->category == "transactions")
                                {{asset('content/img/transaction.svg')}}
                            @elseif($transaction ->category == "games")
                                {{asset('content/img/gamepad.svg')}}
                            @elseif($transaction ->category == "entertainment")
                                {{asset('content/img/entertainment.svg')}}
                            @elseif($transaction ->category == "taxi")
                                {{asset('content/img/taxi.svg')}}
                            @elseif($transaction ->category == "sports")
                                {{asset('content/img/sport.svg')}}
                            @endif
                            " alt="">
                        </td>
                        <td class="px-10 py-4">
                            <h2 class="mx-auto block text-center"> {{$transaction ->date}} </h2>
                        </td>
                        <td class="px-10 py-4">
                            <h2 class="mx-auto block text-center"> 
                                @if ($transaction ->source == "bank")
                                    {{"Банк"}}
                                @elseif($transaction ->source == "cash")
                                    {{"Нал"}}
                                @endif
                            </h2>
                        </td>
                        <td class="px-10 py-4">
                            <img class="mx-auto block text-center" src="
                            @if ($transaction ->type == "income")
                                {{asset('content/img/plus.svg')}}
                            @elseif($transaction ->type == "outcome")
                                {{asset('content/img/minus.svg')}}
                            @endif
                            " alt="">
                        </td>
                        <td class="px-10 py-4">
                            <h2 class="mx-auto block text-center">{{$transaction ->amount}} руб.</h2>
                        </td>

                        <td class="px-10 py-4 flex ml-auto">
                            <img class="block mx-auto cursor-pointer" src="content/img/edit.svg" alt="">
                            <img class="block mx-auto cursor-pointer" src="content/img/delete.svg" alt="">
                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>

</div>

</div>

@endsection