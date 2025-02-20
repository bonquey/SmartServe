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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('table_id')->constrained('event_tables')->onDelete('cascade');
            $table->foreignId('chair_id')->nullable()->constrained('chairs')->onDelete('cascade');

            $table->foreignId('appetizer_id')->nullable()->constrained('comestibles')->onDelete('cascade');
            $table->integer('appetizer_quantity')->nullable();

            $table->foreignId('main_dish_id')->nullable()->constrained('comestibles')->onDelete('cascade');
            $table->integer('main_dish_quantity')->nullable();

            $table->foreignId('drink_id')->nullable()->constrained('comestibles')->onDelete('cascade');
            $table->integer('drink_quantity')->nullable();

            $table->foreignId('hydration_id')->nullable()->constrained('comestibles')->onDelete('cascade');
            $table->integer('hydration_quantity')->nullable();

            $table->foreignId('protein_id')->nullable()->constrained('comestibles')->onDelete('cascade');
            $table->integer('protein_quantity')->nullable();

            $table->foreignId('dessert_id')->nullable()->constrained('comestibles')->onDelete('cascade');
            $table->integer('dessert_quantity')->nullable();

            $table->enum('status', ['Pending', 'Processing', 'Delivered'])->default('Pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
