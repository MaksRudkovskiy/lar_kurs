@extends('layouts.lk')
    @section('title')
        Настройки
    @endsection

@section('content')

@section('content')

<div class="flex">

        <div class="left-bar h-screen w-20 flex-col relative bottom-1 bgEDF1FF">

            <a href="{{ route('profile') }}" class="text-hover">
                <img class="block mx-auto pt-5" src="content/img/transaction_img.svg" alt="">
                <h3 class="text-xxs text-center">транзакции</h3>
            </a>

            <a href="{{ route('profile_settings') }}" class="text-hover">
                <img class="block mx-auto pt-5" src="content/img/setting_icon.svg" alt="">
                <h3 class="text-xxs text-center">Настройки</h3>
            </a>

        </div>

        <form method="POST" action="{{ route('edit_info') }}"  class="profile-wrapper h532 px-28 pt-28 pb-14 mx-auto mt-28 cEDF1FF">
            @csrf
            <div class="flex justify-between">
                <div class="profile-side">

                    <img src="content/img/profile_pic.png" alt="">

                </div>

                <div class="input-side flex flex-wrap">

                    <div class="left-flex flex flex-col justify-between flex-wrap">

                        <div class="ml-32 h-14">
                            <label for="" class="c4D52BC text-xs">Фамилия:</label>
                            <input value="{{ $user->surname }}" name="surname" type="text" class="uniq-input block text-2xl">
                        </div>

                        <div class="ml-32 h-14">
                            <label for="" class="c4D52BC text-xs">Имя:</label>
                            <input value="{{ $user->name }}" name="name" type="text" class="uniq-input block text-2xl">
                        </div>

                        <div class="ml-32 h-14">
                            <label for="" class="c4D52BC text-xs">Отчество:</label>
                            <input value="{{ $user->fathername }}" name="fathername" type="text" class="uniq-input block text-2xl">
                        </div>

                    </div>

                    <div class="right-flex flex flex-col justify-between flex-wrap">

                        <div class="ml-16 h-14">
                            <label for="" class="c4D52BC text-xs">Телефон:</label>
                            <input value="{{ $user->phone }}" name="phone" type="text" class="uniq-input block text-2xl">
                        </div>

                        <div class="ml-16 h-14">
                            <label for="" class="c4D52BC text-xs">Эл.почта:</label>
                            <input value="{{ $user->email }}" name="email" type="text" class="uniq-input block text-2xl">
                        </div>

                        <div class="ml-16 h-14">
                            <label for="" class="c4D52BC text-xs">Телеграмм тэг:</label >
                            <input value="{{ $user->tg_tag }}" name="tg_tag" type="text" class="uniq-input block text-2xl">
                        </div>

                    </div>

                </div>
            </div>

            <div class="mx-auto block">
                <input type="submit" value="Сохранить изменения" class="bgC1CFFF cursor-pointer block mx-auto mt-24 font-medium h-11 px-20 rounded text-hover"> 
            </div>

        </form>

    </div>

    @endsection