<!-- Модальное окно -->
<div id="second-modal" tabindex="-1" aria-hidden="true" class="hidden bg-dark overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-screen max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <form class="relative bg-white rounded-lg shadow dark:bg-custom-202124 dark:text-white" method="GET" action="{{ route('filter') }}" onsubmit="clearFilterCategories()">
            @csrf
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-">
                <h3 class="text-xl font-semibold text-gray-9">
                    {{__('profile.trans_filter')}}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="second-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                @if($user->role == 'user')
                <div class="category">
                    <h2>{{__('profile.choose_cat')}}:</h2>
                    <select name="category" required class="text-black block h-8 bor-b-bottom dark:bg-custom-202124 dark:text-white dark:border-white">
                        <option value="all">{{__('profile.all_trans')}}</option>
                        <option value="1" selected>{{__('profile.transport')}}</option>
                        <option value="2">{{__('profile.groceries')}}</option>
                        <option value="3">{{__('profile.health')}}</option>
                        <option value="4">{{__('profile.transfer')}}</option>
                        <option value="5">{{__('profile.games')}}</option>
                        <option value="6">{{__('profile.entertainment')}}</option>
                        <option value="7">{{__('profile.taxi')}}</option>
                        <option value="8">{{__('profile.sport')}}</option>
                        <option value="9">{{__('profile.beauty')}}</option>
                        <option value="10">{{__('profile.fuel')}}</option>
                        <option value="11">{{__('profile.house')}}</option>
                        <option value="12">{{__('profile.other')}}</option>
                    </select>
                </div>
                @else

                    @if(count($customCat) == 0)
                        <div class="category">
                            <h2>{{__('profile.choose_cat')}}:</h2>
                            <select name="category" required class="text-black block h-8 bor-b-bottom dark:bg-custom-202124 dark:text-white dark:border-white">
                                <option value="all">{{__('profile.all_trans')}}</option>
                                <option value="1" selected>{{__('profile.transport')}}</option>
                                <option value="2">{{__('profile.groceries')}}</option>
                                <option value="3">{{__('profile.health')}}</option>
                                <option value="4">{{__('profile.transfer')}}</option>
                                <option value="5">{{__('profile.games')}}</option>
                                <option value="6">{{__('profile.entertainment')}}</option>
                                <option value="7">{{__('profile.taxi')}}</option>
                                <option value="8">{{__('profile.sport')}}</option>
                                <option value="9">{{__('profile.beauty')}}</option>
                                <option value="10">{{__('profile.fuel')}}</option>
                                <option value="11">{{__('profile.house')}}</option>
                                <option value="12">{{__('profile.other')}}</option>
                            </select>
                        </div>
                    @else
                    <div class="flex flex-col">

                        <label for="mem" class="flex items-center text-center">
                            <p>{{__('profile.system')}}</p>
                            <input type="radio" id="system-filter" name="mem" checked class="cursor-pointer" onclick="toggleSelect('filter')">
                        </label>

                        <label for="mem" class="flex items-center text-center">
                            <p>{{__('profile.custom')}}</p>
                            <input type="radio" id="custom-filter" name="mem" class="cursor-pointer" onclick="toggleSelect('filter')">
                        </label>


                        <select name="category" id="system-select-filter" class="hidden text-black h-8 bor-b-bottom dark:bg-custom-202124 dark:text-white dark:border-white" data-system-category>
                            <option value="all">{{__('profile.all_trans')}}</option>    
                            <option value="1" selected>{{__('profile.transport')}}</option>
                            <option value="2">{{__('profile.groceries')}}</option>
                            <option value="3">{{__('profile.health')}}</option>
                            <option value="4">{{__('profile.transfer')}}</option>
                            <option value="5">{{__('profile.games')}}</option>
                            <option value="6">{{__('profile.entertainment')}}</option>
                            <option value="7">{{__('profile.taxi')}}</option>
                            <option value="8">{{__('profile.sport')}}</option>
                            <option value="9">{{__('profile.beauty')}}</option>
                            <option value="10">{{__('profile.fuel')}}</option>
                            <option value="11">{{__('profile.house')}}</option>
                            <option value="12">{{__('profile.other')}}</option>
                        </select>

                        <select name="custom_category" id="custom-select-filter" class="hidden text-black h-8 bor-b-bottom dark:bg-custom-202124 dark:text-white dark:border-white" data-custom-category>
                                @foreach($customCat as $cat)
                                    
                                    <option value="{{ $cat -> id }}">{{$cat->custom_category_name}}</option>

                                @endforeach
                        </select>
                    </div>
                    @endif
                @endif
            </div>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <input value="{{__('profile.filter')}}" data-modal-hide="default-modal" type="submit" class="py-2.5 cursor-pointer dark:bg-custom-303134 px-5 font-medium rounded text-hover bgC1CFFF bg-slate-900">
                <button data-modal-hide="second-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium dark:bg-custom-2d2f37 dark:text-white dark:border-transparent text-gray-900 focus:outline-none bg-white rounded-lg border text-hover">{{__('profile.cancel')}}</button>
            </div>

        </form>
    </div>
</div>
<!-- Модальное окно -->