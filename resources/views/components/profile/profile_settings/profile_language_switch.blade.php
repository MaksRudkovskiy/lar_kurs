<form action="{{ route('set-language') }}" method="POST">
    @csrf

    <h2 class="text-lg dark:text-white font-medium">
        {{__('profile.choose_language')}}
    </h2>

    <select name="language" class="block dark:bg-custom-202124 py-2 px-6 my-2 border-1 dark:text-white dark:border-white outline-white">
        @foreach (['en' => 'English', 'ru' => 'Русский'] as $locale => $language)
            <option value="{{ $locale }}" {{ Session::get('language') == $locale ? 'selected' : '' }}>
                {{ $language }}
            </option>
        @endforeach
    </select>

    <button class="dark:text-white block bg-custom-EDF1FF dark:bg-custom-303134 px-4 py-2 rounded text-hover dark:hover:text-custom-4D52BC">{{__('profile.change_language')}}</button>
</form>