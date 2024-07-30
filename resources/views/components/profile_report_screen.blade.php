<div class="w-full h-full block p-10">

        <h1 class="text-xl">
            Отчёты по транзакциям
        </h1>

        <div class="flex justify-between mt-2">

            <div class="bgcF8F9FF w-2/5 p-9">

            <h2 class="">Отчёт по категориям за {{ $translatedMonth }}</h2>
                
                <div class="flex flex-col mt-3">

                    <div class="flex items-center text-center">
                        
                        <div class="ml-5 grid grid-cols-3 gap-8">
                            @foreach($categoriesSums as $categoryId => $sum)
                                
                                @php
                                $icons = [
                                        1 => 'bus.svg',
                                        2 => 'cart.svg',
                                        3 => 'health.svg',
                                        4 => 'transaction.svg',
                                        5 => 'gamepad.svg',
                                        6 => 'entertainment.svg',
                                        7 => 'taxi.svg',
                                        8 => 'sport.svg',
                                        9 => 'beauty.svg',
                                        10 => 'fuel.svg',
                                        11 => 'house.svg',
                                        12 => 'other.svg',
                                    ];
                                @endphp
                                <div class="flex items-center gap-3 mt-3">
                                    <img src="{{ asset("content/img/{$icons[$categoryId]}") }}" alt="" class="w-8">
                                    <p> {{ $sum }} руб.</p>
                                </div>
                            @endforeach


                        </div>
                        

                    </div>

                </div>

            </div>

            <div class="bgcF8F9FF w-2/5 p-9">



            </div>

        </div>

    </div>