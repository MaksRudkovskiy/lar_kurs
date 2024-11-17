<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthenticatedSessionController extends Controller
{
   public function yandex() 
    {
        return Socialite::driver('yandex')->redirect();
    }
    // Перенаправление пользователя на яндекс Auth

    public function yandexRedirect() 
    {
        $user = Socialite::driver('yandex')->user();
        $user = User::firstOrCreate([ // используем firstOrCreate для проверки есть ли такие пользователи в нашей БД
            'email' => $user->user['default_email'],
        ], [
            'phone' => intval(ltrim($user->user['default_phone']["number"], '+')),
            'name' => $user->user['first_name'],

            'surname' => $user->user['last_name'],

            'password' => Hash::make(Str::random(24)),

            'is_yandex' => 1,
        ]);

        Auth::login($user, true);

        return redirect()->route('profile');
    }
    // Данная функция принимает возвращаемые данные Яндексом и после позволяет осуществить вход

    private function RegOrUser($user) {
        $existingUser = User::where('email', $user->email)->first();
        if (!$existingUser) {
            $newUser = User::create([
                'email'=>$user->default_email,
                'password'=>Hash::make(Str::uuid()),
                'phone' => $user->default_phone,
                'name' => $user->first_name,
                'surname' => $user->last_name,
                'password' => Hash::make(Str::random(24)),
                'is_yandex' => 1,
            ]);

            Auth::login($newUser);
        } else {
            if ($existingUser->regist_method!='yandex'){
                return $error = 'default';
            } else {
                Auth::login($existingUser);
            }
        }
    }
    // Данная функция проводит проверку регистрации пользователя. В случае отсутсвия пользователя с определёнными данными в базе, то его регистрирует.
}
