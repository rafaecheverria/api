<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNivelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveles', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nivel')->nullable();

            $table->integer('jornada_id')->unsigned();
            $table->integer('grupo_id')->unsigned();

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
        Schema::dropIfExists('niveles');
    }
}
