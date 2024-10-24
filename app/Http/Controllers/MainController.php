<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MainController extends Controller
{
    public function index()
    {
        return view("index");
    }
    // функция index() вызывает представление index, которое является главной страницой
    public function index4()
    {
        if (Auth::User()->role!=='user') {
            return Redirect::route('index');
        }

        return view('get_pro');
    }

    
}
