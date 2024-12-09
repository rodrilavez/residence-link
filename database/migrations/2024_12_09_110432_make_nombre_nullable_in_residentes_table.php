<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeNombreNullableInResidentesTable extends Migration
{
    public function up()
    {
        Schema::table('residentes', function (Blueprint $table) {
            $table->string('nombre')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('residentes', function (Blueprint $table) {
            $table->string('nombre')->nullable(false)->change();
        });
    }
}

class MakeEdadNullableInResidentesTable extends Migration
{
    public function up()
    {
        Schema::table('residentes', function (Blueprint $table) {
            $table->integer('edad')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('residentes', function (Blueprint $table) {
            $table->integer('edad')->nullable(false)->change();
        });
    }
}
