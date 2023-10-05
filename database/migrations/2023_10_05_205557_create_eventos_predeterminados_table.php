<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosPredeterminadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos_predeterminados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_evento');
            $table->string('icono');
            $table->enum('estatus', ['A', 'E'])->default('A');
            $table->timestamps();
        });

        // Insertar eventos predeterminados
        $eventos = [
            ['nombre_evento' => 'Orden confirmada', 'icono' => 'fa fa-check'],
            [
                'nombre_evento' => 'Recogido por mensajería',
                'icono' => 'fa fa-user',
            ],
            ['nombre_evento' => 'En camino', 'icono' => 'fa fa-truck'],
            ['nombre_evento' => 'Listo para recojer', 'icono' => 'fa fa-box'],
            ['nombre_evento' => 'ENTREGADO', 'icono' => 'fa fa-box'],
        ];

        foreach ($eventos as $evento) {
            DB::table('eventos_predeterminados')->insert([
                'nombre_evento' => $evento['nombre_evento'],
                'icono' => $evento['icono'],
                'estatus' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos_predeterminados');
    }
}
