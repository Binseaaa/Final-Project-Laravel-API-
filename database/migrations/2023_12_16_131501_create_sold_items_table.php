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
        Schema::create('sold_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchandise_id')->unsigned();
            $table->foreign('merchandise_id')->references('id')->on('merchandises');
            $table->foreignId('sale_id')->unsigned();
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->integer('qty');
            $table->decimal('selling_price', 8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sold_items');
    }
};
