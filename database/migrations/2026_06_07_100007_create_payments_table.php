<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->string('transaction_id')->nullable()->index();
            $table->string('idempotency_key')->unique();
            $table->string('payment_method')->nullable();
            $table->decimal('amount', 12, 2);
            $table->string('status')->default('pending')->index(); // pending, completed, failed, refunded
            $table->json('provider_response')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
