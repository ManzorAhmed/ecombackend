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
        Schema::create('gateway_currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gateway_alias');
            $table->decimal('currency');
            $table->string('symbol');
            $table->decimal('min_amount');
            $table->decimal('max_amount');
            $table->decimal('charge');
            $table->decimal('rate');
            $table->string('image');
            $table->json('gateway_parameter');
            $table->timestamps();


        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gateway_currencies');
    }
};
