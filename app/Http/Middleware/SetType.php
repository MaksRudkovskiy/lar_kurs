<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetType
{
    public function handle($request, Closure $next)
    {
        // Устанавливаем тип таблицы из сессии (если необходимо)
        if (Session::has('table_type')) {
            $table_type = Session::get('table_type');
            // Здесь вы можете использовать $table_type, если нужно
        }

        return $next($request);
    }
}