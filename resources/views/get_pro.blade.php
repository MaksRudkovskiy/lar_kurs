@extends('layouts.app')
<!-- Подключение основного шаблона для главной страницы -->
@section('title')
О Pro
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')

<section class="h-800">
    <article class="w-8/12 block mx-auto dark:text-white px-24">

        <h2 class="mt-6 text-2xl">
            {{__('main.get_pro!')}}
        </h2>

        <div>

            <p class="text-lg mt-6">
                {{__('main.pro_privelegy')}} <br>
                {{__('main.pro_privelegy2')}} <br>
                {{__('main.pro_privelegy3')}} <br>
                {{__('main.pro_privelegy4')}}

            </p>

            <p class="text-lg mt-6">
                {{__('main.about_privelege')}}
            </p>

            <a href="https://zelenka.guru/members/7577931/" class="flex gap-x-3 items-center mt-3">
                <img src="{{asset('content/img/lolz.svg')}}" class="max-w-8">
                Lolzteam
            </a>
            <a href="https://t.me/Bukpus_GangstaJR" class="flex gap-x-3 items-center mt-3">
                <img src="{{asset('content/img/telegram.svg')}}" class="max-w-8">
                Telegram
            </a>

        </div>

    </article>
</section>

@endsection
<!-- Секция с основным изменяемым содержимым -->