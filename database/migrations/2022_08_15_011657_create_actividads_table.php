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
						$table->unsignedBigInteger('estatus')->default(0);
						$table->foreign('user_id')->references('id')->on('users');
						$table->foreign('estatus')->references('id')->on('estatuses');
						$table->date('inicio')->nullable();
						$table->date('vencimiento')->nullable();
            $table->timestamps();
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
