<div class="w-full">


@if(Auth::user()->role=='admin')
<form method="POST" action="{{ route('edit_info') }}"  class="profile-wrapper max-w-1516 h532 px-28 pt-28 pb-14 mx-auto mt-28 cEDF1FF dark:bg-custom-171717">
<div class="flex justify-between flex-wrap">
    @csrf
    <div class="profile-side dark:hidden">

        <img src="content/img/profile_pic.png" alt="">

    </div>

    <div class="input-side flex flex-wrap dark:mx-auto">

        <div class="left-flex ml-32 dark:ml-0 flex flex-col justify-between flex-wrap dark:text-white">

            <div class="h-14">
                <label for="" class="c4D52BC text-xs">{{__('profile.surname')}}:</label>
                <div class="uniq-input block text-2xl">{{$user->surname}}</div>
            </div>

            <div class="h-14">
                <label for="" class="c4D52BC text-xs">{{__('profile.name')}}:</label>
                <div class="uniq-input block text-2xl">{{ $user->name }}</div>
            </div>

            <div class="h-14">
                <label for="" class="c4D52BC text-xs">{{__('profile.fathername')}}:</label>
                <div class="uniq-input block text-2xl">{{ $user->fathername }}</div>
            </div>

        </div>

        <div class="right-flex ml-16 dark:ml-8 flex flex-col justify-between flex-wrap dark:text-white">

            <div class="h-14">
                <label for="" class="c4D52BC text-xs">{{__('profile.phone')}}:</label>
                <div class="uniq-input block text-2xl">{{ $user->phone }}</div>
            </div>

            <div class="h-14">
                <label for="" class="c4D52BC text-xs">{{__('profile.email')}}:</label>
                <div class="uniq-input block text-2xl">{{ $user->email }}</div>
            </div>

            <div class="h-14">
                <label for="" class="c4D52BC text-xs">{{__('profile.tg_tag')}}:</label >
                <div class="uniq-input block text-2xl">{{ $user->tg_tag }}</div>
            </div>

        </div>

    </div>
</div>
</form>
@elseif($user->is_yandex == 1)
<form method="POST" action="{{ route('edit_info_yandex') }}"  class="profile-wrapper max-w-1516 h532 px-28 pt-28 pb-14 mx-auto mt-28 cEDF1FF dark:bg-custom-171717">
    <h2 class="text-center py-2 text-lg dark:text-white">Аутентификация через Яндекс</h2>
<div class="flex justify-between flex-wrap">
    @csrf
    <div class="profile-side dark:hidden">

        <img src="content/img/profile_pic.png" alt="">

    </div>

    <div class="input-side flex flex-wrap dark:mx-auto">

        <div class="left-flex ml-32 dark:ml-0 flex flex-col justify-between flex-wrap dark:text-white">

            <div class="h-14">
                <label for="" class="c4D52BC text-xs">{{__('profile.surname')}}:</label>
                <div class="uniq-input block text-2xl">{{$user->surname}}</div>
            </div>

            <div class="h-14">
                <label for="" class="c4D52BC text-xs">{{__('profile.name')}}:</label>
                <div class="uniq-input block text-2xl">{{ $user->name }}</div>
            </div>

            <div class="h-14">
                <label for="" class="c4D52BC text-xs">{{__('profile.fathername')}}:</label>
                <input value="{{ $user->fathername }}" name="fathername" maxlength="20" type="text" class="uniq-input block text-2xl">
            </div>

        </div>

        <div class="right-flex ml-16 dark:ml-8 flex flex-col justify-between flex-wrap dark:text-white">

            <div class="h-14">
                <label for="" class="c4D52BC text-xs">{{__('profile.phone')}}:</label>
                <div class="uniq-input block text-2xl">{{ $user->phone }}</div>
            </div>

            <div class="h-14">
                <label for="" class="c4D52BC text-xs">{{__('profile.email')}}:</label>
                <div class="uniq-input block text-2xl">{{ $user->email }}</div>
            </div>

            <div class="h-14">
                <label for="" class="c4D52BC text-xs">{{__('profile.tg_tag')}}:</label >
                <input value="{{ $user->tg_tag }}" name="tg_tag" type="text" maxlength="35" class="uniq-input block text-2xl">
            </div>

        </div>

    </div>
</div>

<div class="mx-auto block ">
    <input type="submit" value="{{__('profile.save_changes')}}" class="bgC1CFFF cursor-pointer block mx-auto mt-24 font-medium h-11 px-20 rounded text-hover dark:bg-custom-303134 dark:text-white"> 
</div>

</form>
@else
<form method="POST" action="{{ route('edit_info') }}"  class="profile-wrapper max-w-1516 h532 px-28 pt-28 pb-14 mx-auto mt-28 cEDF1FF dark:bg-custom-171717">
    <div class="flex justify-between flex-wrap">
        <div class="profile-side dark:hidden">
        @csrf
            <img src="content/img/profile_pic.png" alt="">

        </div>

        <div class="input-side flex flex-wrap dark:mx-auto">

            <div class="left-flex ml-32 dark:ml-0 flex flex-col justify-between flex-wrap dark:text-white">

                <div class="h-14">
                    <label for="" class="c4D52BC text-xs">{{__('profile.surname')}}:</label>
                    <input value="{{ $user->surname }}" name="surname" maxlength="25" type="text" class="uniq-input block text-2xl">
                </div>

                <div class="h-14">
                    <label for="" class="c4D52BC text-xs">{{__('profile.name')}}:</label>
                    <input value="{{ $user->name }}" name="name" maxlength="15" type="text" class="uniq-input block text-2xl">
                </div>

                <div class="h-14">
                    <label for="" class="c4D52BC text-xs">{{__('profile.fathername')}}:</label>
                    <input value="{{ $user->fathername }}" name="fathername" maxlength="20" type="text" class="uniq-input block text-2xl">
                </div>

            </div>

            <div class="right-flex ml-16 dark:ml-8 flex flex-col justify-between flex-wrap dark:text-white">

                <div class="h-14">
                    <label for="" class="c4D52BC text-xs">{{__('profile.phone')}}:</label>
                    <input value="{{ $user->phone }}" name="phone" maxlength="12" type="text" class="uniq-input block text-2xl">
                </div>

                <div class="h-14">
                    <label for="" class="c4D52BC text-xs">{{__('profile.email')}}:</label>
                    <input value="{{ $user->email }}" name="email" type="text" maxlength="60" maxlength="60" class="uniq-input block text-2xl">
                </div>

                <div class="h-14">
                    <label for="" class="c4D52BC text-xs">{{__('profile.tg_tag')}}:</label >
                    <input value="{{ $user->tg_tag }}" name="tg_tag" type="text" maxlength="35" class="uniq-input block text-2xl">
                </div>

            </div>

        </div>
    </div>
    <div class="mx-auto block ">
        <input type="submit" value="{{__('profile.save_changes')}}" class="bgC1CFFF cursor-pointer block mx-auto mt-24 font-medium h-11 px-20 rounded text-hover dark:bg-custom-303134 dark:text-white"> 
    </div>
</form>
@endif

</div>