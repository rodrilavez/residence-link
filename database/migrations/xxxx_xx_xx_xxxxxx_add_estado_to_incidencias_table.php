<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoToIncidenciasTable extends Migration
{
    public function up()
    {
        Schema::table('incidencias', function (Blueprint $table) {
            $table->string('estado')->default('pendiente');
        });
    }

    public function down()
    {
        Schema::table('incidencias', function (Blueprint $table) {
            $table->dropColumn('estado');
        });
    }
} 