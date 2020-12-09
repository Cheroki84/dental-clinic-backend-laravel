<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 128);
            $table->string('descripcion', 256);
            $table->date('fecha_cita')->nullable(true);
            $table->decimal('precio', 8, 2);
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->foreignId('dentista_id')->constrained('dentistas');
            //$table->integer('dentista_id');
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
        Schema::dropIfExists('citas');
    }
}
