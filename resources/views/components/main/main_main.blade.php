<h1 class="mt-20 text-center mx-auto dark:text-white text-5xl font-bold c000C35">
    {{__('main.service1')}} <br> {{__('main.service2')}}
</h1>

<h2 class="mt-10 dark:text-white text-center text-lg font-medium">
    {{__('main.fix1')}} <br> {{__('main.fix2')}}
</h2>

<div class="w-3/12 mx-auto flex justify-between mt-10 flex-wrap">

    <div class="flex dark:text-white">
        <img src="{{asset('content/img/Vector.svg')}}" class="max-w-5 min-w-5" alt="">
        <h2 class="font-medium ml-1">{{__('main.automation')}}</h2>
    </div>

    <div class="flex dark:text-white">
        <img src="{{asset('content/img/Vector.svg')}}" class="max-w-5 min-w-5" alt="">
        <h2 class="font-medium ml-1">{{__('main.convenience')}}</h2>
    </div>

    <div class="flex dark:text-white">
        <img src="{{asset('content/img/Vector.svg')}}" class="max-w-5 min-w-5" alt="">
        <h2 class="font-medium ml-1">{{__('main.data_safety')}}</h2>
    </div>

</div>

<img src=" {{ asset('content/img/image 2.png') }}" class="text-center mx-auto mt-16 max-w-3xl dark:hidden" alt="">

<img src=" {{ asset('content/img-dark/image 2.png') }}" class="text-center mx-auto mt-16 max-w-3xl hidden dark:block" alt="">