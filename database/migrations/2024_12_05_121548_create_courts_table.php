<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourtsTable extends Migration
{
    public function up()
    {
        Schema::create('courts', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre de la pista
            $table->string('tipo_pista'); // Tipo de pista (padel, tenis, etc.)
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('courts');
    }
}
