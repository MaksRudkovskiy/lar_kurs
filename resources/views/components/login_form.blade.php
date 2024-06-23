<form method="POST" action="{{ route('login') }}">
    @csrf
    <div >
        <label for="" class="font-medium">Номер телефона</label>
        <input name="name" type="name" id="name" required class="block w-full h-12 p-3 border-black border-1 rounded-md">
    </div>

    <div class="mt-4">
        <label for="" class="font-medium">Эл.почта</label>
        <input name="email" type="email" id="email" required class="block w-full h-12 p-3 border-black border-1 rounded-md">
    </div>

    <div class="mt-4">
        <label for="" class="font-medium">Пароль</label>
        <input id="password" name="password" type="password" required autocomplete="current-password" class="block w-full p-3 h-12 border-black border-1 rounded-md">
            @error('email')
                <span style="color: red;" class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <input type="submit" value="Войти в акканут" class="bgC1CFFF font-medium h-11 w-full rounded text-hover mt-5 cursor-pointer">

    <div class="flex relative text-center mt-6">

        <div class="got-account text-center mx-auto text-xs">Нет аккаунта?</div>
        <div class="absolute borrtop"></div>

    </div>
</form>