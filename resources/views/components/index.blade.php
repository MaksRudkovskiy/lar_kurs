@extends('layouts.app')


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

        <div class="w-3/12 mx-auto flex justify-between mt-10">

            <div class="flex ">
                <img src="{{asset('content/img/Vector.svg')}}" alt="">
                <h2 class="font-medium ml-1">Автоматизация</h2>
            </div>

            <div class="flex ">
                <img src="{{asset('content/img/Vector.svg')}}" alt="">
                <h2 class="font-medium ml-1">Удобство</h2>
            </div>

            <div class="flex ">
                <img src="{{asset('content/img/Vector.svg')}}" alt="">
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

        <div class="flex w-7/12 mt-20 mx-auto">

            <div class="flex flex-col w-1/2 justify-between">

                <div class="features-block pl-6 h-1/5">
                    <h2 class="font-medium text-xl">
                        Сэкономьте средства
                    </h2>
                    <h3 class="font-medium text-sm">
                        текст
                    </h3>
                </div>
                <div class="features-block pl-6 h-1/5">
                    <h2 class="font-medium text-xl">
                        Сэкономьте средства
                    </h2>
                    <h3 class="font-medium text-sm">
                        текст
                    </h3>
                </div>
                <div class="features-block pl-6 h-1/5">
                    <h2 class="font-medium text-xl">
                        Сэкономьте средства
                    </h2>
                    <h3 class="font-medium text-sm">
                        текст
                    </h3>
                </div>
                <div class="features-block pl-6 h-1/5">
                    <h2 class="font-medium text-xl">
                        Сэкономьте средства
                    </h2>
                    <h3 class="font-medium text-sm">
                        текст
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
                Что думают о нас <span class="c4D52BC">пользователи</span>
            </h2>

            <div class="flex justify-between mt-6">

                <div class="h-80 w-31p cEDF1FF">
                    <h2 class="mt-24 pl-6 text-lg font-medium">
                        Комментарий пользователя
                    </h2>
                    <p class="mt-28 pl-6 text-lg font-medium">
                        имя
                    </p>
                </div>
                <div class="h-80 w-31p cEDF1FF">
                    <h2 class="mt-24 pl-6 text-lg font-medium">
                        Комментарий пользователя
                    </h2>
                    <p class="mt-28 pl-6 text-lg font-medium">
                        имя
                    </p>
                </div>
                <div class="h-80 w-31p cEDF1FF">
                    <h2 class="mt-24 pl-6 text-lg font-medium">
                        Комментарий пользователя
                    </h2>
                    <p class="mt-28 pl-6 text-lg font-medium">
                        имя
                    </p>
                </div>

            </div>

        </div>


    </article>
</section>

<section>

    <article class="mt-20">

        <div class="w-4/6 mx-auto h452 bgcF8F9FF">

            <div class="h-full m-full px-24 py-16 flex justify-between">

                <h1 class="text-5xl font-medium c000C35 w-1/2">
                    Часто <br> задаваемые <br> вопросы
                </h1>

                <div class="flex flex-col w-1/2 justify-between">

                    <div class="px-6 py-8 bgcC1CFFF">
                        <div class="flex justify-between">
                            <h3 class="font-medium text-lg">
                                Вопрос
                            </h3>

                            <img src="{{asset('content/img/galka.svg')}}" class="cursor-pointer" alt="">
                        </div>
                    </div>
                    <div class="px-6 py-8 bgcC1CFFF">
                        <div class="flex justify-between">
                            <h3 class="font-medium text-lg">
                                Вопрос
                            </h3>

                            <img src=" {{asset('content/img/galka.svg')}}" class="cursor-pointer" alt="">
                        </div>
                    </div>
                    <div class="px-6 py-8 bgcC1CFFF">
                        <div class="flex justify-between">
                            <h3 class="font-medium text-lg">
                                Вопрос
                            </h3>

                            <img src="{{asset('content/img/galka.svg')}}" class="cursor-pointer" alt="">
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </article>

</section>

@endsection