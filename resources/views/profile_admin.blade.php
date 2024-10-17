@extends('layouts.lk')
<!-- Подключение шаблона личного кабинета -->
@section('title')
    Админка
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')
    
<div class="py-12 max-w-9xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <h1 class="p-3 font-semibold">Постеры</h1>
            <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal"
                class="text-white bg-black hover:bg-slate-400 focus:ring-4 focus:ring-slate-600 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                Добавить постер
            </button>
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
{{-- Модальное окно --}}
<div style="background-color: rgb(0, 0, 0, 0.4);" id="default-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] h-screen">
    <div class="relative p-4 w-1/2 max-w-9xl max-h-9xl">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Добавление постера
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Закрыт</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4" x-data="{ selectedGenres: [] }">
                <form class="max-w-md mx-auto" method="POST" action=""
                    enctype="multipart/form-data">
                    @csrf
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="name" id="name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-black peer"
                            required />
                        <label for="name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-black peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Название</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Описание</label>
                        <textarea id="description" name="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Введите описание" required></textarea>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="photo">Выберите файл</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            aria-describedby="photo" name="photo" id="photo" type="file" required>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="genres" class="block mb-2 text-sm font-medium text-gray-900">Жанры</label>
                        <div class="flex flex-wrap gap-2">
                            
                                <button type="button" class="bg-gray-200 text-gray-700" class="px-3 py-1 rounded-full transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white"></button>
   
                        </div>
                        <input type="hidden" name="genres" :value="selectedGenres.join(',')">
                    </div>
                    <button type="submit"
                        class="text-white bg-black hover:bg-slate-400 focus:ring-4 focus:outline-none focus:ring-slate-200 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Загрузить</button>
                </form>
            </div>
        </div>
    </div>
</div>















<div class="max-w-screen-2xl w-full h-auto mx-auto my-0 mb-20">
    <div class="flex justify-between pt-20">
        <h1 class="text-3xl font-bold text-gray-900">Пользователи</h1>
    </div>

    <!-- Отображение сообщения об успешном блокировании пользователя -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Отображение сообщения об ошибке -->
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Имя</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Фамилия</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Отчество</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Электронная почта</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Телефон</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Роль</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Действие</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200" x-data="{ showDetails: {} }">
            @if($users->count() > 0)
                @foreach($users as $user)
                    <tr class="border-b border-gray-200">
                        <th
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 text-left text-gray-700 font-bold">
                            {{ $user->id }}
                        </th>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 font-bold">
                            {{ $user->name }}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 font-bold">
                            {{ $user->surname }}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 font-bold">
                            {{ $user->fathername }}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 font-bold">
                            {{ $user->email }}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 font-bold">
                            {{ $user->phone }}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 font-bold">
                            {{ $user->role }}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                            <div class="flex justify-center gap-3">
                                <a href="{{ route('users.edit', $user->id) }}" type="button"
                                    class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">Редактировать</a>
                                <form action="{{ route('users.block', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit"
                                        class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">Заблокировать</button>
                                </form>
                                <button @click="showDetails['{{ $user->id }}'] = !showDetails['{{ $user->id }}']"
                                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                                    Детали
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <div x-show="showDetails['{{ $user->id }}']" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-95"
                                class="mt-4 bg-white p-6 rounded-lg shadow-lg mb-6">
                                <h3 class="text-lg font-bold mb-4">Информация пользователя</h3>
                                <p><strong>Электронная почта:</strong> {{ $user->email }}</p>
                                <p><strong>Телефон:</strong> {{ $user->phone }}</p>
                                <p><strong>Роль:</strong> {{ $user->role }}</p>
                                <p><strong>Telegram:</strong> {{ $user->tg_tag }}</p>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" class="text-center p-4">Пользователи не найдены.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>








<script>
    function submitForm() {
        const form = document.querySelector('form');
        const genresInput = document.querySelector('input[name="genres"]');
        const genresArray = genresInput.value.split(',');
        genresInput.value = JSON.stringify(genresArray);
        form.submit();
    }
</script>



@endsection
<!-- Секция с основным изменяемым содержимым -->