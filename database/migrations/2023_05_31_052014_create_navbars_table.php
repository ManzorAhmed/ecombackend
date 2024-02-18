<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavbarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navbar', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link');
            $table->unsignedBigInteger('parent_id'); // Add the parent_id field
            $table->tinyInteger('active')->default(1);
            $table->string('parent_url')->default('');
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('navbar'); // Add the foreign key constraint
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navbars');
    }
}
