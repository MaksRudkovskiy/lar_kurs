<div class="left-block px-14 py-8 min-w-96">

    <h1 class="general-data text-2xl dark:text-white font-medium">{{__('profile.general')}}</h1>
    <div class="adapt-grid pr-6 mt-6 overflow-y-auto max-h-900 scrollbar scrollbar-thumb-custom-EDF1FF dark:scrollbar-thumb-custom-EDF1FF">
        @if($monthlyData == null || count($monthlyData) === 0)
                <tr>
                    <td colspan="6" class="text-center py-8">
                        <h2 class="text-xl dark:text-white">{{ __('profile.not_yet') }}</h2>
                    </td>
                </tr>
        @else
        @foreach($monthlyData as $data)
            <div class="mb-6 dark:text-white pl-2 pb-2">
                <h2 class="font-normal text-2xl">{{ $data['month'] }}</h2>
                <div class="flex justify-between mt-4 flex-wrap">
                    <h2 class="font-normal text-lg">{{__('profile.income')}}</h2> <h2 class="font-bold text-xl"> {{ $data['totalIncome'] }} {{__('profile.rub')}}</h2>
                </div>
                <div class="flex justify-between  mt-4 flex-wrap">
                    <h2 class="font-normal text-lg">{{__('profile.outcome')}}</h2> <h2 class="font-bold text-xl">{{ $data['totalExpense'] }} {{__('profile.rub')}}</h2>
                </div>
            </div>
        @endforeach
        @endif
    </div>
</div>