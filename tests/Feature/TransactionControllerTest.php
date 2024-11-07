<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Transaction;
use App\Models\CustomCategories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class TransactionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_transaction()
    {
        // Создаем пользователя
        $user = User::factory()->create();

        // Авторизуем пользователя
        Auth::login($user);

        // Данные для транзакции
        $data = [
            'category' => 1,
            'date' => '2023-10-01',
            'source' => 1,
            'type' => 1,
            'amount' => 100,
        ];

        // Отправляем POST запрос на маршрут, который вызывает метод transactions
        $response = $this->post('/profile/new_transactions', $data);

        // Проверяем, что транзакция была создана
        $this->assertDatabaseHas('transactions', [
            'user_id' => $user->id,
            'category_id' => 1,
            'date' => '2023-10-01',
            'source_id' => 1,
            'type_id' => 1,
            'amount' => 100,
        ]);

        // Проверяем, что пользователь был перенаправлен обратно
        $response->assertRedirect();
    }


    
    public function test_create_custom_category()
    {
        // Создаем пользователя с ролью 'admin'
        $user = User::factory()->create(['role' => 'admin']);

        // Авторизуем пользователя
        Auth::login($user);

        // Подготовка данных для запроса
        $data = [
            'custom_category_name' => 'Test Category',
            'icon' => UploadedFile::fake()->create('icon.svg', 100, 'image/svg+xml'),
        ];

        // Отправляем POST запрос на маршрут, который вызывает метод category
        $response = $this->post(route('new_category'), $data);

        // Проверяем, что кастомная категория была создана
        $this->assertDatabaseHas('custom_categories', [
            'user_id' => $user->id,
            'custom_category_name' => 'Test Category',
            'icon' => file_get_contents($data['icon']->getRealPath()),
        ]);

        // Проверяем, что пользователь был перенаправлен обратно
        $response->assertRedirect();
    }



    public function test_create_custom_category_with_invalid_icon_size()
    {
        // Создаем пользователя с ролью 'admin'
        $user = User::factory()->create(['role' => 'admin']);

        // Авторизуем пользователя
        Auth::login($user);

        // Подготовка данных для запроса с иконкой, превышающей допустимый размер
        $data = [
            'custom_category_name' => 'Test Category',
            'icon' => UploadedFile::fake()->create('icon.svg', 100, 'image/svg+xml'),
        ];

        // Отправляем POST запрос на маршрут, который вызывает метод category
        $response = $this->post(route('new_category'), $data);

        // Проверяем, что пользователь получил ошибку о превышении размера иконки
        $response->assertSessionHasErrors('icon');
    }



    public function test_create_custom_category_with_invalid_icon_format()
    {
        // Создаем пользователя с ролью 'admin'
        $user = User::factory()->create(['role' => 'admin']);

        // Авторизуем пользователя
        Auth::login($user);

        // Подготовка данных для запроса с иконкой неправильного формата
        $data = [
            'custom_category_name' => 'Test Category',
            'icon' => UploadedFile::fake()->create('icon.png', 100, 'image/png'),
        ];

        // Отправляем POST запрос на маршрут, который вызывает метод category
        $response = $this->post(route('new_category'), $data);

        // Проверяем, что пользователь получил ошибку о неправильном формате иконки
        $response->assertSessionHasErrors('icon');
    }



    public function test_delete_transaction()
    {
        // Создаем пользователя
        $user = User::factory()->create();

        // Авторизуем пользователя
        Auth::login($user);

        // Создаем кастомные категории
        $customCategories = CustomCategories::factory()->count(10)->create(['user_id' => $user->id]);

        // Создаем транзакцию
        $transaction = Transaction::factory()->create([
            'user_id' => $user->id,
            'custom_category_id' => $customCategories->random()->id,
        ]);

        // Отправляем GET запрос на маршрут, который вызывает метод delete_transaction
        $response = $this->get(route('DeleteTransaction', ['id' => $transaction->id]));

        // Проверяем, что транзакция была удалена
        $this->assertDatabaseMissing('transactions', [
            'id' => $transaction->id,
        ]);

        // Проверяем, что пользователь был перенаправлен обратно
        $response->assertRedirect();
    }



    public function test_update_transaction()
    {
        // Создаем пользователя
        $user = User::factory()->create();

        // Авторизуем пользователя
        Auth::login($user);

        // Создаем кастомные категории
        $customCategories = CustomCategories::factory()->count(10)->create(['user_id' => $user->id]);

        // Создаем транзакцию
        $transaction = Transaction::factory()->create([
            'user_id' => $user->id,
            'custom_category_id' => $customCategories->random()->id,
        ]);

        // Данные для обновления транзакции
        $data = [
            'category' => 2,
            'custom_category' => $customCategories->random()->id,
            'date' => '2023-10-02',
            'source' => 1,
            'type' => 1,
            'amount' => 200,
        ];

        // Отправляем PUT запрос на маршрут, который вызывает метод update
        $response = $this->put(route('transactions.update', ['id' => $transaction->id]), $data);

        // Проверяем, что транзакция была обновлена
        $this->assertDatabaseHas('transactions', [
            'id' => $transaction->id,
            'category_id' => 2,
            'custom_category_id' => $data['custom_category'],
            'date' => '2023-10-02',
            'source_id' => 1,
            'type_id' => 1,
            'amount' => 200,
        ]);

        // Проверяем, что пользователь был перенаправлен обратно
        $response->assertRedirect();
    }
}