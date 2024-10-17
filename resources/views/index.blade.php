@extends('layouts.app')
<!-- Подключение основного шаблона для главной страницы -->
@section('title')
    Главная
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')

<!-- Экран сайта, приветствующий пользователя -->
<section>
    <article>

        @include('components.main.main_main')
        <!-- Подключение компонента главного экрана веб-приложения -->
    </article>

</section>
<!-- Экран сайта, приветствующий пользователя -->

<!-- Экран сайта с функциональными преимуществами веб-приложения -->
<section>
    <article class="mt-24">

        @include('components.main.main_functional_advantages')
        <!-- Подключение компонента блока с функциональными преимуществами -->

    </article>
</section>
<!-- Экран сайта с функциональными преимуществами веб-приложения -->

<!-- Экран сайта с предлагаемыми возможностями -->
<section>
    <article class="mt-24 ">
        
        @include('components.main.main_offered_opportunities')
        <!-- Подключение компонента блоков с предлагаемыми возомжностями -->

    </article>
</section>
<!-- Экран сайта с предлагаемыми возможностями -->

<!-- Экран сайта с часто задаваемыми вопросами -->
<section>

    <article class="mt-20">

        <div class="w-4/6 mx-auto bgcF8F9FF dark:bg-custom-171717">

            <div class="h-full m-full px-24 py-16 flex justify-between">

                <h1 class="text-5xl dark:text-white font-medium c000C35 w-1/2">
                    {{__('main.faq')}}
                </h1>

                @include('components.main.main_accordion')
                <!-- Подключение компонента аккордиона -->

            </div>

        </div>

    </article>

</section>
<!-- Экран сайта с часто задаваемыми вопросами -->

@endsection
<!-- Секция с основным изменяемым содержимым -->