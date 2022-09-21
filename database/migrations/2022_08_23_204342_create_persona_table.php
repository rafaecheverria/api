<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('rut')->primary();
            $table->string('nombres')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('email')->unique();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion')->nullable();
            $table->string('genero')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('anexo')->nullable();
            $table->string('pais');
            $table->integer('estado')->default(1);
            $table->unsignedInteger('departamento_id')->unsigned();
            $table->unsignedInteger('region_id')->unsigned()->default(18);
            $table->timestamps();
            $table->rememberToken();
            $table->foreign('departamento_id')->references('id')->on('departamentos')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regiones')
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
        Schema::dropIfExists('persona');
    }
}
