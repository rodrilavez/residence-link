<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveEdadFromResidentesTable extends Migration
{
    public function up()
    {
        Schema::table('residentes', function (Blueprint $table) {
            $table->dropColumn('edad');
        });
    }

    public function down()
    {
        Schema::table('residentes', function (Blueprint $table) {
            $table->integer('edad')->nullable();
        });
    }
}
