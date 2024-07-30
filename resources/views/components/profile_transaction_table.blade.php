<div class="transaction-block mw-1265 mx-auto mt-6">
    <table id="transactionTable" class="mw-1265 w-full">
        <thead class="">
            <tr>   
                <th class="bgEDF1FF px-10 py-5 text-lg font-medium">
                    <button class="flex items-center w-full justify-center" data-modal-target="second-modal" data-modal-toggle="second-modal">
                        Категория

                        <img src="{{asset('content/img/galka.svg')}}" class="ml-1 w-4 h-4" alt="">
                    </button> 
                </th>
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
                        <img class="mx-auto block text-center w-8 h-8"
                            title="
                                @if ($transaction->category_id == "1")
                                    Транспорт
                                @elseif($transaction ->category_id == "2")
                                    Покупки
                                @elseif($transaction ->category_id== "3")
                                    Здоровье
                                @elseif($transaction ->category_id == "4")
                                    Переводы
                                @elseif($transaction ->category_id == "5")
                                    Игры
                                @elseif($transaction ->category_id == "6")
                                    Развлечения
                                @elseif($transaction ->category_id == "7")
                                    Такси
                                @elseif($transaction ->category_id == "8")
                                    Спорт
                                @elseif($transaction ->category_id == "9")
                                    Красота
                                @elseif($transaction ->category_id == "10")
                                    Топливо
                                @elseif($transaction ->category_id == "11")
                                    ЖКХ
                                @elseif($transaction ->category_id == "12")
                                    Прочее
                                @endif
                            "
                            src="
                                @if ($transaction ->category_id == "1")
                                    {{asset('content/img/bus.svg')}}
                                @elseif($transaction ->category_id == "2")
                                    {{asset('content/img/cart.svg')}}
                                @elseif($transaction ->category_id == "3")
                                    {{asset('content/img/health.svg')}}
                                @elseif($transaction ->category_id == "4")
                                    {{asset('content/img/transaction.svg')}}
                                @elseif($transaction ->category_id == "5")
                                    {{asset('content/img/gamepad.svg')}}
                                @elseif($transaction ->category_id == "6")
                                    {{asset('content/img/entertainment.svg')}}
                                @elseif($transaction ->category_id == "7")
                                    {{asset('content/img/taxi.svg')}}
                                @elseif($transaction ->category_id == "8")
                                    {{asset('content/img/sport.svg')}}
                                @elseif($transaction ->category_id == "9")
                                    {{asset('content/img/beauty.svg')}}
                                @elseif($transaction ->category_id == "10")
                                    {{asset('content/img/fuel.svg')}}
                                @elseif($transaction ->category_id == "11")
                                    {{asset('content/img/house.svg')}}
                                @elseif($transaction ->category_id == "12")
                                    {{asset('content/img/other.svg')}}
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
                        <img class="mx-auto block text-center"
                        title="
                        @if ($transaction->type == "income")
                            Доходы
                        @elseif($transaction ->type == "outcome")
                            Расходы
                        @endif
                        "
                        src="
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
                        <a class="block mx-auto cursor-pointer" title="Удалить" href="{{route('DeleteTransaction', ['id'=>$transaction->id])}}"><img src="content/img/delete.svg" alt=""></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>