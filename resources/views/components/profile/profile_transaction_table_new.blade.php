<div class="transaction-block mw-1265 mx-auto mt-6">
    <div id="transactionTable" class="mw-1265 w-full">
        <div class="transactionHead bgEDF1FF dark:bg-c171717">
            <div class="flex justify-around max-w-1235 dark:bg-c171717">   
                <div class="py-5 dark:text-white text-lg font-medium w-36 text-center">{{__('profile.category')}}</div>
                <div class="py-5 dark:text-white text-lg font-medium w-36 text-center">{{__('profile.source')}}</div>
                <div class="py-5 dark:text-white text-lg font-medium w-36 text-center">{{__('profile.type')}}</div>
                <div class="py-5 dark:text-white text-lg font-medium w-36 text-center">{{__('profile.amount')}}</div>
                <div class="py-5 dark:text-white text-lg font-medium w-36 text-center">{{__('profile.actions')}}</div>
            </div>
        </div>
        
        <div class="transactionBodyContainer scrollbar scrollbar-thumb-custom-EDF1FF max-h-790 overflow-y-auto">
            @if($transactions->isEmpty())
                <h2 class="text-xl text-center py-8 dark:text-white">{{ __('profile.no_transactions') }}</h2>
            @else
                <div class="transactionBody">
                    <div class="flex flex-col">
                        @foreach ($transactions as $date => $group)
                            <h2 class="ml-8 dark:text-white mt-4 font-medium text-2xl">{{ $date }} {{__('profile.year')}}</h2>
                            @foreach ($group as $transaction)
                                <div class="flex items-center justify-around py-5 text-lg font-medium transaction">
                                    <div class="w-36 text-center">
                                        <img class="mx-auto dark:hidden dark:text-white block text-center w-8 h-8"
                                            title="{{ $categoryNames[$transaction->category_id] }}"
                                            src="{{ $categoryIconsLight[$transaction->category_id] }}"
                                            alt="">

                                        <img class="mx-auto hidden dark:text-white dark:block text-center w-8 h-8"
                                            title="{{ $categoryNames[$transaction->category_id] }}"
                                            src="{{ $categoryIconsDark[$transaction->category_id] }}"
                                            alt="">
                                    </div>
                                    <div class="w-36 text-center">
                                        <h2 class="mx-auto dark:text-white block text-center"> 
                                            @if ($transaction->source_id == "1")
                                                {{__('profile.bank')}}
                                            @elseif($transaction->source_id == "2")
                                                {{__('profile.cash')}}
                                            @endif
                                        </h2>
                                    </div>
                                    <div class="w-36 dark:text-white text-center">
                                        <img class="dark:hidden mx-auto block text-center"
                                            title="@if ($transaction->type_id == '2') {{__('profile.income')}} @elseif($transaction->type_id == '1') {{__('profile.outcome')}} @endif"
                                            src="@if ($transaction->type_id == '2') {{ asset('content/img/plus.svg') }} @elseif($transaction->type_id == '1') {{ asset('content/img/minus.svg') }} @endif"
                                            alt="">
                                        <img class="hidden mx-auto dark:block text-center" 
                                            title="@if ($transaction->type_id == '2') {{__('profile.income')}} @elseif($transaction->type_id == '1') {{__('profile.outcome')}} @endif"
                                            src="@if ($transaction->type_id == '2') {{ asset('content/img-dark/plus.svg') }} @elseif($transaction->type_id == '1') {{ asset('content/img-dark/minus.svg') }} @endif"
                                            alt="">
                                    </div>
                                    <div class="w-36 dark:text-white text-center">
                                        <h2 class="mx-auto block text-center">{{$transaction->amount}} {{__('profile.rub')}}</h2>
                                    </div>
                                    <div class="w-36 dark:text-white text-center flex justify-center">
                                        
                                        @component('components.profile.profile_modal_edit_transaction', [
                                            'transaction' => $transaction,
                                        ])
                                        @endcomponent

                                        <a class="block dark:hidden mx-auto cursor-pointer" title="{{__('profile.delete')}}" href="{{route('DeleteTransaction', ['id'=>$transaction->id])}}"><img src="content/img/delete.svg" class="block mx-auto" alt=""></a>
                                        <a class="hidden dark:block mx-auto cursor-pointer" title="{{__('profile.delete')}}" href="{{route('DeleteTransaction', ['id'=>$transaction->id])}}"><img src="content/img-dark/delete.svg" class="block mx-auto" alt=""></a>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

{{ $paginator->appends(request()->query())->links('components.profile.pagination') }}
