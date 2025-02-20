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
        Schema::create('comestibles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->enum('category', ['Appetizer', 'Dessert', 'Drink', 'Hydration', 'Main Dish', 'Protein']);
            $table->integer('quantity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comestibles');
    }
};
