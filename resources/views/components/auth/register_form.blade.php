<form method="POST" action="{{ route('register') }}">
    @csrf
    <div >
        <label for="" class="font-medium dark:text-white ">Номер телефона</label>
        <input name="tel" type="tel" id="tel" minlength="11" maxlength="11" required class="block w-full h-12 p-3 dark:bg-custom-171717 dark:text-white dark:border-white border-black border-1 rounded-md">
        @error('tel')
            <span class="invalid-feedback" style="color: red;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mt-4">
        <label for="" class="font-medium dark:text-white">Эл.почта</label>
        <input name="email" type="email" id="email" required class="block w-full h-12 p-3 dark:text-white dark:bg-custom-171717 dark:border-white border-black border-1 rounded-md">
        @error('email')
            <span class="invalid-feedback" style="color: red;" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mt-4">
        <label for="" class="font-medium dark:text-white">Пароль</label>
        <input id="password" name="password" type="password" required autocomplete="current-password" class="block w-full p-3 dark:text-white dark:bg-transparent dark:bg-custom-202124 dark:border-white h-12 border-black border-1 rounded-md">
            @error('password')
                <span class="invalid-feedback" style="color: red;" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <input type="submit" value="Регистрация" class="bgC1CFFF dark:bg-custom-303134 dark:text-white font-medium h-11 w-full rounded text-hover mt-5 cursor-pointer">

    <a
    href="{{route('yandex')}}"
    class="w-full gap-1 mt-4 text-hover dark:text-white hover:text-custom-4D52BC hover:border-border-4D52BC h-11 inline-flex items-center justify-center whitespace-nowrap rounded-md font-medium transition-colors
    focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input shadow-sm">
    Yandex
    </a>

    <div class="flex relative text-center mt-6">

        <div class="got-account text-center mx-auto text-xs dark:text-white dark:bg-custom-202124">Есть аккаунт?</div>
        <div class="absolute borrtop"></div>

    </div>
</form>