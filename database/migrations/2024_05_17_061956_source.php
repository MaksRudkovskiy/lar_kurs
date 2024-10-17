<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaction_sources', function (Blueprint $table) {
            $table->id();
            $table->string('source')->unique(); // Уникальное имя источника
        });

        DB::table('transaction_sources')->insert([
            ['source' => 'bank'],
            ['source' => 'nal'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('transaction_sources');
    }
};
