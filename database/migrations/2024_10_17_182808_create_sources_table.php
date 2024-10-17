<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB as FacadesDB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sources', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('source', 1)->unique(); // Уникальное имя источника
        });
        FacadesDB::table('sources')->insert([
            ['source' => 'bank'],
            ['source' => 'nal'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('sources');
    }
};
