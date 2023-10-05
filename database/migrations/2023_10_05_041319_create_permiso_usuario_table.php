<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisoUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permiso_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('estatus', ['A', 'E']);
            $table->timestamps();

            // Definir claves foráneas
            $table
                ->foreign('permiso_id')
                ->references('id')
                ->on('permisos')
                ->onDelete('cascade');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        // Crear el registro relacionando usuario con permiso
        DB::table('permiso_usuario')->insert([
            'permiso_id' => 1, // ID del permiso 'administrador'
            'user_id' => 1, // ID del usuario administrador
            'estatus' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permiso_usuario');
    }
}
