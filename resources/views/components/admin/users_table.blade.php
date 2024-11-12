<div class="max-w-screen-2xl w-full h-auto mx-auto my-0 mb-20">
    <div class="flex justify-between pt-20">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{__('profile.users')}}</h1>
    </div>

    <!-- Строка поиска -->
    <div class="mb-4 dark:text-white">
        <form action="{{ route('admin.search') }}" method="GET" class="flex items-center">
            <input type="text" name="search" class="border border-gray-300 dark:bg-custom-202124 rounded-l px-4 py-2 w-full" placeholder="{{__('profile.search_by')}}">
            <button type="submit" class="bg-custom-4D52BC border border-custom-4D52BC active:border-none text-white rounded-r px-4 py-2">{{__('profile.search')}}</button>
        </form>
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
    <div class="max-h-800 overflow-y-auto scrollbar scrollbar-thumb-custom-EDF1FF">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 dark:bg-custom-202124 text-center">
                <tr class="text-center dark:text-white">
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('profile.id')}}
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('profile.name')}}
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('profile.surname')}}
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('profile.fathername')}}
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('profile.email')}}
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('profile.phone')}}
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('profile.role')}}
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    {{__('profile.actions')}}
                    </th>
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
                                @if( $user->name == null ) {{__('profile.not_stated')}}
                                @else
                                    {{ $user->name }}
                                @endif
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 font-bold">
                                @if( $user->surname == null ) {{__('profile.not_stated')}}
                                @else
                                    {{ $user->surname }}
                                @endif    
                            </td>
                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-lg whitespace-nowrap p-4 font-bold">
                                @if( $user->fathername == null ) {{__('profile.not_stated')}}
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
                                            class=" border cursor-default min-w-44 border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300
                                            font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                                            {{__('profile.admin')}}
                                        </div>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('users.privelege', $user->id) }}" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="text-yellow-700 min-w-44 hover:text-white border border-yellow-700 hover:bg-yellow-800 focus:ring-4
                                            focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                                            @if($user->role!=="privelegious_user")
                                                {{__('profile.privelege')}}
                                            @else
                                                {{__('profile.disprivelege')}}
                                            @endif 
                                        </button>
                                    </form>
                                @endif
                                    <button onclick="toggleDetails('{{ $user->id }}')"
                                        class="text-custom-4D52BC hover:text-white border border-custom-4D52BC hover:bg-custom-4D52BC focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                                            {{__('profile.details')}}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr id="details-{{ $user->id }}" style="display: none;">
                            <td colspan="8">
                                <div class="mt-4 bg-white dark:bg-custom-171717 p-6 dark:text-white rounded-lg shadow-lg mb-6">
                                    <h3 class="text-lg font-bold mb-4">{{__('profile.user_data')}}</h3>
                                    <p><strong>{{__('profile.email')}}:</strong> {{ $user->email }}</p>
                                    <p><strong>{{__('profile.phone')}}:</strong> {{ $user->phone }}</p>
                                    <p><strong>{{__('profile.role')}}:</strong> {{ $user->role }}</p>
                                    <p><strong>{{__('profile.tg_tag2')}}:</strong> 
                                    @if( $user->surname == null ) {{__('profile.not_stated')}}
                                    @else
                                        {{ $user->tg_tag }}
                                    @endif 
                                    <p><strong>{{__('profile.total_transactions')}}:</strong> {{ $user->transactions_count }} </p>
                                </p>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="text-center p-4">{{__('profile.users_not_found')}}.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
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