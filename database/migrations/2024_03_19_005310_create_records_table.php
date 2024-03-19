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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('category')->nullable();
            $table->string('price')->nullable();
            $table->string('id_discount')->nullable();
            $table->string('discount')->nullable();
            $table->string('balance')->nullable();
            $table->string('total_price')->nullable();
            $table->string('total_balance')->nullable();
            $table->string('status')->nullable();
            $table->date('record_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
