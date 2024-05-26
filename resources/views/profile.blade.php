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

        <button class="bgC1CFFF font-medium h-11 w-full max-w-44 rounded text-hover">
            Новая транзакция
        </button>

    </div>

    <div class="transaction-block mw-1265 mx-auto mt-6">
        <table class="mw-1265 w-full">
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
                <tr class="transaction">
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/bus.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">13 июн 2024 </h2>
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">Банк</h2>
                    </td>
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/minus.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">25 р.</h2>
                    </td>

                    <td class="px-10 py-4 flex ml-auto">
                        <img class="block mx-auto cursor-pointer" src="content/img/edit.svg" alt="">
                        <img class="block mx-auto cursor-pointer" src="content/img/delete.svg" alt="">
                    </td>
                </tr>

                <tr class="transaction">
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/cart.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">09 фев 2024  </h2>
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">Банк</h2>
                    </td>
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/minus.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">9999 р.</h2>
                    </td>

                    <td class="px-10 py-4 flex ml-auto">
                        <img class="block mx-auto cursor-pointer" src="content/img/edit.svg" alt="">
                        <img class="block mx-auto cursor-pointer" src="content/img/delete.svg" alt="">
                    </td>
                </tr>

                <tr class="transaction">
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/health.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">21 дек 2023  </h2>
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">Банк</h2>
                    </td>
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/minus.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">8674 р.</h2>
                    </td>

                    <td class="px-10 py-4 flex ml-auto">
                        <img class="block mx-auto cursor-pointer" src="content/img/edit.svg" alt="">
                        <img class="block mx-auto cursor-pointer" src="content/img/delete.svg" alt="">
                    </td>
                </tr>

                <tr class="transaction">
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/transaction.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">12 июн 2024  </h2>
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">Банк</h2>
                    </td>
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/minus.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">2300 р.</h2>
                    </td>

                    <td class="px-10 py-4 flex ml-auto">
                        <img class="block mx-auto cursor-pointer" src="content/img/edit.svg" alt="">
                        <img class="block mx-auto cursor-pointer" src="content/img/delete.svg" alt="">
                    </td>
                </tr>

                <tr class="transaction">
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/gamepad.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">15 май 2024  </h2>
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">Банк</h2>
                    </td>
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/minus.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">2357 р.</h2>
                    </td>

                    <td class="px-10 py-4 flex ml-auto">
                        <img class="block mx-auto cursor-pointer" src="content/img/edit.svg" alt="">
                        <img class="block mx-auto cursor-pointer" src="content/img/delete.svg" alt="">
                    </td>
                </tr>

                <tr class="transaction">
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/entertainment.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">1 апр 2024  </h2>
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">Банк</h2>
                    </td>
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/minus.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">1257 р.</h2>
                    </td>

                    <td class="px-10 py-4 flex ml-auto">
                        <img class="block mx-auto cursor-pointer" src="content/img/edit.svg" alt="">
                        <img class="block mx-auto cursor-pointer" src="content/img/delete.svg" alt="">
                    </td>
                </tr>

                <tr class="transaction">
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/taxi.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">21 мар 2024  </h2>
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">Банк</h2>
                    </td>
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/minus.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">3256 р.</h2>
                    </td>

                    <td class="px-10 py-4 flex ml-auto">
                        <img class="block mx-auto cursor-pointer" src="content/img/edit.svg" alt="">
                        <img class="block mx-auto cursor-pointer" src="content/img/delete.svg" alt="">
                    </td>
                </tr>

                <tr class="transaction">
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/sport.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">16 янв 2024  </h2>
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">Банк</h2>
                    </td>
                    <td class="px-10 py-4">
                        <img class="mx-auto block text-center" src="content/img/minus.svg" alt="">
                    </td>
                    <td class="px-10 py-4">
                        <h2 class="mx-auto block text-center">7670000000 р.</h2>
                    </td>

                    <td class="px-10 py-4 flex ml-auto">
                        <img class="block mx-auto cursor-pointer" src="content/img/edit.svg" alt="">
                        <img class="block mx-auto cursor-pointer" src="content/img/delete.svg" alt="">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

</div>

@endsection