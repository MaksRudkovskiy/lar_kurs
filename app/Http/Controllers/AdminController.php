<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        // Логика редактирования пользоывы11вателя
        return redirect()->route('users')->with('success', 'Изменения сохранены');
    }

    public function blockUser(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users')->with('error', 'Пользователь не найден');
        }

        if ($user->blocked) {
            return redirect()->route('users')->with('error', 'Пользователь уже заблокирован');
        }

        $user->blocked = true; // Блокировка пользователя
        $user->save();

        return redirect()->route('users')->with('success', 'Пользователь успешно заблокирован');
    }

    public function showUserDetails($id)
    {
        $user = User::findOrFail($id);
        // Получение дополнительной информации о пользователе (комментарии, избранные фильмы и т.д.)
        return view('admin.user_details', compact('user'));
    }
}