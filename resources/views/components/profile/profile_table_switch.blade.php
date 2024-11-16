<h2 class="text-lg dark:text-white font-medium">
    {{__('profile.transaction_table_look')}}
</h2>   

<form action="{{ route('set-type') }}" method="POST">
    @csrf
    <select name="type" class="block dark:bg-custom-202124 py-2 px-6 my-2 border-1 dark:text-white dark:border-white outline-white">
        @foreach (['alternative' => __('profile.old'), 'default' => __('profile.new')] as $type => $table_type)
            <option value="{{ $type }}" {{ Session::get('table_type') == $type ? 'selected' : '' }}>
                {{ $table_type }}
            </option>
        @endforeach
    </select>

    <button class="dark:text-white block bg-custom-EDF1FF dark:bg-custom-303134 px-4 py-2 rounded text-hover dark:hover:text-custom-4D52BC">{{__('profile.change_look')}}</button>
</form>