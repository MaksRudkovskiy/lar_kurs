<div class="w-full h-full block p-10">
    <h1 class="text-xl">
        Отчёты по транзакциям
    </h1>
    <div class="flex">
        <div class="reports-block flex w-11/12 flex-wrap gap-y-12 items-center mt-3 justify-between">
            @foreach($monthlyData as $monthData)
                <div class="bgEDF1FF p-8 min-h-96 min-w-460 max-w-460">
                    <h2 class="">Отчёт по категориям за {{ $monthData['month'] }}</h2>               
                    <div class="mt-3">
                        <div class="flex items-center justify-between text-center">
                            <div class="grid grid-cols-3 w-full">
                                @foreach($monthData['categoriesSums'] as $categoryId => $sum)
                                    <div class="flex items-center gap-3 mt-3">
                                        <img src="{{ asset("content/img/{$icons[$categoryId]}") }}" alt="" class="w-8">
                                        <p> {{ $sum }} руб.</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
