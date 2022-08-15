<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaActividad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_actividad', function (Blueprint $table) {
            $table->id();
						$table->unsignedBigInteger('empresa');
						$table->unsignedBigInteger('actividad');
						$table->foreign('empresa')->references('id')->on('empresas');
						$table->foreign('actividad')->references('id')->on('actividads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa_actividad');
    }
}
