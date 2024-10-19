<footer class="mt-14 w-4/6 mx-auto flex align-middle dark:bg-custom-171717 my-0 bgEDF1FF py-2 header-height">
    <div class="my-auto flex w-full justify-between flex-wrap px-20"> 
        <img src="
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
        " >

        <p class="authorize-block font-medium dark:text-white flex items-center justify-between">

            Financio.ru 2024-2024

        </p>
    </div>
</footer>