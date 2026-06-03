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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // seller
            $table->string('title'); // required
            $table->text('description'); // required
            $table->string('price')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('breed')->nullable();
            $table->string('location')->nullable();
            $table->string('status')->default('available'); // available / sold
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
