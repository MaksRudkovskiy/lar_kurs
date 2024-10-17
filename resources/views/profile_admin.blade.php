@extends('layouts.lk')
<!-- Подключение шаблона личного кабинета -->
@section('title')
    Админка
@endsection
<!-- Объявление названия для представления, которое потом будет выводиться в браузере -->

<!-- Секция с основным изменяемым содержимым -->
@section('content')

@include('components.admin.category_adding')

@include('components.admin.users_table.php')

<script>
    function submitForm() {
        const form = document.querySelector('form');
        const genresInput = document.querySelector('input[name="genres"]');
        const genresArray = genresInput.value.split(',');
        genresInput.value = JSON.stringify(genresArray);
        form.submit();
    }
</script>



@endsection
<!-- Секция с основным изменяемым содержимым -->