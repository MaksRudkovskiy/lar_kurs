<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB as FacadesDB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaction_types', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique(); // Уникальное имя типа
        });
        FacadesDB::table('transaction_types')->insert([
            ['type' => 'outcome'],
            ['type' => 'income'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('transaction_types');
    }
};
