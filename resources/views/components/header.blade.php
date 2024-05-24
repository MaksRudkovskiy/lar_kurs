<header class="w-4/6 mx-auto flex align-middle my-0 bgEDF1FF header-height">

        <div class="my-auto flex w-full"> 
            <a href="{{ route('index') }}"><img class="ml-20 block my-auto" src="{{asset('content/img/logo.svg')}}" alt=""></a> 

            <nav class="w-4/12 flex justify-between items-center ml-20">
                <a class="font-medium text-hover" href="">Мануал</a>
                <a class="font-medium text-hover" href="">Возможности</a>
                <a class="font-medium text-hover" href="">ЧАВО</a>
            </nav>
            
            <div class="authorize-block font-medium flex items-center justify-between w-60 ml-80">
                @Auth
                    <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
                    <a 
                    href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><img src="{{asset('content/img/quit.svg')}}" alt="">
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                @else
                <a href="{{ route('register') }}" class="text-hover">Регистрация</a>
                <a href="{{ route('login') }}" class="bgC1CFFF font-medium h-11 w-28 rounded text-hover text-center p-2">
                   Вход
                </a>
                @endAuth
            </div>
        </div>

    </header>