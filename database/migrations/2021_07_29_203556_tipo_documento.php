<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TipoDocumento extends Migration
{
    public function up()
    {
        Schema::create('tipo_documentos', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('tipo_documento')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_documentos');
    }
}
