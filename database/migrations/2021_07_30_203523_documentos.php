<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;


class Documentos extends Migration
{
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->Increments('id');
            // $table->string('remitente')->nullable();
            //REMITENTE ID; SE REFIERE A LA PERSONA QUE EMITE EL DOCUMENTO, SE OBTIENE DE LA TABLA USERS
            $table->unsignedInteger('remitente_id')->nullable()->unsigned();
            $table->datetime('fecha_documento')->format('Y-m-d H:m:s')->nullable()->default(Carbon::setTestNow());
            $table->unsignedInteger('tipo_documento_id')->unsigned();
            $table->unsignedInteger('creador')->unsigned();
            $table->string('numero_documento')->nullable();
            $table->string('asunto', 500)->nullable();
            $table->longText('detalle')->nullable();
            $table->string('folio')->nullable();
            $table->string('archivo')->nullable();
            $table->string('distribucion')->nullable();
            $table->unsignedInteger('estado_actual')->unsigned();
            //ORIGEN; SE REFIERE AL DEPARTAMENTO DEL USUARIO QUE EMITE EL DOCUMENTO.
            $table->unsignedInteger('origen')->unsigned();
            //ORGEN; SE REFIERE AL DEPARTAMENTO AL QUE VA DESTINADO EL DOCUMENTO
            $table->unsignedInteger('destino')->unsigned();
            //DESTINO ACTUAL; SE REFIERE AL DEPARTAMENTO AL QUE VA DESTINADO EL DOCUMENTO
            $table->unsignedInteger('destino_actual')->unsigned();
            //ORIGEN ACTUAL; SE REFIERE AL DEPARTAMENTO QUE ENVIA O DERIVA EL DOCUMENTO EL DOCUMENTO
            $table->unsignedInteger('origen_actual')->unsigned();
            $table->integer('archivador_id')->nullable()->unsigned();
            //DESTINATARIO UD; SE REFIERE A LA PERSONA A LA QUE VA DIRIGIDO EL DOCUMENTO, SE OBTIENE DE LA TABLA USERS
            $table->integer('destinatario_id')->nullable()->unsigned();

            $table->timestamps();

            $table->foreign('remitente_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('destinatario_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('archivador_id')->references('id')->on('archivadores')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('creador')->references('id')->on('departamentos')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('estado_actual')->references('id')->on('estados')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('origen')->references('id')->on('departamentos')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('destino')->references('id')->on('departamentos')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('destino_actual')->references('id')->on('departamentos')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('origen_actual')->references('id')->on('departamentos')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('documentos');
    }

}
