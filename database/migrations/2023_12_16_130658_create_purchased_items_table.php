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
        Schema::create('purchased_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchandise_id')->unsigned();
            $table->foreign('merchandise_id')->references('id')->on('merchandises');
            $table->foreignId('purchase_id')->unsigned();
            $table->foreign('purchase_id')->references('id')->on('purchases');
            $table->integer('whole_sale_qty')->unsigned();
            $table->decimal('purchase_price', 10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchased_items');
    }
};
