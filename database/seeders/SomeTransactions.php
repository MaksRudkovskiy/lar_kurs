<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;
use App\Models\CustomCategories;

class SomeTransactions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Получаем пользователя с user_id == 1
        $user = User::find(1);

        // Если пользователь не найден, создаем его
        if (!$user) {
            $user = User::factory()->create(['id' => 1]);
        }

        // Генерируем 12 транзакций для пользователя с разными категориями
        $categories = range(1, 12); // Создаем массив категорий от 1 до 12

        foreach ($categories as $category) {
            // Проверяем, существует ли custom_category_id
            $customCategoryId = CustomCategories::inRandomOrder()->first()->id ?? null;

            Transaction::factory()->create([
                'user_id' => $user->id,
                'category_id' => $category,
                'custom_category_id' => $customCategoryId,
            ]);
        }
    }
}