@extends('layouts.app')
@section('title')
    Главная
@endsection

@section('content')

<section>
    <article>

        <h1 class="mt-20 text-center mx-auto text-5xl font-bold c000C35">
            Сервис управления финансами <br> для вашего удобства
        </h1>

        <h2 class="mt-10 text-center text-lg font-medium">
            Фиксируйте свои расходы, держите под рукой все записи своих транзакций <br>
            и принимайте решения на основе цифр
        </h2>

        <div class="w-3/12 mx-auto flex justify-between mt-10 flex-wrap">

            <div class="flex ">
                <img src="{{asset('content/img/Vector.svg')}}" class="max-w-5 min-w-5" alt="">
                <h2 class="font-medium ml-1">Автоматизация</h2>
            </div>

            <div class="flex ">
                <img src="{{asset('content/img/Vector.svg')}}" class="max-w-5 min-w-5" alt="">
                <h2 class="font-medium ml-1">Удобство</h2>
            </div>

            <div class="flex ">
                <img src="{{asset('content/img/Vector.svg')}}" class="max-w-5 min-w-5" alt="">
                <h2 class="font-medium ml-1">Безопасность данных</h2>
            </div>



        </div>

        <img src=" {{ asset('content/img/image 2.png') }}" class="text-center mx-auto mt-16" alt="">

    </article>

</section>

<section>
    <article class="mt-24">

        <h1 class="text-2xl text-center font-medium">
            Всё <span class=" c4D52BC">необходимое</span> для управления личными финансами уже доступно для вас
        </h1>

        <h2 class="text-center text-xl mt-4 font-medium">
            Новый пользовательский опыт, лаконичная и полезная панель управления, а также <br>
            инновационные виды… которые помогут вам быть в курсе своих финансов.
        </h2>

        <div class="flex w-7/12 mt-20 mx-auto flex-wrap">

            <div class="flex flex-col w-1/2 justify-between">

                <div class="features-block pl-6 h-1/5">
                    <h2 class="font-medium text-xl">
                        Управляйте средствами
                    </h2>
                    <h3 class="font-normal mt-3 text-sm max-w-64">
                    Ведите учёт своих доходов и расходов
                    в удобном интерфейсе
                    </h3>
                </div>
                <div class="features-block pl-6 h-1/5">
                    <h2 class="font-medium text-xl">
                        Безопасность данных
                    </h2>
                    <h3 class="font-normal mt-3 text-sm max-w-64">
                        Надежные методы шифрования и хэширования
                        не позволят войти в вашу учётную запись злоумышленникам 
                    </h3>
                </div>
                <div class="features-block pl-6 h-1/5">
                    <h2 class="font-medium text-xl">
                        Удобство
                    </h2>
                    <h3 class="font-normal mt-3 text-sm max-w-64">
                        Отсутствие лишних функций и только самое необходимое
                        для вашего учёта личных финансов
                    </h3>
                </div>
                <div class="features-block pl-6 h-1/5">
                    <h2 class="font-medium text-xl">
                        Стиль
                    </h2>
                    <h3 class="font-normal mt-3 text-sm max-w-64">
                        Разработанный дизайн поможет вам легко ориентироваться
                        в архитектуре приложения. Зарегистрируйтесь сейчас!
                    </h3>
                </div>

            </div>
            <div class="">
                <img src="{{asset('content/img/money_bg.png')}}" alt="">
            </div>

        </div>

    </article>
</section>

<section>
    <article class="mt-24 ">
        <div class="w-7/12 mx-auto">

            <h2 class="font-medium text-2xl">
                Предлагаемые <span class="c4D52BC">возможности</span>
            </h2>

            <div class="flex justify-between flex-wrap">

                <div class="px-6 mt-6 min-w-80 w-31p cEDF1FF py-16 mx-auto">
                    <h2 class="text-lg font-medium">
                        Занесение всех транзакций в ленту и удобное отслеживание каждой из них
                    </h2>

                </div>

                <div class="px-6 mt-6 min-w-80 w-31p cEDF1FF py-16 mx-auto">
                    <h2 class="text-lg font-medium">
                        Наличие гибкой настройки для каждой вашей транзакции в онлайн банке или с помощью наличных
                    </h2>

                </div>

                <div class="px-6 mt-6 min-w-80 w-31p cEDF1FF py-16 mx-auto">
                    <h2 class="text-lg font-medium">
                        И отсутствие чего-либо лишнего
                    </h2>

                </div>

            </div>

        </div>


    </article>
</section>

<section>

    <article class="mt-20">

        <div class="w-4/6 mx-auto bgcF8F9FF">

            <div class="h-full m-full px-24 py-16 flex justify-between">

                <h1 class="text-5xl font-medium c000C35 w-1/2">
                    Часто <br> задаваемые <br> вопросы
                </h1>

                <div id="accordion-collapse" data-accordion="collapse" class="flex flex-col w-1/2 justify-between">

                    <div class="px-6 bgcC1CFFF w-full mt-3">
                        <h2 id="accordion-collapse-heading-1 w-full" class="">
                            <button type="button" class="flex justify-between w-full pt-6 pb-6" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                                <span class="font-medium text-lg">Возможна ли интеграция с банком?</span>
                                <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-1" class="hidden pb-6" aria-labelledby="accordion-collapse-heading-1">
                            Нет, веб-приложение создано с целью того, чтобы люди сами заполняли свои транзакции. Это сделано как и для того, чтобы люди оценивали свои
                            траты при заполнении, так и из-за того, что на данный момент это невозможно с данным уровнем узнаваемости веб-приложения.
                        </div>
                    </div>

                    <div class="px-6 bgcC1CFFF w-full mt-3">
                        <h2 id="accordion-collapse-heading-2 w-full">
                            <button type="button" class="flex justify-between w-full pt-6 pb-6" data-accordion-target="#accordion-collapse-body-2" aria-expanded="true" aria-controls="accordion-collapse-body-2">
                                <span class="font-medium text-lg">Почему я не могу редактировать свои транзакции?</span>
                                <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-2" class="hidden pb-6" aria-labelledby="accordion-collapse-heading-1">
                            Это не предусмотрено ввиду отсутствия какого-либо смысла в этом. Вы можете просто удалить старую транзакцию и добавить такую же, но с другими данными
                        </div>
                    </div>

                    <div class="px-6 bgcC1CFFF w-full mt-3">
                        <h2 id="accordion-collapse-heading-3 w-full">
                            <button type="button" class="flex justify-between w-full pt-6 pb-6" data-accordion-target="#accordion-collapse-body-3" aria-expanded="true" aria-controls="accordion-collapse-body-3">
                                <span class="font-medium text-lg">Для чего мне столько инпутов в профиле?</span>
                                <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-3" class="hidden pb-6" aria-labelledby="accordion-collapse-heading-1">
                            При необходимости вам на ваши контакты будут отправляться рассылки с <span class="c4D52BC">полезным</span> содержимым, а ваше имя нужно для оображения на сайте и для обращения к вам
                        </div>
                    </div>

                </div>

                

                

            </div>

        </div>

    </article>

</section>

@endsection