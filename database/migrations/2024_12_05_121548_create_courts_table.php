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
            $table->string('nombre');  
            $table->string('tipo_pista'); 
            $table->timestamps();
            $table->unique(['nombre', 'tipo_pista']);
        });
    }
    public function down()
    {
        Schema::dropIfExists('courts');
    }
}
