<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('grupo')->nullable();
            $table->unsignedInteger('nivel_id')->unsigned();
            $table->unsignedInteger('jornada_id')->unsigned();
            $table->string('capacidad')->nullable();

            $table->foreign('nivel_id')->references('id')->on('niveles')
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
        Schema::dropIfExists('grupos');
    }
}
