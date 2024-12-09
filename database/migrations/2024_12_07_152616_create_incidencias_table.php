<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->foreignId('residente_id')->nullable()->constrained('residentes');
            $table->foreignId('amenidad_id')->nullable()->constrained('amenidades');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
}
