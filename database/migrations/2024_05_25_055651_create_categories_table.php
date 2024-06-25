<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('category', 15);
        });
        DB::table('categories')->insert([
            ['category' => 'Транспорт'],
            ['category' => 'Продукты'],
            ['category' => 'Здоровье'],
            ['category' => 'Переводы'],
            ['category' => 'Игры'],
            ['category' => 'Развлечения'],
            ['category' => 'Такси'],
            ['category' => 'Спорт'],
            ['category' => 'Красота'],
            ['category' => 'Топливо'],
            ['category' => 'ЖКХ'],
            ['category' => 'Прочее']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
