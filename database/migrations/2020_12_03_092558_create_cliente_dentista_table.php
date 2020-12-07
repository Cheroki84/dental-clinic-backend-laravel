<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteDentistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_dentista', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //$table->foreignId('cliente_id')->constrained('clientes');
            //$table->foreignId('dentista_id')->constrained('dentistas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_dentista');
    }
}
