<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table): void {
            $table->id();
            $table->string('name', 150);
            $table->string('email', 191)->unique();
            $table->string('password');
            $table->string('phone', 30)->nullable();
            $table->enum('role', ['customer', 'manager', 'admin'])->default('customer')->index();
            $table->enum('status', ['active', 'passive', 'banned'])->default('active')->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
