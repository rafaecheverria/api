<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Archivadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivadores', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('archivador')->nullable();
            $table->string('periodo')->nullable();
            $table->unsignedInteger('departamento')->unsigned();
            $table->timestamps();

            $table->foreign('departamento')->references('id')->on('departamentos')
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
        Schema::dropIfExists('archivadores');
    }
}
