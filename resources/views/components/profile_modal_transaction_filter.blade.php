<!-- Модальное окно -->
<div id="second-modal" tabindex="-1" aria-hidden="true" class="hidden bg-dark overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-screen max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <form class="relative bg-white rounded-lg shadow " method="GET" action="{{ route('filter') }}">
            @csrf
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-">
                <h3 class="text-xl font-semibold text-gray-9">
                    Фильтр транзакций
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="second-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">

                <div class="category">
                    <h2>Выберите категорию транзакции:</h2>
                    <select name="category" required class="text-black block h-8 bor-b-bottom">
                        <option value="all">Все транзакции</option>
                        <option value="1">Транспорт</option>
                        <option value="2">Продукты</option>
                        <option value="3">Здоровье</option>
                        <option value="4">Переводы</option>
                        <option value="5">Игры</option>
                        <option value="6">Развлечения</option>
                        <option value="7">Такси</option>
                        <option value="8">Спорт</option>
                        <option value="9">Красота</option>
                        <option value="10">Топливо</option>
                        <option value="11">ЖКХ</option>
                        <option value="12">Прочее</option>
                    </select>
                </div>  

            </div>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <input value="Отфильтровать" data-modal-hide="default-modal" type="submit" class="py-2.5 px-5 font-medium rounded text-hover bgC1CFFF bg-slate-900">
                <button data-modal-hide="second-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border text-hover">Отмена</button>
            </div>

        </form>
    </div>
</div>
<!-- Модальное окно -->