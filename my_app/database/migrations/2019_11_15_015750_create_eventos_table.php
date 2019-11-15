<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('idEvento');
            $table->timestamps();
            $table->string('nombre');
            $table->char('siglas', 3);
            $table->longText('descripcion');
            $table->unsignedInteger('maxAsistentes');
            $table->decimal('costo', 6, 2);
            $table->string('lugar');
            $table->dateTime('fechaInicio');
            $table->dateTime('fechaFin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
