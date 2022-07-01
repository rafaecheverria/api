<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJornadaNivelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jornada_nivel', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('jornada_id')->unsigned();
            $table->integer('nivel_id')->unsigned();

            $table->foreign('jornada_id')->references('id')->on('jornadas')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('nivel_id')->references('id')->on('niveles')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jornada_nivel');
    }
}
