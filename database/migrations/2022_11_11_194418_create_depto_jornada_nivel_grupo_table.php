<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeptoJornadaNivelGrupoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depto_jornada_nivel_grupo', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('departamento_id')->unsigned();
            $table->integer('nivel_id')->unsigned();
            $table->integer('jornada_id')->unsigned();
            $table->integer('grupo_id')->unsigned();

            $table->foreign('departamento_id')->references('id')->on('departamentos')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('nivel_id')->references('id')->on('niveles')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('jornada_id')->references('id')->on('jornadas')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('grupo_id')->references('id')->on('grupos')
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
        Schema::dropIfExists('depto_jornada_nivel_grupo');
    }
}
