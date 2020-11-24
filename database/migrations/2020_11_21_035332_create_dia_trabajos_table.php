<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_diaTrabajo', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('dia');
            $table->boolean('activo');
            $table->time('mañana_inicio');
            $table->time('mañana_fin');
            $table->time('tarde_inicio');
            $table->time('tarde_fin');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('dia_trabajos');
    }
}
