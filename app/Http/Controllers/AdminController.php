<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Auth;

class AdminController extends Controller
{
    public function admin()
    {   

        if (!Auth::check()) {
            return Redirect::route('login');
        }
        if (Auth::User()->role!=='admin') {
            return Redirect::route('profile');
        }

        $users = User::all();
        return view('profile_admin', compact('users'));
    }

    public function showUserDetails($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user_details', compact('user'));
    }

    public function privelegeUser (Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users')->with('error', 'Пользователь не найден');
        }
        
        $user->role = ($user->role === 'user') ? 'privelegious_user' : 'user';
        $user->save();

        return redirect()->route('profile_admin')->with('success', 'Роль пользователя успешно изменена');
    }
}