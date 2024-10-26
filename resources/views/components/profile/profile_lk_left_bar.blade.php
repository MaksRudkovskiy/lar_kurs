<div class="left-bar dark:bg-c171717 pt-5 w-22 flex-col relative bgEDF1FF puk">

    <a href="{{ route('index') }}"><img class="block mx-auto my-auto" src="
        @if(Auth::user()->role === 'user')
            {{ asset('content/img/logo.svg') }}
        @else
            {{ asset('content/img/pro.svg') }}
        @endif
    " alt=""></a> 
    <div class="conjoined-block mt-4 flex flex-col">
        <a href="{{ route('profile') }}" class="dark:text-white text-hover mx-4 hover:text-custom-4D52BC dark:hover:text-custom-4D52BC">
            <img class="block mx-auto pt-5 max-w-8" src="{{ asset('content/img/transaction_img.svg') }}" alt="">
            <h3 class="text-xxs text-center">{{__('profile.transactions')}}</h3>
        </a>

        <a href="{{ route('profile_report') }}" class="dark:text-white text-hover mx-4 hover:text-custom-4D52BC dark:hover:text-custom-4D52BC">
            <img class="block mx-auto pt-5 max-w-8" src="{{ asset('content/img/report.svg') }}" alt="">
            <h3 class="text-xxs text-center">{{__('profile.reports')}}</h3>
        </a>

        <a href="{{ route('profile_settings') }}" class="dark:text-white text-hover mx-4 hover:text-custom-4D52BC dark:hover:text-custom-4D52BC">
            <img class="block mx-auto pt-5 max-w-8" src="{{ asset('content/img/profile.svg') }}" alt="">
            <h3 class="text-xxs text-center">{{__('profile.profile')}}</h3>
        </a>

        <a href="{{ route('profile_personalisation') }}" class="dark:text-white text-hover mx-4 hover:text-custom-4D52BC dark:hover:text-custom-4D52BC">
            <img class="block mx-auto pt-5 max-w-8" src="{{ asset('content/img/settings.svg') }}" alt="">
            <h3 class="text-xxs text-center">{{__('profile.settings')}}</h3>
        </a>
        @if (Auth::User()->role=='admin')
        <a href="{{ route('profile_admin') }}" class="dark:text-white text-hover mx-4 hover:text-custom-4D52BC dark:hover:text-custom-4D52BC">
            <img class="block mx-auto pt-5 max-w-8" src="{{ asset('content/img/admin.svg') }}" alt="">
            <h3 class="text-xxs text-center">{{__('profile.admin')}}</h3>
        </a>
        @endif

    </div>

    <a class="logout-button absolute bottom-12 w-full mx-auto pt-5 flex justify-center" 
        href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"
        >
        <img src="{{asset('content/img/quit.svg') }}" class="block mx-auto logout-img" alt="" title="Выйти">
    </a>

</div>