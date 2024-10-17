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