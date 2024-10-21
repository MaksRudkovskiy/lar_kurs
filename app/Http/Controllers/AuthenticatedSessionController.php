<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;  

class AuthenticatedSessionController extends Controller
{
   public function yandex() // перенаправляем юзера на яндекс Auth
    {
        return Socialite::driver('yandex')->redirect();
    }

    public function yandexRedirect() // принимаем возвращаемые данные и работаем с ними
    {
        $user = Socialite::driver('yandex')->user();
        $user = User::firstOrCreate([ // используем firstOrCreate для проверки есть ли такие пользователи в нашей БД
            'email' => $user->user['default_email'],
        ], [
            'phone' => intval(ltrim($user->user['default_phone']["number"], '+')),
            'name' => $user->user['first_name'],

            'surname' => $user->user['last_name'],
                                                  // остальные переменные можете посмотреть использовав $dd('$user')
            'password' => Hash::make(Str::random(24)),
        ]);

        Auth::login($user, true);

        return redirect()->route('profile');
    }

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
}
