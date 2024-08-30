<div class="left-bar pt-5 w-22 flex-col relative bgEDF1FF puk">

    <a href="{{ route('index') }}"><img class="block my-auto" src="content/img/logo.svg" alt=""></a> 

    <a href="{{ route('profile') }}" class="text-hover">
        <img class="block mx-auto pt-8" src="content/img/transaction_img.svg" alt="">
        <h3 class="text-xxs text-center">транзакции</h3>
    </a>

    <a href="{{ route('profile_report') }}" class="text-hover">
        <img class="block mx-auto pt-5" src="content/img/report.svg" alt="">
        <h3 class="text-xxs text-center">Отчёты</h3>
    </a>

    <a href="{{ route('profile_settings') }}" class="text-hover">
        <img class="block mx-auto pt-5" src="content/img/setting_icon.svg" alt="">
        <h3 class="text-xxs text-center">настройки</h3>
    </a>

    <a class="absolute bottom-4 w-full mx-auto pt-5 flex justify-center" 
        href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"
        >
        <img src="content/img/quit.svg" class="block mx-auto" alt="" title="Выйти">
    </a>

</div>