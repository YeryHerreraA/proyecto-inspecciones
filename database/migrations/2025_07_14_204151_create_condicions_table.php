<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('condicions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('inspeccion_id')->constrained()->onDelete('cascade');
        $table->string('tipo'); // Acto o Condición
        $table->string('categoria'); // Ej: sostenimiento, electricidad, etc.
        $table->text('descripcion');
        $table->string('criticidad'); // Bajo, Medio, Alto, Crítico
        $table->string('evidencia')->nullable(); // Ruta de foto
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
        Schema::dropIfExists('condicions');
    }
}
