<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Transaction};
use Illuminate\Support\Facades\Redirect;
use Auth;

class AdminController extends Controller
{
    public function admin() // Данная функция возвращает представление profile_admin для отображения страницы администраторской панели
    {   
        if (!Auth::check()) {
            return Redirect::route('login');
        }
        if (Auth::User()->role!=='admin') {
            return Redirect::route('profile');
        }

        $users = User::withCount('transactions')->get();
        return view('profile_admin', compact('users'));
    }

    public function showUserDetails($id) // Данная функция возвращает в представление все данные пользователя, чтобы их потом можно было выводить в таблице пользователей
    {
        $user = User::findOrFail($id);
        return view('admin.user_details', compact('user'));
    }
    
    public function privelegeUser (Request $request, $id) // Функция privelegeUser обеспечивает смену привелегии пользователя между "user" и "privelege_user"
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users')->with('error', __('profile.user_not_found'));
        }
        
        $user->role = ($user->role === 'user') ? 'privelegious_user' : 'user';
        $user->save();

        return redirect()->route('profile_admin')->with('success', __('profile.user_role_changed'));
    }

    public function search(Request $request) // Функция search позволяет осуществлять поиск на странице админ-панели по определённым параметрам
    {
        $search = $request->input('search');

        $users = User::where('name', 'like', '%' . $search . '%')
        ->orWhere('surname', 'like', '%' . $search . '%')
        ->orWhere('email', 'like', '%' . $search . '%')
        ->orWhere('phone', 'like', '%' . $search . '%')
        ->withCount('transactions')
        ->get();

        return view('profile_admin', compact('users'));
    } 
}