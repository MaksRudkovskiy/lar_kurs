<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB as FacadesDB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('type', 1)->unique(); // Уникальное имя типа
        });
        FacadesDB::table('types')->insert([
            ['type' => 'outcome'],
            ['type' => 'income'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
