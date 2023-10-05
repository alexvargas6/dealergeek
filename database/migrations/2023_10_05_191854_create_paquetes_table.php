<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id();
            $table->string('clave_rastreo');
            $table->string('descripcion');
            $table->decimal('largo_cm', 8, 2);
            $table->decimal('ancho_cm', 8, 2);
            $table->decimal('altura_cm', 8, 2);
            $table->enum('estatus', ['A', 'F'])->default('A'); // 'A' para activo, 'F' para finalizado
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
        Schema::dropIfExists('paquetes');
    }
}
