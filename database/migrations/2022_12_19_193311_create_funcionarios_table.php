<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('anexo')->nullable();
            $table->unsignedInteger('persona_id')->unsigned();
            $table->unsignedInteger('departamento_id')->unsigned();
            $table->unsignedInteger('region_id')->unsigned()->default(18);
            $table->unsignedInteger('cargo_id')->unsigned()->default();

            $table->foreign('persona_id')->references('id')->on('personas')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cargo_id')->references('id')->on('cargos')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('departamento_id')->references('id')->on('departamentos')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regiones')
            ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('funcionarios');
    }
}
