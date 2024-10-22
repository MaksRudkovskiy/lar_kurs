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
        $user = Auth::user();

        $custom_categories = CustomCategories::all();

        return view("profile_personalisation", ['user' => $user, 'custom_categories' => $custom_categories]);
    }
}
