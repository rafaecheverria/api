<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Departamentos extends Migration
{
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('departamento')->nullable();
            $table->string('abreviado')->nullable();
            $table->string('sigla')->nullable();
            $table->integer('estado')->default(1);
            $table->unsignedInteger('tipo_departamento_id')->unsigned();
            $table->unsignedInteger('region_id')->unsigned();
            $table->timestamps();

            $table->foreign('region_id')->references('id')->on('regiones')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('tipo_departamento_id')->references('id')->on('tipo_departamento')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
