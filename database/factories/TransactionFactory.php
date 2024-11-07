<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'category_id' => $this->faker->numberBetween(1, 10),
            'custom_category_id' => $this->faker->numberBetween(1, 10),
            'date' => $this->faker->date(),
            'source_id' => $this->faker->numberBetween(1, 2),
            'type_id' => $this->faker->numberBetween(1, 2),
            'amount' => $this->faker->numberBetween(100, 1000),
        ];
    }
}