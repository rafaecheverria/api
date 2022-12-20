<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentoGrupoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento_grupo', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('departamento_id')->unsigned();
            $table->unsignedInteger('grupo_id')->unsigned();

            $table->foreign('departamento_id')->references('id')->on('departamentos')
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
        Schema::dropIfExists('departamento_grupo');
    }
}
