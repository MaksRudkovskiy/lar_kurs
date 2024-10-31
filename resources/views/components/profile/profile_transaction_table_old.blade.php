<div class="transaction-block scroll-table mw-1265 mx-auto mt-6 overflow-y-scroll max-h-790 scrollbar scrollbar-thumb-custom-EDF1FF">
    <table id="transactionTable" class="w-full h-full">
        <thead class="dark:bg-custom-171717 bg-custom-EDF1FF dark:text-white sticky top-0 z-10">
            <tr>
                <th class="px-10 py-5 text-lg font-medium">{{__('profile.category')}}</th>
                <th class="px-10 py-5 text-lg font-medium">{{__('profile.date')}}</th>
                <th class="px-10 py-5 text-lg font-medium">{{__('profile.source')}}</th>
                <th class="px-10 py-5 text-lg font-medium">{{__('profile.type')}}</th>
                <th class="px-10 py-5 text-lg font-medium">{{__('profile.amount')}}</th>
                <th class="px-10 py-5 text-lg font-medium">{{__('profile.actions')}}</th>
            </tr>
        </thead>
        <tbody class="dark:text-white">
            @if($transactions->isEmpty())
            <tr>
                <td colspan="6" class="text-center py-8">
                    <h2 class="text-xl dark:text-white">{{ __('profile.no_transactions') }}</h2>
                </td>
            </tr>
            @else
                @foreach ($transactions as $date => $group)
                    @foreach ($group as $transaction)
                    <tr class="transaction">
                        <td>
                            <img class="mx-auto dark:hidden dark:text-white block text-center w-8 h-8"
                                title="{{ $categoryNames[$transaction->category_id] }}"
                                src="{{ $categoryIconsLight[$transaction->category_id] }}"
                                alt="">

                            <img class="mx-auto hidden dark:text-white dark:block text-center w-8 h-8"
                                title="{{ $categoryNames[$transaction->category_id] }}"
                                src="{{ $categoryIconsDark[$transaction->category_id] }}"
                                alt="">
                        </td>
                        <td class="px-10 py-4">
                            <h2 class="mx-auto block text-center"> {{$transaction->date}} </h2>
                        </td>
                        <td class="px-10 py-4">
                            <h2 class="mx-auto block text-center">
                                @if ($transaction->source_id == "1")
                                {{__('profile.bank')}}
                                @elseif($transaction->source_id == "2")
                                {{__('profile.cash')}}
                                @endif
                            </h2>
                        </td>
                        <td class="px-10 py-4">
                            <img class="dark:hidden mx-auto block text-center"
                                title="@if ($transaction->type_id == '2') {{__('profile.income')}} @elseif($transaction->type_id == '1') {{__('profile.outcome')}} @endif"
                                src="@if ($transaction->type_id == '2') {{ asset('content/img/plus.svg') }} @elseif($transaction->type_id == '1') {{ asset('content/img/minus.svg') }} @endif"
                                alt="">
                            <img class="hidden mx-auto dark:block text-center"
                                title="@if ($transaction->type_id == '2') {{__('profile.income')}} @elseif($transaction->type_id == '1') {{__('profile.outcome')}} @endif"
                                src="@if ($transaction->type_id == '2') {{ asset('content/img-dark/plus.svg') }} @elseif($transaction->type_id == '1') {{ asset('content/img-dark/minus.svg') }} @endif"
                                alt="">
                        </td>
                        <td class="px-10 py-4">
                            <h2 class="mx-auto block text-center">{{$transaction->amount}} {{__('profile.rub')}}</h2>
                        </td>

                        <td class="px-10 py-4 flex ml-auto">

                            @component('components.profile.profile_modal_edit_transaction', [
                            'transaction' => $transaction,
                            ])
                            @endcomponent

                            <a class="block dark:hidden mx-auto cursor-pointer" title="{{__('profile.delete')}}" href="{{route('DeleteTransaction', ['id'=>$transaction->id])}}"><img src="content/img/delete.svg" class="block mx-auto" alt=""></a>
                            <a class="hidden dark:block mx-auto cursor-pointer" title="{{__('profile.delete')}}" href="{{route('DeleteTransaction', ['id'=>$transaction->id])}}"><img src="content/img-dark/delete.svg" class="block mx-auto" alt=""></a>

                        </td>
                    </tr>
                    @endforeach
                @endforeach
            @endif
        </tbody>
    </table>
</div>

{{ $paginator->appends(request()->query())->links('components.profile.pagination') }}