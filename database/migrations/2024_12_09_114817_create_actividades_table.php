<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesTable extends Migration
{
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('residente_id')->nullable()->constrained('residentes')->onDelete('cascade');
            $table->foreignId('amenidad_id')->nullable()->constrained('amenidades')->onDelete('cascade');
            $table->string('tipo');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('actividades');
    }
}
