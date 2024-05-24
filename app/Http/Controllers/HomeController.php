<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile');
    }

    public function index2()
    {
        $user = Auth::user();
        return view("profile_settings", ['user' => $user]);
    }

    public function edit_info(Request $request) {
        $user = Auth::user();
        $user_info = User::where('id', $user->id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'fathername' => $request->fathername,
            'phone' => $request->phone,
            'email' => $request->email,
            'tg_tag' => $request->tg_tag,
        ]);
        return redirect()->back();
    }
}
