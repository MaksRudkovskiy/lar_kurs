<div class="left-block px-14 pt-8 min-w-96">

    <h1 class="text-2xl dark:text-white font-medium">Общие данные</h1>
    <div class="adapt-grid pr-2 overflow-y-auto max-h-800">
        @foreach($monthlyData as $data)
            <div class="mt-6 dark:text-white transaction pb-2">
                <h2 class="font-normal text-2xl">{{ $data['month'] }}</h2>
                <div class="flex justify-between mt-4 flex-wrap">
                    <h2 class="font-normal text-lg">Доходы</h2> <h2 class="font-bold text-xl"> {{ $data['totalIncome'] }} руб.</h2>
                </div>
                <div class="flex justify-between  mt-4 flex-wrap">
                    <h2 class="font-normal text-lg">Расходы</h2> <h2 class="font-bold text-xl">{{ $data['totalExpense'] }} руб.</h2>
                </div>
            </div>
        @endforeach
    </div>
</div>