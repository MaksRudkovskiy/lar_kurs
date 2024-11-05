<!-- Модальное окно редактирования -->
@if(Auth::user()->role == 'user')

@else
<button class="block dark:hidden mx-auto cursor-pointer" data-modal-target="crud-modal-master-{{ $transaction->id }}"
data-modal-toggle="crud-modal-master-{{ $transaction->id }}" title="{{__('profile.edit')}}"><img src="content/img/edit.svg" class="block mx-auto" alt=""></button>
<button class="hidden dark:block mx-auto cursor-pointer" data-modal-target="crud-modal-master-{{ $transaction->id }}"
data-modal-toggle="crud-modal-master-{{ $transaction->id }}" title="{{__('profile.edit')}}"><img src="content/img-dark/edit.svg" class="block mx-auto" alt=""></button>


<!-- Main modal -->
<div id="crud-modal-master-{{ $transaction->id }}" tabindex="-1" aria-hidden="true"
    class="hidden bg-dark overflow-y-auto overflow-x-hidden
 fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-screen max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <form class="relative bg-white rounded-lg shadow font-normal text-base dark:bg-custom-202124 dark:text-white" method="POST" action="{{ route('transactions.update', $transaction->id) }}" onsubmit="clearCategories('{{ $transaction->id }}')">
            @csrf
            @method('PUT')
            <div class="flex items-center justify-between p-4 md:p-5 border-b">
                <h3 class="text-gray-9 text-xl font-semibold">
                    {{__('profile.edit_trans')}}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="crud-modal-master-{{ $transaction->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">{{__('profile.close_modal')}}</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <div class="category flex flex-col">
                    <h2 class="text-start">{{__('profile.choose_cat')}}:</h2>
                    @if($transaction->custom_category_id !== null)
                    
                    <div class="flex flex-col">

                                <label for="mem" class="flex items-center text-center">
                                    <p>{{__('profile.system')}}</p>
                                    <input type="radio" id="system-{{ $transaction->id }}" name="mem" checked class="cursor-pointer" onclick="toggleSelect('{{ $transaction->id }}')">
                                </label>
                                
                                <label for="mem" class="flex items-center text-center">
                                    <p>{{__('profile.custom')}}</p>
                                    <input type="radio" id="custom-{{ $transaction->id }}" name="mem" class="cursor-pointer" onclick="toggleSelect('{{ $transaction->id }}')">
                                </label>
                            

                                <select name="category" id="system-select-{{ $transaction->id }}" class=" text-black h-8 bor-b-bottom dark:bg-custom-202124 dark:text-white dark:border-white" data-system-category>
                                    <option value="1" {{ $transaction->category_id == 1 ? 'selected' : '' }}>{{__('profile.transport')}}</option>
                                    <option value="2" {{ $transaction->category_id == 2 ? 'selected' : '' }}>{{__('profile.groceries')}}</option>
                                    <option value="3" {{ $transaction->category_id == 3 ? 'selected' : '' }}>{{__('profile.health')}}</option>
                                    <option value="4" {{ $transaction->category_id == 4 ? 'selected' : '' }}>{{__('profile.transfer')}}</option>
                                    <option value="5" {{ $transaction->category_id == 5 ? 'selected' : '' }}>{{__('profile.games')}}</option>
                                    <option value="6" {{ $transaction->category_id == 6 ? 'selected' : '' }}>{{__('profile.entertainment')}}</option>
                                    <option value="7" {{ $transaction->category_id == 7 ? 'selected' : '' }}>{{__('profile.taxi')}}</option>
                                    <option value="8" {{ $transaction->category_id == 8 ? 'selected' : '' }}>{{__('profile.sport')}}</option>
                                    <option value="9" {{ $transaction->category_id == 9 ? 'selected' : '' }}>{{__('profile.beauty')}}</option>
                                    <option value="10" {{ $transaction->category_id == 10 ? 'selected' : '' }}>{{__('profile.fuel')}}</option>
                                    <option value="11" {{ $transaction->category_id == 11 ? 'selected' : '' }}>{{__('profile.house')}}</option>
                                    <option value="12" {{ $transaction->category_id == 12 ? 'selected' : '' }}>{{__('profile.other')}}</option>
                                </select>

    
                                <select name="custom_category" id="custom-select-{{ $transaction->id }}" class="hidden text-black h-8 bor-b-bottom dark:bg-custom-202124 dark:text-white dark:border-white" data-custom-category>
                                    @foreach($customCat as $cat)
                                        
                                        <option value="{{ $cat -> id }}">{{$cat->custom_category_name}}</option>

                                    @endforeach
                                </select>
                                
                            </div>
                @else
                    @if(count($customCat) == 0)
                    
                        <select name="category" id="system-select-{{ $transaction->id }}" class="text-black h-8 bor-b-bottom dark:bg-custom-202124 dark:text-white dark:border-white" data-system-category>
                            <option value="1" {{ $transaction->category_id == 1 ? 'selected' : '' }}>{{__('profile.transport')}}</option>
                            <option value="2" {{ $transaction->category_id == 2 ? 'selected' : '' }}>{{__('profile.groceries')}}</option>
                            <option value="3" {{ $transaction->category_id == 3 ? 'selected' : '' }}>{{__('profile.health')}}</option>
                            <option value="4" {{ $transaction->category_id == 4 ? 'selected' : '' }}>{{__('profile.transfer')}}</option>
                            <option value="5" {{ $transaction->category_id == 5 ? 'selected' : '' }}>{{__('profile.games')}}</option>
                            <option value="6" {{ $transaction->category_id == 6 ? 'selected' : '' }}>{{__('profile.entertainment')}}</option>
                            <option value="7" {{ $transaction->category_id == 7 ? 'selected' : '' }}>{{__('profile.taxi')}}</option>
                            <option value="8" {{ $transaction->category_id == 8 ? 'selected' : '' }}>{{__('profile.sport')}}</option>
                            <option value="9" {{ $transaction->category_id == 9 ? 'selected' : '' }}>{{__('profile.beauty')}}</option>
                            <option value="10" {{ $transaction->category_id == 10 ? 'selected' : '' }}>{{__('profile.fuel')}}</option>
                            <option value="11" {{ $transaction->category_id == 11 ? 'selected' : '' }}>{{__('profile.house')}}</option>
                            <option value="12" {{ $transaction->category_id == 12 ? 'selected' : '' }}>{{__('profile.other')}}</option>
                        </select>

                    @else
                            <div class="flex flex-col">

                                <label for="mem" class="flex items-center text-center">
                                    <p>{{__('profile.system')}}</p>
                                    <input type="radio" id="system-{{ $transaction->id }}" name="mem" checked class="cursor-pointer" onclick="toggleSelect('{{ $transaction->id }}')">
                                </label>
                                
                                <label for="mem" class="flex items-center text-center">
                                    <p>{{__('profile.custom')}}</p>
                                    <input type="radio" id="custom-{{ $transaction->id }}" name="mem" class="cursor-pointer" onclick="toggleSelect('{{ $transaction->id }}')">
                                </label>
                            

                                <select name="category" id="system-select-{{ $transaction->id }}" class=" text-black h-8 bor-b-bottom dark:bg-custom-202124 dark:text-white dark:border-white" data-system-category>
                                    <option value="1" {{ $transaction->category_id == 1 ? 'selected' : '' }}>{{__('profile.transport')}}</option>
                                    <option value="2" {{ $transaction->category_id == 2 ? 'selected' : '' }}>{{__('profile.groceries')}}</option>
                                    <option value="3" {{ $transaction->category_id == 3 ? 'selected' : '' }}>{{__('profile.health')}}</option>
                                    <option value="4" {{ $transaction->category_id == 4 ? 'selected' : '' }}>{{__('profile.transfer')}}</option>
                                    <option value="5" {{ $transaction->category_id == 5 ? 'selected' : '' }}>{{__('profile.games')}}</option>
                                    <option value="6" {{ $transaction->category_id == 6 ? 'selected' : '' }}>{{__('profile.entertainment')}}</option>
                                    <option value="7" {{ $transaction->category_id == 7 ? 'selected' : '' }}>{{__('profile.taxi')}}</option>
                                    <option value="8" {{ $transaction->category_id == 8 ? 'selected' : '' }}>{{__('profile.sport')}}</option>
                                    <option value="9" {{ $transaction->category_id == 9 ? 'selected' : '' }}>{{__('profile.beauty')}}</option>
                                    <option value="10" {{ $transaction->category_id == 10 ? 'selected' : '' }}>{{__('profile.fuel')}}</option>
                                    <option value="11" {{ $transaction->category_id == 11 ? 'selected' : '' }}>{{__('profile.house')}}</option>
                                    <option value="12" {{ $transaction->category_id == 12 ? 'selected' : '' }}>{{__('profile.other')}}</option>
                                </select>

    
                                <select name="custom_category" id="custom-select-{{ $transaction->id }}" class="hidden text-black h-8 bor-b-bottom dark:bg-custom-202124 dark:text-white dark:border-white" data-custom-category>
                                    @foreach($customCat as $cat)
                                        
                                        <option value="{{ $cat -> id }}">{{$cat->custom_category_name}}</option>

                                    @endforeach
                                </select>
                                
                            </div>

                        
                    @endif
                @endif
                </div>

                <hr>

                <div class="date">
                    <h2 class="text-start font-normal">{{__('profile.choose_date')}}:</h2>
                    <input type="date" required name="date" value="{{ $transaction->date }}" class="block h-8 font-normal bor-b-bottom dark:bg-custom-202124 dark:text-white dark:border-white">
                </div>

                <hr>

                <div class="source">
                    <h2 class="text-start font-normal">{{__('profile.choose_source')}}</h2>
                    <select name="source" class="block h-8 border-black border-1 font-normal dark:bg-custom-202124 dark:text-white dark:border-white">
                        <option value="1" {{ $transaction->source_id == 1 ? 'selected' : '' }}>{{__('profile.bank')}}</option>
                        <option value="2" {{ $transaction->source_id == 2 ? 'selected' : '' }}>{{__('profile.cash')}}</option>
                    </select>
                </div>

                <hr>

                <div class="type">
                    <h2 class="text-start font-normal">{{__('profile.choose_type')}}</h2>
                    <select name="type" class="block h-8 border-black border-1 font-normal dark:bg-custom-202124 dark:text-white dark:border-white">
                        <option value="1" {{ $transaction->type_id == 1 ? 'selected' : '' }}>{{__('profile.outcome')}}</option>
                        <option value="2" {{ $transaction->type_id == 2 ? 'selected' : '' }}>{{__('profile.income')}}</option>
                    </select>
                </div>

                <hr>

                <div class="amount">    
                    <h2 class="text-start font-normal">{{__('profile.amount')}}</h2>
                    <input type="number" required name="amount" value="{{ $transaction->amount }}" class="block h-8 border-black border-1 font-normal py-1 px-2 rounded dark:bg-custom-202124 dark:text-white dark:border-white">
                </div>

            </div>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <input value="{{__('profile.save')}}" data-modal-hide="third-modal" type="submit" class="py-2.5 px-5 font-medium rounded text-hover bgC1CFFF bg-slate-900 dark:bg-custom-303134 cursor-pointer dark:text-white dark:border-white">
                <button data-modal-hide="third-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none dark:bg-custom-2d2f37 dark:border-transparent dark:text-white bg-white rounded-lg border text-hover">{{__('profile.cancel')}}</button>
            </div>

        </form>
    </div>
</div>
@endif
<!-- Модальное окно редактирования -->
