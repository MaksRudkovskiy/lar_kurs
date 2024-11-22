<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminUser::class);
        User::factory(10)->create();
        // Добавляем наш сидер
        $this->call(SomeTransactions::class);
    }
}