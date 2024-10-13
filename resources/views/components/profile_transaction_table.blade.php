<div class="transaction-block mw-1265 mx-auto mt-6">
    <div id="transactionTable" class="mw-1265 w-full">
        <div class="transactionHead bgEDF1FF dark:bg-c171717">
            <div class="flex justify-around max-w-1220 dark:bg-c171717">   
                <div class="py-5 dark:text-white text-lg font-medium w-36 text-center">Категория</div>
                <div class="py-5 dark:text-white text-lg font-medium w-36 text-center">Счёт</div>
                <div class="py-5 dark:text-white text-lg font-medium w-36 text-center">Тип</div>
                <div class="py-5 dark:text-white text-lg font-medium w-36 text-center">Сумма</div>
                <div class="py-5 dark:text-white text-lg font-medium w-36 text-center">Действия</div>
            </div>
        </div>
        
        <div class="transactionBodyContainer scrollbar scrollbar-thumb-custom-EDF1FF max-h-790 overflow-y-auto">

            <div class="transactionBody">
            <div class="flex flex-col">
           @foreach ($transactions as $date => $group)
                <h2 class="ml-8 dark:text-white mt-4 font-medium text-2xl">{{ $date }}</h2>
                @foreach ($group as $transaction)
                    <div class="flex items-center justify-around py-5 text-lg font-medium transaction">
                        <div class="w-36 text-center">
                            <img class="mx-auto dark:text-white block text-center w-8 h-8"
                                title="@if ($transaction->category_id == 1) Транспорт
                                @elseif($transaction->category_id == 2) Покупки 
                                @elseif($transaction->category_id == 3) Здоровье 
                                @elseif($transaction->category_id == 4) Переводы 
                                @elseif($transaction->category_id == 5) Игры 
                                @elseif($transaction->category_id == 6) Развлечения 
                                @elseif($transaction->category_id == 7) Такси 
                                @elseif($transaction->category_id == 8) Спорт 
                                @elseif($transaction->category_id == 9) Красота 
                                @elseif($transaction->category_id == 10) Топливо 
                                @elseif($transaction->category_id == 11) ЖКХ 
                                @elseif($transaction->category_id == 12) Прочее 
                                @endif"
                                src="@if ($transaction->category_id == 1) {{ asset('content/img/bus.svg') }} 
                                @elseif($transaction->category_id == 2) {{ asset('content/img/cart.svg') }} 
                                @elseif($transaction->category_id == 3) {{ asset('content/img/health.svg') }} 
                                @elseif($transaction->category_id == 4) {{ asset('content/img/transaction.svg') }} 
                                @elseif($transaction->category_id == 5) {{ asset('content/img/gamepad.svg') }} 
                                @elseif($transaction->category_id == 6) {{ asset('content/img/entertainment.svg') }} 
                                @elseif($transaction->category_id == 7) {{ asset('content/img/taxi.svg') }} 
                                @elseif($transaction->category_id == 8) {{ asset('content/img/sport.svg') }} 
                                @elseif($transaction->category_id == 9) {{ asset('content/img/beauty.svg') }} 
                                @elseif($transaction->category_id == 10) {{ asset('content/img/fuel.svg') }} 
                                @elseif($transaction->category_id == 11) {{ asset('content/img/house.svg') }} 
                                @elseif($transaction->category_id == 12) {{ asset('content/img/other.svg') }} 
                                @endif"
                                alt="">
                        </div>
                        <div class="w-36 text-center">
                            <h2 class="mx-auto dark:text-white block text-center"> 
                                @if ($transaction->source == "bank")
                                    Банк
                                @elseif($transaction->source == "cash")
                                    Нал
                                @endif
                            </h2>
                        </div>
                        <div class="w-36 dark:text-white text-center">
                            <img class="mx-auto block text-center"
                                title="@if ($transaction->type == 'income') Доходы @elseif($transaction->type == 'outcome') Расходы @endif"
                                src="@if ($transaction->type == 'income') {{ asset('content/img/plus.svg') }} @elseif($transaction->type == 'outcome') {{ asset('content/img/minus.svg') }} @endif"
                                alt="">
                        </div>
                        <div class="w-36 dark:text-white text-center">
                            <h2 class="mx-auto block text-center">{{$transaction->amount}} руб.</h2>
                        </div>
                        <div class="w-36 dark:text-white text-center">
                            <a class="block mx-auto cursor-pointer" title="Удалить" href="{{route('DeleteTransaction', ['id'=>$transaction->id])}}"><img src="content/img/delete.svg" class="block mx-auto" alt=""></a>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>

        </div>
    </div>
</div>
