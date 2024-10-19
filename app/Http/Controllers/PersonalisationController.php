<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Transaction, Category};
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Auth;

class PersonalisationController extends Controller
{
    function personalisation()
    {
        $user = Auth::user();

        return view("profile_personalisation", compact('user'));
    }
}
