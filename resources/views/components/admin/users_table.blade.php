<div class="max-w-screen-2xl w-full h-auto mx-auto my-0 mb-20">
    <div class="flex justify-between pt-20">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Пользователи</h1>
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
        <thead class="bg-gray-50 dark:bg-custom-202124 text-center">
            <tr class="text-center dark:text-white">
                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID</th>
                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Имя</th>
                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Фамилия</th>
                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Отчество</th>
                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Электронная почта</th>
                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Телефон</th>
                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Роль</th>
                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Действие</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-custom-202124" x-data="{ showDetails: {} }">
            @if($users->count() > 0)
                @foreach($users as $user)
                    <tr class="border-b border-gray-200 dark:text-white text-center">
                        <th
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 font-bold">
                            {{ $user->id }}
                        </th>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 font-bold">
                            @if( $user->name == null ) Не указано 
                            @else
                                {{ $user->name }}
                            @endif
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 font-bold">
                            @if( $user->surname == null ) Не указано 
                            @else
                                {{ $user->surname }}
                            @endif    
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 font-bold">
                            @if( $user->fathername == null ) Не указано 
                            @else
                                {{ $user->fathername }}
                            @endif 
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
                        <td class="border-t-0 px-6 border-l-0 border-r-0 text-lg whitespace-nowrap p-4">
                            <div class="flex justify-center gap-3">
                            @if($user->role=="admin")
                                <form method="POST" action="{{ route('users.privelege', $user->id) }}" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <div
                                        class=" border border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300
                                        font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                                        Админ
                                    </div>
                                </form>
                            @else
                                <form method="POST" action="{{ route('users.privelege', $user->id) }}" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="text-yellow-700 hover:text-white border border-yellow-700 hover:bg-yellow-800 focus:ring-4
                                        focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                                        @if($user->role!=="privelegious_user")
                                            Привелегировать
                                        @else
                                            Депривелегировать
                                        @endif 
                                    </button>
                                </form>
                            @endif
                                <button onclick="toggleDetails('{{ $user->id }}')"
                                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                                    Детали
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr id="details-{{ $user->id }}" style="display: none;">
                        <td colspan="8">
                            <div class="mt-4 bg-white dark:bg-custom-171717 p-6 dark:text-white rounded-lg shadow-lg mb-6">
                                <h3 class="text-lg font-bold mb-4">Информация пользователя</h3>
                                <p><strong>Электронная почта:</strong> {{ $user->email }}</p>
                                <p><strong>Телефон:</strong> {{ $user->phone }}</p>
                                <p><strong>Роль:</strong> {{ $user->role }}</p>
                                <p><strong>Telegram:</strong> 
                                @if( $user->surname == null ) Не указано 
                                @else
                                    {{ $user->tg_tag }}
                                @endif 
                            </p>
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
    // Функция для переключения видимости блока с деталями
    function toggleDetails(userId) {
        const detailsRow = document.getElementById('details-' + userId);
        if (detailsRow.style.display === 'none') {
            detailsRow.style.display = 'table-row'; // Показать детали
        } else {
            detailsRow.style.display = 'none'; // Скрыть детали
        }
    }
</script>