<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletos', function (Blueprint $table) {
            $table->bigIncrements('idBoleto');
            $table->timestamps();
            $table->unsignedBigInteger('idEvento');
            $table->foreign('idEvento')->references('idEvento')->on('eventos');
            $table->unsignedBigInteger('idUsuario');
            $table->foreign('idUsuario')->references('idUsuario')->on('usuarios');
            $table->string('estatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boletos');
    }
}
