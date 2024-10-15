<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function update(Request $request)
{
    $language = $request->input('language');
    App::setLocale($language);
    session()->put('locale', $language);

    // Отладочный вывод

    return redirect()->back();
}
}