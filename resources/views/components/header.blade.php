<header class="w-4/6 mx-auto flex py-2 my-0 bgEDF1FF dark:bg-custom-171717 header-height">
    <div class="my-auto flex w-full justify-between flex-wrap px-20"> 
        <a href="{{ route('index') }}"><img class="block my-auto" src="{{asset('content/img/logo.svg')}}" alt=""></a> 
        
        <div class="authorize-block font-medium flex items-center justify-between w-60">
            @Auth
                <a href="{{ route('profile') }}" class="flex text-hover dark:text-white"> <img src="{{ asset('content/img/profile.svg') }}" alt=""> 
                <h2 class="ml-1 text-base">
                    @if(isset(Auth::user()->name))    
                        {{Auth::user()->name}}
                    @else
                        {{__('main.user')}}
                    @endif </h2>
            </a>
            <a 
                href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><img src="{{asset('content/img/quit.svg')}}" title="Выйти" alt="">
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            @else
            <a href="{{ route('register') }}" class="text-hover dark:text-white">{{__('main.register')}}</a>
            <a href="{{ route('login') }}" class="bgC1CFFF dark:bg-custom-303134 dark:text-white font-medium h-11 w-28 rounded text-hover text-center p-2">{{__('main.login')}}</a>
            @endAuth
        </div>
    </div>
</header>