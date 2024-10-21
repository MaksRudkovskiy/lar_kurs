<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class SetTable
{
    public function handle($request, Closure $next)
    {
        // Устанавливаем тип таблицы из сессии (если необходимо)
        if (!Session::has('table_type')) {
            Session::put('table_type', 'default'); // Устанавливаем значение по умолчанию
        }

        return $next($request);
    }
}