<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('hall');
            $table->integer('row');
            $table->string('start_time');
            $table->string('event_date');
            $table->string('track')->nullable();
            $table->string('session');
            $table->string('chair_speaker');
            $table->string('topic');
            $table->string('ceremony');
            $table->string('color')->nullable();
            $table->string('session_color')->nullable();
            $table->string('track_color')->nullable();
            $table->string('chair_speaker_color')->nullable();
            $table->string('ceremony_color')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
