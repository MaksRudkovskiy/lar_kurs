<form method="POST" action="{{ route('login') }}">      
    @csrf
    <div class="mt-4">
        <label for="" class="font-medium">Эл.почта</label>
        <input name="email" type="email" id="email" required class="block w-full h-12 p-3 border-black border-1 dark:border-white rounded-md">
    </div>

    <div class="mt-4">
        <label for="" class="font-medium">Пароль</label>
        <input id="password" name="password" type="password" required autocomplete="current-password" class="block w-full p-3 h-12 dark:border-white border-black border-1 rounded-md">
            @error('email')
                <span style="color: red;" class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <input type="submit" value="Войти в акканут" class="bgC1CFFF dark:bg-custom-303134 font-medium h-11 w-full rounded text-hover mt-5 cursor-pointer">

    <div class="flex relative text-center mt-6">

        <div class="got-account text-center mx-auto text-xs dark:bg-custom-171717">Нет аккаунта?</div>
        <div class="absolute borrtop"></div>

    </div>

    <a
                    href="{{route('yandex')}}"
                    className="w-full gap-1 h-9 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground"
                >
                    Yandex
                </a>
</form>