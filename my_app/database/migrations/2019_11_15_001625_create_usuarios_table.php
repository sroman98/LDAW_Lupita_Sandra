<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
          $table->bigIncrements('idUsuario');
          $table->timestamps();
          $table->bigInteger('idRol');
          $table->string('nombre');
          $table->string('apellido');
          $table->string('correo');
          $table->string('contrasena');
          $table->string('telefono');
          $table->date('fechaNacimiento');
          $table->unsignedBigInteger('idEmpresa');
          $table->foreign('idEmpresa')->references('idEmpresa')->on('empresas');
          $table->unsignedBigInteger('idCiudad');
          $table->foreign('idCiudad')->references('idCiudad')->on('ciudades');
          $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
