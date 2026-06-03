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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('animal_id')->constrained()->cascadeOnDelete();
            $table->foreignId('buyer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('seller_id')->constrained('users')->cascadeOnDelete();

            // customer info
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('alternate_mobile');
            $table->string('address');
            $table->string('address_2')->nullable();
            $table->text('expectations')->nullable();
            $table->string('when_needed');

            // pricing
            $table->string('animal_price');
            $table->integer('delivery_charges')->default(5000);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
