<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoNivelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_nivel', function (Blueprint $table) {
            $table->increments('id');

            
            $table->integer('nivel_id')->unsigned();
            $table->integer('grupo_id')->unsigned();

            

            $table->foreign('nivel_id')->references('id')->on('niveles')
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
        Schema::dropIfExists('grupo_nivel');
    }
}
