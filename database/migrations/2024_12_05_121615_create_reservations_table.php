<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users'); // Relación con la tabla 'users'
            $table->foreignId('id_pista')->constrained('courts'); // Relación con la tabla 'courts'
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_final');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
