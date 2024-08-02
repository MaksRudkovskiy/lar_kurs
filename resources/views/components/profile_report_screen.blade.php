<div class="w-full h-full block p-10">
    <h1 class="text-xl">
        Отчёты по транзакциям
    </h1>
    <div class="grid grid-cols-3 gap-12 items-center justify-center justify-items-center mt-2">
        @foreach($monthlyData as $monthData)
            <div class="bgEDF1FF p-12 min-h-96">
                <h2 class="">Отчёт по категориям за {{ $monthData['month'] }}</h2>               
                <div class="mt-3">
                    <div class="flex items-center text-center">
                        <div class="grid grid-cols-3 gap-8">
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