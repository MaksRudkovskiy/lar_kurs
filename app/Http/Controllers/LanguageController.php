<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function setLanguage(Request $request)
    {
        $language = $request->input('language');

        $availableLanguages = ['en', 'ru']; 
        if (in_array($language, $availableLanguages)) {
            Session::put('language', $language);
            \Log::info('Language set to: ' . $language);
        }

        return back();
    }

    public function setType(Request $request)
    {
        $type = $request->input('type');
        $availableTypes = ['alternative', 'default']; 
        if (in_array($type, $availableTypes)) {
            Session::put('table_type', $type);
            \Log::info('Table type set to: ' . $type);
        }

        return redirect()->back();
    }
}