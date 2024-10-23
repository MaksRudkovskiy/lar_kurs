<div class="flex w-full gap-x-8">

    <div>
        <div class="bg-white dark:bg-custom-202124 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-gray-900">
                <h1 class="mb-3 font-semibold text-lg dark:text-white block">{{__('profile.custom_categories')}}</h1>
                @if($custom_cat_count >= 12)
                    <div
                        class="dark:text-white block max-w-48 bg-custom-EDF1FF dark:bg-custom-303134 px-4 py-2 rounded">
                        {{__('profile.add_cat')}}
                    </div>
                @else
                    <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal"
                        class="dark:text-white block max-w-48 bg-custom-EDF1FF dark:bg-custom-303134 px-4 py-2 rounded text-hover dark:hover:text-custom-4D52BC  ">
                        {{__('profile.add_cat')}}
                    </button>
                @endif
                

                <p class="text-white">Категорий {{$custom_cat_count}} из 12</p>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
    @if($custom_cat_count == 0)
    @else
    <div class="custom_categories_table max-h-80 overflow-x-hidden scrollbar scrollbar-thumb-custom-EDF1FF overflow-y-auto">
        <table class="w-full ml-8 min-w-600">
            <thead class="text-white dark:bg-custom-171717">
                <tr class="flex">
                    <th class="w-1/3 px-4 py-4 text-center">Категория</th>
                    <th class="w-1/3 px-4 py-4 text-center">Иконка</th>
                    <th class="w-1/3 px-4 py-4 text-center">Действия</th>
                </tr>
            </thead>
            <tbody class="text-white">
                @foreach($custom_categories as $custom_category)
                <tr class="flex">
                    <td class="w-1/3 px-4 py-4 text-center">{{ $custom_category->custom_category_name }}</td>
                    <td class="w-1/3 px-4 py-4 text-center">
                        <svg class="max-w-8 max-h-8 block mx-auto" title="">
                            {!! $custom_category->icon !!}
                        </svg>
                    </td>
                    <td class="w-1/3 px-4 py-4 text-center">
                        <a class="block dark:hidden mx-auto cursor-pointer" title="{{__('profile.delete')}}" href="{{route('DeleteCategory', ['id'=>$custom_category->id])}}">
                            <img src="content/img/delete.svg" class="block mx-auto" alt="">
                        </a>
                        <a class="hidden dark:block mx-auto cursor-pointer" title="{{__('profile.delete')}}" href="{{route('DeleteCategory', ['id'=>$custom_category->id])}}">
                            <img src="content/img-dark/delete.svg" class="block mx-auto" alt="">
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

</div>



{{-- Модальное окно --}}
<div id="default-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto bg-dark overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0">
    <div class="relative p-4 w-1/2 max-w-2xl max-h-9xl">
        <!-- Modal content -->
        <div class="relative dark:bg-custom-202124 bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl dark:text-white font-semibold">
                    {{__('profile.add_cat')}}
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Закрыть</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4" x-data="{ selectedGenres: [] }">
                <form class="px-4 dark:text-white w-full" method="POST" action="{{route('new_category')}}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="amount">
                        <h2>{{__('profile.category_name')}}</h2>

                        <input type="text" required name="custom_category_name" class="block h-8 border-black border-1 py-1 px-2 rounded dark:bg-custom-202124 dark:text-white dark:border-white">

                    </div>

                    <div class="relative z-0 w-full my-5">
                        <label class="" for="photo">Выберите файл</label>
                        <p class="text-xs">Максимальный размер 64x64</p>
                        <input
                            class="block w-full text-sm dark:text-white rounded-lg cursor-pointer"
                            aria-describedby="photo" name="icon" id="photo" type="file" required>
                    </div>

                    <hr>

                    <div class="flex items-center py-4 border-gray-200 rounded-b">
                        <input value="{{__('profile.add')}}" data-modal-hide="default-modal" type="submit" class="py-2.5 px-5 font-medium rounded text-hover bgC1CFFF bg-slate-900 dark:bg-custom-303134 cursor-pointer dark:text-white dark:border-white">
                        <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none dark:bg-custom-2d2f37 dark:border-transparent dark:text-white bg-white rounded-lg border text-hover">{{__('profile.cancel')}}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<hr class="my-4">