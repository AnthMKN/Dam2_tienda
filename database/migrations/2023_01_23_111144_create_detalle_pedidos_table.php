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
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pedido');
            $table->unsignedBigInteger('id_articulo');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->timestamps();

            $table->foreign('id_pedido')->references('id')->on('pedido')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_articulo')->references('id')->on('users')
                ->onDelete('cascade');
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pedidos');
    }
};
