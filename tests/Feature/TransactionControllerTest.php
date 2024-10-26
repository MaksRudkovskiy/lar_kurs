<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TransactionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testSuccessfulTransactionCreation()
    {
        // Создаем пользователя
        $user = User::factory()->create();

        // Аутентифицируем пользователя
        Auth::login($user);

        // Создаем запрос с необходимыми данными
        $requestData = [
            'category' => 1,
            'date' => '2023-10-01',
            'source' => 2,
            'type' => 1,
            'amount' => 100,
        ];

        $request = new Request($requestData);

        // Вызываем метод transactions
        $response = $this->actingAs($user)->post(route('transactions.store'), $requestData);

        // Проверяем, что транзакция была создана
        $this->assertDatabaseHas('transactions', [
            'user_id' => $user->id,
            'category_id' => $requestData['category'],
            'date' => $requestData['date'],
            'source_id' => $requestData['source'],
            'type_id' => $requestData['type'],
            'amount' => $requestData['amount'],
        ]);

        // Проверяем, что произошло перенаправление на предыдущую страницу
        $response->assertRedirect();
    }

    public function testTransactionCreationFailsWithoutRequiredFields()
    {
        // Создаем пользователя
        $user = User::factory()->create();

        // Аутентифицируем пользователя
        Auth::login($user);

        // Создаем запрос без обязательных полей
        $requestData = [
            'category' => null,
            'date' => null,
            'source' => null,
            'type' => null,
            'amount' => null,
        ];

        $request = new Request($requestData);

        // Вызываем метод transactions
        $response = $this->actingAs($user)->post(route('transactions.store'), $requestData);

        // Проверяем, что транзакция не была создана
        $this->assertDatabaseMissing('transactions', [
            'user_id' => $user->id,
        ]);

        // Проверяем, что произошло перенаправление на предыдущую страницу
        $response->assertRedirect();
    }

    public function testGettingUserTransactions()
    {
        // Создаем пользователя
        $user = User::factory()->create();

        // Аутентифицируем пользователя
        Auth::login($user);

        // Создаем несколько транзакций для пользователя
        Transaction::factory()->count(3)->create([
            'user_id' => $user->id,
        ]);

        // Вызываем метод transactions
        $response = $this->actingAs($user)->get(route('transactions.index'));

        // Проверяем, что транзакции пользователя были получены
        $response->assertSessionHas('transactions');

        // Проверяем, что количество транзакций соответствует ожидаемому
        $transactions = session('transactions');
        $this->assertCount(3, $transactions);
    }
}