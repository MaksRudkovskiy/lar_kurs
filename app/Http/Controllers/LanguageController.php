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
        $availableLanguages = ['en', 'ru']; // Пример доступных языков
        if (in_array($language, $availableLanguages)) {
            Session::put('language', $language);
            // Добавьте отладочную информацию
            \Log::info('Language set to: ' . $language);
        }

        return back();
    }

    public function setType(Request $request)
    {
        $type = $request->input('type');
        $availableTypes = ['alternative', 'default']; // Убедитесь, что 'old' и 'new' указаны правильно
        if (in_array($type, $availableTypes)) {
            Session::put('table_type', $type);
            \Log::info('Table type set to: ' . $type);
        }

        return redirect()->back();
    }
}