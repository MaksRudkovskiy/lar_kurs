<div class="w-full">
<form method="POST" action="{{ route('edit_info') }}"  class="profile-wrapper max-w-1516 h532 px-28 pt-28 pb-14 mx-auto mt-28 cEDF1FF dark:bg-custom-171717">
    @csrf
    <div class="flex justify-between flex-wrap">
        <div class="profile-side dark:hidden">

            <img src="content/img/profile_pic.png" alt="">

        </div>

        <div class="input-side flex flex-wrap">

            <div class="left-flex ml-32 flex flex-col justify-between flex-wrap dark:text-white">

                <div class="h-14">
                    <label for="" class="c4D52BC text-xs">Фамилия:</label>
                    <input value="{{ $user->surname }}" name="surname" maxlength="25" type="text" class="uniq-input block text-2xl">
                </div>

                <div class="h-14">
                    <label for="" class="c4D52BC text-xs">Имя:</label>
                    <input value="{{ $user->name }}" name="name" maxlength="15" type="text" class="uniq-input block text-2xl">
                </div>

                <div class="h-14">
                    <label for="" class="c4D52BC text-xs">Отчество:</label>
                    <input value="{{ $user->fathername }}" name="fathername" maxlength="20" type="text" class="uniq-input block text-2xl">
                </div>

            </div>

            <div class="right-flex ml-16 flex flex-col justify-between flex-wrap dark:text-white">

                <div class="h-14">
                    <label for="" class="c4D52BC text-xs">Телефон:</label>
                    <input value="{{ $user->phone }}" name="phone" maxlength="12" type="text" class="uniq-input block text-2xl">
                </div>

                <div class="h-14">
                    <label for="" class="c4D52BC text-xs">Эл.почта:</label>
                    <input value="{{ $user->email }}" name="email" type="text" maxlength="60" maxlength="60" class="uniq-input block text-2xl">
                </div>

                <div class="h-14">
                    <label for="" class="c4D52BC text-xs">Телеграмм тэг:</label >
                    <input value="{{ $user->tg_tag }}" name="tg_tag" type="text" maxlength="35" class="uniq-input block text-2xl">
                </div>

            </div>

        </div>
    </div>

    <div class="mx-auto block">
        <input type="submit" value="Сохранить изменения" class="bgC1CFFF cursor-pointer block mx-auto mt-24 font-medium h-11 px-20 rounded text-hover dark:bg-custom-303134 dark:text-white"> 
    </div>
</form>
</div>