<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividads', function (Blueprint $table) {
            $table->id();
						$table->string('nombre');
						$table->text('descripcion');
						$table->unsignedBigInteger('user_id')->nullable();
						$table->string('nombre_de_user')->nullable();
						$table->unsignedBigInteger('estatus')->default(1);
						$table->date('fecha_inicio')->nullable();
						$table->date('fecha_vencimiento')->nullable();
						$table->unsignedBigInteger('empresa');
						$table->foreign('empresa')->references('id')->on('empresas');
						$table->foreign('user_id')->references('id')->on('users');
						$table->foreign('estatus')->references('id')->on('estatuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividads');
    }
}
