<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Transaction, Category, CustomCategories};
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Auth;

class PersonalisationController extends Controller
{
    function personalisation()
    {   
        if (!Auth::check()) {
            return Redirect::route('login');
        }

        $user = Auth::user();

        $custom_categories = CustomCategories::all();

        $custom_cat_count = CustomCategories::where('user_id', $user->id)->count();

        return view("profile_settings", ['user' => $user, 'custom_categories' => $custom_categories, 'custom_cat_count' => $custom_cat_count]);
    }
}
