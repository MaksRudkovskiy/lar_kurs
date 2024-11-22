@extends('layouts.lk')
<!-- Подключение шаблона личного кабинета -->
@section('title')
    Статистика
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')

<!-- Подключение ApexCharts.js -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div class="flex w-full flex-col">
    <div>
        <h2 class="ml-12 mt-12 dark:text-white text-2xl font-semibold">
            {{__('profile.statistics')}}
        </h2>
        <div class="ml-12 mt-2">
            @include('components.profile.profile_stats.period_switch')
        </div>
    </div>
    <div class="flex justify-center w-full gap-2 mt-6 flex-wrap">

        @include('components.profile.profile_stats.User_stats', ['period' => $period]) <!-- Компонент подсчёта пользователей -->

        @include('components.profile.profile_stats.User_stats2', ['period' => $period]) <!-- Компонент подсчёта транзакций -->

        @include('components.profile.profile_stats.User_stats3', ['period' => $period]) <!-- Компонент подсчёта пользовательских категорий -->
        <div class="flex gap-12 mt-6 flex-wrap">
            <div class="bg-white dark:bg-custom-171717 dark:text-white rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-semibold">{{__('profile.transactions_amount_by_month')}}</h3>
                <div id="transactionsChart"></div>
            </div>

            <div class="bg-white dark:bg-custom-171717 dark:text-white rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-semibold">{{__('profile.user_logins')}}</h3>
                <div id="lastLoginChart"></div>
            </div>
        </div>

    </div>
</div>

<script>
    // Данные для графиков
    const transactionByMonth = {!! json_encode($transactionByMonth) !!};
    const lastLoginByDay = {!! json_encode($lastLoginByDay) !!};

    // График количества транзакций по месяцам
    const transactionsChart = new ApexCharts(document.querySelector("#transactionsChart"), {
        chart: {
            type: 'line'
        },
        series: [{
            name: 'Количество транзакций',
            data: transactionByMonth.data
        }],
        xaxis: {
            categories: transactionByMonth.labels
        }
    });
    transactionsChart.render();

    // График последних входов пользователей по дням
    const lastLoginChart = new ApexCharts(document.querySelector("#lastLoginChart"), {
        chart: {
            type: 'line'
        },
        series: [{
            name: 'Последние входы пользователей',
            data: lastLoginByDay.data
        }],
        xaxis: {
            categories: lastLoginByDay.labels
        }
    });
    lastLoginChart.render();
</script>

<!-- <script src="{{asset('js/stats1.js')}}"></script> Этот скрипт явно делает что-то -->

@endsection
<!-- Секция с основным изменяемым содержимым -->