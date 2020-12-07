<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentistas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 128);
            $table->string('apellidos', 128)->nullable(true);
            $table->string('email', 128);
            $table->string('password', 128);
            $table->string('telefono', 32)->nullable(true);
            $table->string('foto', 256)->nullable(true);
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
        Schema::dropIfExists('dentistas');
    }
}
