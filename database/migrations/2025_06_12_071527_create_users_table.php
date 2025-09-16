<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('nombres');
            $table->text('apellidos');
            $table->text('email');
            $table->string('password');
            $table->string('verification_code', 6)->nullable();
            $table->timestamp('code_expires_at')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->rememberToken();
            $table->timestamp('last_password_update')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};