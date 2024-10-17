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
        if (!Auth::User()->role!=='admin') {
            return Redirect::route('profile');
        }

        $users = User::all();
        return view('profile_admin', compact('users'));
    }

    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        // Логика редактирования пользоывы11вателя
        return redirect()->route('profile_admin')->with('success', 'Изменения сохранены');
    }

    public function blockUser(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('profile_admin')->with('error', 'Пользователь не найден');
        }

        if ($user->blocked) {
            return redirect()->route('profile_admin')->with('error', 'Пользователь уже заблокирован');
        }

        $user->blocked = true; // Блокировка пользователя
        $user->save();

        return redirect()->route('profile_admin')->with('success', 'Пользователь успешно заблокирован');
    }

    public function showUserDetails($id)
    {
        $user = User::findOrFail($id);
        // Получение дополнительной информации о пользователе (комментарии, избранные фильмы и т.д.)
        return view('admin.user_details', compact('user'));
    }
}