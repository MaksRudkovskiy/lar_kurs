<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUser extends Seeder // Убедитесь, что имя класса корректное
{
    public function run()
    {
        // Проверяем, существует ли уже администратор
        if (User ::where('role', 'admin')->doesntExist()) {
            User::create([
                'name' => 'Admin',
                'surname' => 'Adminovich', 
                'fathername' => 'Adminov', 
                'email' => 'admin@mail.ru', 
                'phone' => '1234567890', 
                'password' => Hash::make('668822'), 
                'role' => 'admin',
                'tg_tag' => '@Bukpus_GangstaJR', 
            ]);
        }
        // php artisan db:seed --class=AdminUser
    }
}