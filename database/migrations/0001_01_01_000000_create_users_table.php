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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 15)->nullable();
            $table->string('surname', 25)->nullable();
            $table->string('fathername', 20)->nullable();
            $table->string('email', 60)->unique();
            $table->string('phone', 12)->unique();
            $table->string('password');
            $table->enum('role', ['user', 'privelegious_user', 'admin'])->default('user');
            $table->unsignedTinyInteger('is_yandex')->default(0);
            $table->string('tg_tag', 35)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
    }
};
