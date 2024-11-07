<?php

namespace Database\Factories;

use App\Models\CustomCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomCategoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomCategories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'custom_category_name' => $this->faker->word,
            'icon' => $this->faker->text,
        ];
    }
}