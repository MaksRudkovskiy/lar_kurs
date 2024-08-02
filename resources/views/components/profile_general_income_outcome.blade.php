<div class="left-block px-14 pt-8 min-w-96">

    <h1 class="text-2xl font-bold">Общие данные</h1>

    @foreach($monthlyData as $data)
        <div class="mt-6">
            <h2 class="font-normal text-2xl">{{ $data['month'] }}</h2>
            <div class="flex justify-between mt-4">
                <h2 class="font-normal text-lg">Доходы</h2> <h2 class="font-bold text-xl"> {{ $data['totalIncome'] }} руб.</h2>
            </div>
            <div class="flex justify-between mt-4">
                <h2 class="font-normal text-lg">Расходы</h2> <h2 class="font-bold text-xl">{{ $data['totalExpense'] }} руб.</h2>
            </div>
        </div>
    @endforeach
</div>