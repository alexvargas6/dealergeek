<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_permiso');
            $table->string('clave_permiso')->unique(); // Clave permiso única
            $table->enum('estatus', ['A', 'E']);
            $table->timestamps();
        });

        // Insertar un registro inicial
        DB::table('permisos')->insert([
            'nombre_permiso' => 'administrador',
            'clave_permiso' => 'adm', // Clave de permiso "adm"
            'estatus' => 'A',
            'created_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos');
    }
}
