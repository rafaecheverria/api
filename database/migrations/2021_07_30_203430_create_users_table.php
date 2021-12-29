<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            // $table->string('nombres');
            // $table->string('apellidos');
            // $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();
            $table->Increments('id');
            $table->string('rut');
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('email')->unique();
            $table->date('fecha_nacimiento')->nullable();
            $table->date('vigencia')->nullable();
            $table->string('direccion')->nullable();
            $table->string('genero')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('anexo')->nullable();
            $table->string('pais');
            $table->string('password')->nullable();
            $table->integer('estado')->default(1);
            $table->integer('representante')->default(0);
            $table->unsignedInteger('cargo_id')->unsigned();
            $table->unsignedInteger('departamento_id')->unsigned();
            $table->unsignedInteger('region_id')->unsigned()->default(18);

            $table->timestamps();
            $table->rememberToken();

            $table->foreign('cargo_id')->references('id')->on('cargos')
            ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
