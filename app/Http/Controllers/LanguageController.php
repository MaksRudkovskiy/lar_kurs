<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLanguage
{
    public function handle($request, Closure $next)
    {
        // Устанавливаем язык из сессии
        if (Session::has('language')) {
            $language = Session::get('language');
            App::setLocale($language);
        }

        // Устанавливаем тип таблицы из сессии (если необходимо)
        if (Session::has('table_type')) {
            $table_type = Session::get('table_type');
            // Здесь вы можете использовать $table_type, если нужно
        }

        return $next($request);
    }
}