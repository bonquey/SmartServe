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

            $table->string('starters')->nullable();
            
            $table->string('local_dish')->nullable();
            $table->string('local_dish_protein')->nullable();

            $table->string('continental')->nullable();
            $table->string('continental_sauce')->nullable();
            $table->string('continental_protein')->nullable();

            $table->string('soup')->nullable();
            $table->string('swallow')->nullable();
            $table->string('soup_protein')->nullable();

            $table->string('salad')->nullable();
            

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
