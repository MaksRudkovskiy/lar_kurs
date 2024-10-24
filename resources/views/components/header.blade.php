<header class="w-4/6 mx-auto flex py-2 my-0 bgEDF1FF dark:bg-custom-171717 header-height">
    <div class="my-auto flex w-full justify-between flex-wrap px-20"> 
        <a href="{{ route('index') }}"><img class="block my-auto" src="
        @auth
            @if(Auth::user()->role === 'user')
                {{ asset('content/img/logo.svg') }}
            @else
                {{ asset('content/img/pro.svg') }}
            @endif
        @endauth

        @guest
            {{ asset('content/img/logo.svg') }}
        @endguest
        " alt=""></a> 
        
        <div class="authorize-block font-medium flex items-center justify-between">
            @Auth
                @if(Auth::user()->role === 'user')
                    <a href="{{route('get_pro')}}" class="dark:text-white text-hover hover:text-custom-4D52BC mx-12">
                        {{__('main.get_pro')}}
                    </a>
                @else
                @endif
                <a href="{{ route('profile') }}" class="flex text-hover dark:text-white mx-12"> <img src="{{ asset('content/img/profile.svg') }}" alt=""> 
                    <h2 class="text-base text-center flex items-center">
                        @if(isset(Auth::user()->name))    
                            {{Auth::user()->name}}
                        @else
                            {{__('main.user')}}
                        @endif 
                    </h2>
                </a>
            <a 
                href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><img src="{{asset('content/img/quit.svg')}}"
                class="ml-12"
                title="Выйти" alt="">
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            @else
            <a href="{{ route('register') }}" class="text-hover dark:text-white">{{__('main.register')}}</a>
            <a href="{{ route('login') }}" class="bgC1CFFF dark:bg-custom-303134 dark:text-white font-medium h-11 w-28 rounded text-hover ml-4 text-center p-2">{{__('main.login')}}</a>
            @endAuth
        </div>
    </div>
</header>