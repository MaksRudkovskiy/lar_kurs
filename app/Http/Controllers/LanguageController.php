<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function setLanguage(Request $request)
    {
        $language = $request->input('language');

        // Проверка на допустимые языки, если нужно
        $availableLanguages = ['en', 'ru', 'es']; // Пример доступных языков
        if (in_array($language, $availableLanguages)) {
            Session::put('language', $language);
            // Добавьте отладочную информацию
        }

        return back();
    }
}