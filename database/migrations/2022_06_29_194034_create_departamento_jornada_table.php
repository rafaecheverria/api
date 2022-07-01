<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentoJornadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento_jornada', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('departamento_id')->unsigned();
            $table->integer('jornada_id')->unsigned();

            $table->foreign('departamento_id')->references('id')->on('departamentos')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('jornada_id')->references('id')->on('jornadas')
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
        Schema::dropIfExists('departamento_jornada');
    }
}
