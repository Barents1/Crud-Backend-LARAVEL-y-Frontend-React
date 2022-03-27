<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('estado', ['ACTIVO', 'CANCELADO', 'ELIMINADO'])->default('ACTIVO');
            $table->string('nombre',50);
            $table->text('descripcion');
            $table->double('stock_minimo',10,2);

            $table->unsignedBigInteger('categoria_id');

            
            $table->foreign('categoria_id')->references('id')->on('categorias');
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
        Schema::dropIfExists('materiales');
    }
};
